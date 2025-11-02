<?php

use yii\db\Migration;

/**
 * Добавляет поля для защиты от брутфорса в таблицу user
 */
class m251101_210000_add_bruteforce_protection_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'failed_login_attempts', $this->integer()->defaultValue(0));
        $this->addColumn('{{%user}}', 'last_failed_login_at', $this->integer());
        $this->addColumn('{{%user}}', 'locked_until', $this->integer());
        
        // Создание индексов
        $this->createIndex(
            'idx-user-failed_login_attempts',
            '{{%user}}',
            'failed_login_attempts'
        );
        
        $this->createIndex(
            'idx-user-locked_until',
            '{{%user}}',
            'locked_until'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-user-locked_until', '{{%user}}');
        $this->dropIndex('idx-user-failed_login_attempts', '{{%user}}');
        
        $this->dropColumn('{{%user}}', 'locked_until');
        $this->dropColumn('{{%user}}', 'last_failed_login_at');
        $this->dropColumn('{{%user}}', 'failed_login_attempts');
    }
}