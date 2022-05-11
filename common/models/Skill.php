<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "skills".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $name
 * @property int $proficiency
 *
 * @property Resume $resume
 */
class Skill extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'skill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['resume_id', 'name', 'proficiency'], 'required'],
            [['resume_id', 'proficiency'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::class, 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'resume_id' => "string", 'name' => "string", 'proficiency' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'name' => 'Name',
            'proficiency' => 'Proficiency',
        ];
    }

    /**
     * Gets query for [[Resume]].
     *
     * @return ActiveQuery
     */
    public function getResume(): ActiveQuery
    {
        return $this->hasOne(Resume::class, ['id' => 'resume_id']);
    }
}
