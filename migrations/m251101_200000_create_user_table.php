<?php declare(strict_types=1); 

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m251101_200000_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(255),
            'password_reset_token' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(10),
        ]);

        // Создание индексов
        $this->createIndex(
            'idx-user-username',
            '{{%user}}',
            'username'
        );

        $this->createIndex(
            'idx-user-email',
            '{{%user}}',
            'email'
        );

        $this->createIndex(
            'idx-user-status',
            '{{%user}}',
            'status'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}