<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property string $title
 * @property int $company_id
 * @property ActiveQuery $categories
 * @property int $vacancies_count
 * @property string $location
 * @property string $working_hours
 * @property int $min_salary
 * @property int|null $max_salary
 * @property string $description
 *
 * @property Category $category
 * @property User $company
 */
class Job extends ActiveRecord
{
    public array $categoryIds = [];

    /**+
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    #[Pure] public function rules(): array
    {
        return [
            [['title', 'company_id', 'vacancies_count', 'location', 'working_hours', 'min_salary', 'description'], 'required'],
            [['company_id', 'vacancies_count', 'min_salary', 'max_salary'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['location'], 'string', 'max' => 255],
            [['working_hours'], 'string', 'max' => 16],
            /*[
                ['max_salary'],
                'compare',
                'compareAttribute' => 'min_salary',
                'operator' => '!=',
                'message' => 'Առավելագույն աշխատավարձը պետք է մեծ լինի նվազագույնից։',
                'when' => function ($model) {
                    return $model->max_salary != null;
                }],*/
            [['description'], 'string', 'max' => 512],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['company_id' => 'id']],
            [['categoryIds'], 'each', 'rule' => ['exist', 'targetClass' => Category::class, 'targetAttribute' => 'id']],
        ];
    }

    #[ArrayShape(['id' => "string", 'title' => "string", 'company_id' => "string", 'vacancies_count' => "string", 'location' => "string", 'working_hours' => "string", 'min_salary' => "string", 'max_salary' => "string", 'description' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Անվանում',
            'company_id' => 'Գործատու',
            'vacancies_count' => 'Հաստիքների քանակ',
            'location' => 'Գտնվելու վայր',
            'working_hours' => 'Աշխատանքային ժամեր',
            'min_salary' => 'Նվազագույն աշխատավարձ',
            'max_salary' => 'Առավելագույն աշխատավարձ',
            'description' => 'Նկարագրություն'
        ];
    }

    /**
     * Gets query for [[JobsByCategory]].
     *
     * @return ActiveQuery
     */
    public function getJobsByCategory(): ActiveQuery
    {
        return $this->hasMany(JobCategory::class, ['job_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategories(): ActiveQuery
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->via('jobsByCategory');
    }

    /**
     * Gets query for [[Company]].
     *
     * @return ActiveQuery
     */
    public function getCompany(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'company_id']);
    }
}
