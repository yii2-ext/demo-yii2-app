<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_reset_token
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class User extends ActiveRecord implements IdentityInterface
{
    // Константы статусов
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;
    
    // Свойства для работы с паролями
    public ?string $password = null;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],
            
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): ?self
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): ?self
    {
        return static::findOne(['access_token' => $token, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername(string $username): ?self
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }
    
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->auth_key === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates access token for API
     */
    public function generateAccessToken(): void
    {
        $this->access_token = Yii::$app->security->generateRandomString(255);
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken(): void
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken(): void
    {
        $this->password_reset_token = null;
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken(string $token): ?self
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid(string $token): bool
    {
        if (empty($token)) {
            return false;
        }
        
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    /**
     * Проверяет, заблокирована ли учетная запись
     *
     * @return bool
     */
    public function isAccountLocked(): bool
    {
        return $this->locked_until !== null && $this->locked_until > time();
    }
    
    /**
     * Обрабатывает успешный вход пользователя
     */
    public function handleSuccessfulLogin()
    {
        $this->failed_login_attempts = 0;
        $this->last_failed_login_at = null;
        $this->locked_until = null;
        $this->save(false); // Не валидируем, так как это внутреннее обновление
    }
    
    /**
     * Обрабатывает неудачный вход пользователя
     */
    public function handleFailedLogin()
    {
        $this->failed_login_attempts++;
        $this->last_failed_login_at = time();
        
        // Если попыток больше 5, блокируем учетную запись на 1 час
        if ($this->failed_login_attempts >= 5) {
            $this->locked_until = time() + 3600; // Блокировка на 1 час
        }
        
        $this->save(false); // Не валидируем, так как это внутреннее обновление
    }
    
    /**
     * Возвращает время оставшейся блокировки в секундах
     *
     * @return int
     */
    public function getRemainingLockTime(): int
    {
        if (!$this->isAccountLocked()) {
            return 0;
        }
        
        return $this->locked_until - time();
    }
}
