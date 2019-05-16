<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine_formulation".
 *
 * @property int $mft_id
 * @property string $mtf_name
 *
 * @property Medicine[] $medicines
 */
class MedicineFormulation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicine_formulation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mft_id', 'mtf_name'], 'required'],
            [['mft_id'], 'integer'],
            [['mtf_name'], 'string', 'max' => 255],
            [['mft_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mft_id' => 'Mft ID',
            'mtf_name' => 'Mtf Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['fomulation' => 'mft_id']);
    }
}
