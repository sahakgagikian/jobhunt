<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job}}`.
 */
class m220427_221247_create_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('job', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'company_id' => $this->integer()->notNull(),
            'vacancies_count' => $this->integer()->notNull(),
            'location' => $this->string(255)->notNull(),
            'working_hours' => $this->string(16)->notNull(),
            'min_salary' => $this->integer()->notNull(),
            'max_salary' => $this->integer(),
            'description' => $this->string(512)->notNull()
        ]);

        $this->addForeignKey('fk_company_id', 'job', 'company_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_company_id', 'job');
        $this->dropTable('{{%job}}');
    }
}
