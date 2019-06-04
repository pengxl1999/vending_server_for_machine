<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine_type".
 *
 * @property int $mt_id
 * @property string $mt_name
 *
 * @property Medicine[] $medicines
 */
class MedicineType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicine_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mt_id', 'mt_name'], 'required'],
            [['mt_id'], 'integer'],
            [['mt_name'], 'string', 'max' => 255],
            [['mt_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mt_id' => 'Mt ID',
            'mt_name' => 'Mt Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['type' => 'mt_id']);
    }
}
