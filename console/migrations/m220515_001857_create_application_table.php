<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m220515_001857_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer(),
            'company_id' => $this->integer(),
            'job_id' => $this->integer(),
            'resume_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_application_candidate_id', 'application', 'candidate_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_application_job_id', 'application', 'job_id', 'job', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('idx_unique_candidate_id_job_id',
            'application',
            ['candidate_id', 'job_id'],
            true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_unique_candidate_id_job_id', 'application');

        $this->dropForeignKey('fk_application_candidate_id', 'application');
        $this->dropForeignKey('fk_application_job_id', 'application');

        $this->dropTable('{{%application}}');
    }
}
