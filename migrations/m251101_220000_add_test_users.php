<?php

use yii\db\Migration;
use app\models\User;

/**
 * Добавляет тестовых пользователей в таблицу user
 */
class m251101_220000_add_test_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаем пользователя admin
        $admin = new User();
        $admin->username = 'admin';
        $admin->email = 'admin@example.com';
        $admin->setPassword('admin');
        $admin->generateAuthKey();
        $admin->status = User::STATUS_ACTIVE;
        $admin->save();
        
        // Создаем пользователя demo
        $demo = new User();
        $demo->username = 'demo';
        $demo->email = 'demo@example.com';
        $demo->setPassword('demo');
        $demo->generateAuthKey();
        $demo->status = User::STATUS_ACTIVE;
        $demo->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем тестовых пользователей
        User::deleteAll(['username' => ['admin', 'demo']]);
    }
}