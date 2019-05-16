<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine_man".
 *
 * @property int $mm_id
 * @property string $mm_name
 *
 * @property Medicine[] $medicines
 */
class MedicineMan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicine_man';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mm_id', 'mm_name'], 'required'],
            [['mm_id'], 'integer'],
            [['mm_name'], 'string', 'max' => 255],
            [['mm_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mm_id' => 'Mm ID',
            'mm_name' => 'Mm Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['manufacturer' => 'mm_id']);
    }
}
