<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "educations".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $degree
 * @property string $field_of_study
 * @property string $educational_institution
 * @property int $year_from
 * @property int $year_to
 * @property string|null $description
 *
 * @property Resume $resume
 */
class Education extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['resume_id', 'degree', 'field_of_study', 'educational_institution', 'year_from', 'year_to'], 'required'],
            [['resume_id', 'year_from', 'year_to'], 'integer'],
            [['description'], 'string'],
            [['degree', 'field_of_study', 'educational_institution'], 'string', 'max' => 255],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::class, 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'resume_id' => "string", 'degree' => "string", 'field_of_study' => "string", 'educational_institution' => "string", 'year_from' => "string", 'year_to' => "string", 'description' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'degree' => 'Degree',
            'field_of_study' => 'Field Of Study',
            'educational_institution' => 'Educational Institution',
            'year_from' => 'Year From',
            'year_to' => 'Year To',
            'description' => 'Description',
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
