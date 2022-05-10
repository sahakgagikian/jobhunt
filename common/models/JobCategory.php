<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "job_category".
 *
 * @property int $id
 * @property int $job_id
 * @property int $category_id
 *
 * @property Category $category
 * @property Job $job
 */
class JobCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'job_category';
    }

    /**
     * {@inheritdoc}
     */
    #[Pure] public function rules(): array
    {
        return [
            [['job_id', 'category_id'], 'required'],
            [['job_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::class, 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    #[ArrayShape(['id' => "string", 'job_id' => "string", 'category_id' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
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

    public function setJobCategory(JobCategory $jobCategory, $job, $categoryId)
    {
        $jobCategory->job_id = $job->id;
        $jobCategory->category_id = $categoryId;
        $jobCategory->save();
    }
}
