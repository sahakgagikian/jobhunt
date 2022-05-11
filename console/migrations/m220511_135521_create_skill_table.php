<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill}}`.
 */
class m220511_135521_create_skill_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skill}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'proficiency' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_skill_resume_id', 'skill', 'resume_id', 'resume', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_skill_resume_id', 'skill');
        $this->dropTable('{{%skill}}');
    }
}
