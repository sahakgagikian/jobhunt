<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "resumes".
 *
 * @property int $id
 * @property int $candidate_id
 * @property string $candidate_name
 * @property string $candidate_email
 * @property string $candidate_location
 * @property string|null $candidate_website
 * @property float|null $candidate_desired_salary
 * @property int $candidate_age
 * @property string $update_date_and_time
 *
 * @property User $candidate
 * @property Education $educations
 * @property Experience $experiences
 * @property Skill $skills
 */
class Resume extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['candidate_id', 'candidate_name', 'candidate_email', 'candidate_profession_title', 'candidate_location', 'candidate_age', 'update_date_and_time'], 'required'],
            [['candidate_id', 'candidate_age'], 'integer'],
            [['candidate_age'], 'integer'],
            [['candidate_desired_salary'], 'number'],
            [['candidate_name', 'candidate_email', 'candidate_location', 'candidate_website', 'update_date_and_time'], 'string', 'max' => 255],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['candidate_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'candidate_id' => "string", 'candidate_name' => "string", 'candidate_email' => "string", 'candidate_location' => "string", 'candidate_website' => "string", 'candidate_desired_salary' => "string", 'candidate_age' => "string", 'update_date_and_time' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'candidate_id' => 'ID',
            'candidate_name' => 'Անուն',
            'candidate_email' => 'Էլ. փոստ',
            'candidate_location' => 'Բնակության վայր',
            'candidate_website' => 'Կայք',
            'candidate_desired_salary' => 'Ցանկալի աշխատավարձ',
            'candidate_age' => 'Տարիք',
            'update_date_and_time' => 'Թարմացվել է',
        ];
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

    public static function getCurrentResume($id): array|ActiveRecord|null
    {
        return Resume::find()->with(['educations', 'experiences', 'skills'])->where(['id' => $id])->one();
    }

    public static function getResume($id): bool|array|Resume|ActiveRecord
    {
        /* @var User $currentUser */
        /* @var Resume $currentResume */

        $currentUser = Yii::$app->getUser()->identity;
        $resumeIds = $currentUser->role == User::ROLE_CANDIDATE ? $currentUser->resumeIds : $currentUser->receivedResumeIds;
        $viewAllowed = in_array($id, $resumeIds);

        if (!$viewAllowed) {
            return false;
        }

        return self::getCurrentResume($id) ?? false;
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return ActiveQuery
     */
    /*public function getApplications()
    {
        return $this->hasMany(Application::class, ['id' => 'application_id']);
    }*/

    /**
     * Gets query for [[Educations]].
     *
     * @return ActiveQuery
     */
    public function getEducations(): ActiveQuery
    {
        return $this->hasMany(Education::class, ['resume_id' => 'id']);
    }

    /**
     * Gets query for [[Experiences]].
     *
     * @return ActiveQuery
     */
    public function getExperiences(): ActiveQuery
    {
        return $this->hasMany(Experience::class, ['resume_id' => 'id']);
    }

    /**
     * Gets query for [[Skills]].
     *
     * @return ActiveQuery
     */
    public function getSkills(): ActiveQuery
    {
        return $this->hasMany(Skill::class, ['resume_id' => 'id']);
    }
}
