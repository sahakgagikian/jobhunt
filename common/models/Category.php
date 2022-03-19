<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property int|null $jobs_count
 * @property int|null $sort
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $imagePath
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['jobs_count', 'sort'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 64],
            [['image'], 'image', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'imagePath' => 'Image',
            'jobs_count' => 'Jobs Count',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getImagePath(): string
    {
        return Yii::getAlias('@frontend') . '/web/images/';
    }

    public function getImageUrl(): string
    {
        return '/images/'. $this->image;
    }

    public function upload(): bool
    {
        if ($this->validate()) {
            $imageName = uniqid('category_') . '.' . $this->image->extension;
            $this->image->saveAs($this->imagePath . $imageName);
            $this->image = $imageName;

            return true;
        } else {
            return false;
        }
    }
}
