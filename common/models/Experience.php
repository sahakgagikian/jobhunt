<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "experiences".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $company_name
 * @property string $title
 * @property string $year_from
 * @property string $year_to
 * @property string|null $description
 *
 * @property Resume $resume
 */
class Experience extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['resume_id', 'company_name', 'title', 'year_from', 'year_to'], 'required'],
            [['resume_id'], 'integer'],
            [['year_from', 'year_to'], 'safe'],
            [['description'], 'string'],
            [['company_name', 'title'], 'string', 'max' => 255],
            [['resume_id'], 'exist', 'skipOnError' => true, 'targetClass' => Resume::class, 'targetAttribute' => ['resume_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'resume_id' => "string", 'company_name' => "string", 'title' => "string", 'year_from' => "string", 'year_to' => "string", 'description' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'company_name' => 'Company Name',
            'title' => 'Title',
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
