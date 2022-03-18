<?php

use yii\db\Migration;

/**
 * Handles the creation of admin.
 */
class m220313_180515_add_admin_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('123456'),
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', [
            'username' => 'admin',
        ]);
    }
}
