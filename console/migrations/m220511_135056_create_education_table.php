<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%education}}`.
 */
class m220511_135056_create_education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer()->notNull(),
            'degree' => $this->string()->notNull(),
            'field_of_study' => $this->string()->notNull(),
            'educational_institution' => $this->string()->notNull(),
            'year_from' => $this->integer()->notNull(),
            'year_to' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey('fk_education_resume_id', 'education', 'resume_id', 'resume', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_education_resume_id', 'education');
        $this->dropTable('{{%education}}');
    }
}
