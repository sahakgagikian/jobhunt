<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property int $candidate_id
 * @property int $job_id
 * @property int $resume_id
 * @property int $company_id
 *
 * @property Job $job
 * @property Resume $resume
 */
class Application extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['candidate_id', 'job_id', 'resume_id'], 'integer'],
            [['candidate_id', 'job_id', 'resume_id'], 'required'],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['candidate_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::class, 'targetAttribute' => ['job_id' => 'id']],
            [['candidate_id'], 'unique', 'targetAttribute' => ['candidate_id', 'job_id'], 'message' => 'Application is already sent.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'candidate_id' => "string", 'job_id' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'candidate_id' => 'Candidate ID',
            'job_id' => 'Job ID',
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return ActiveQuery
     */
    public function getJob(): ActiveQuery
    {
        return $this->hasOne(Job::class, ['id' => 'job_id']);
    }

    /**
     * Gets query for [[Candidate]].
     *
     * @return ActiveQuery
     */
    public function getCandidate(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'candidate_id']);
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
