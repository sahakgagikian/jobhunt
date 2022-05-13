<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%experience}}`.
 */
class m220511_135347_create_experience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%experience}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer()->notNull(),
            'company_name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'year_from' => $this->integer()->notNull(),
            'year_to' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey('fk_experience_resume_id', 'experience', 'resume_id', 'resume', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_experience_resume_id', 'experience');
        $this->dropTable('{{%experience}}');
    }
}
