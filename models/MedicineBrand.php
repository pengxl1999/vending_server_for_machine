<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine_brand".
 *
 * @property int $mb_id
 * @property string $mb_name
 * @property string $mb_img
 *
 * @property Medicine[] $medicines
 */
class MedicineBrand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicine_brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mb_id', 'mb_name'], 'required'],
            [['mb_id'], 'integer'],
            [['mb_name'], 'string', 'max' => 255],
            [['mb_img'], 'string', 'max' => 16],
            [['mb_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mb_id' => 'Mb ID',
            'mb_name' => 'Mb Name',
            'mb_img' => 'Mb Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['brand' => 'mb_id']);
    }
}
