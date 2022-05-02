<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_category}}`.
 */
class m220428_215303_create_job_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('job_category', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_job_id', 'job_category', 'job_id', 'job', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_category_id', 'job_category', 'category_id', 'category', 'id' ,'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_job_id', 'job_category');
        $this->dropForeignKey('fk_category_id', 'job_category');
        $this->dropTable('{{%job_category}}');
    }
}
