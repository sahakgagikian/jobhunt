<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220319_104015_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'image' => $this->string(255),
            'jobs_count' => $this->integer(),
            'sort' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
