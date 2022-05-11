<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume}}`.
 */
class m220511_133503_create_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('resume', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer()->notNull(),
            'candidate_name' => $this->string()->notNull(),
            'candidate_email' => $this->string()->notNull(),
            'candidate_profession_title' => $this->string()->notNull(),
            'candidate_location' => $this->string()->notNull(),
            'candidate_website' => $this->string(),
            'candidate_desired_salary' => $this->decimal(),
            'candidate_age' => $this->integer()->notNull(),
            'update_date_and_time' => $this->dateTime()
        ]);

        $this->addForeignKey('fk_resume_candidate_id', 'resume', 'candidate_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_resume_candidate_id', 'resume');
        $this->dropTable('{{%resume}}');
    }
}
