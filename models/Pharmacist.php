<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pharmacist".
 *
 * @property int $u_id
 * @property int $p_id
 * @property string $name
 * @property string $location
 *
 * @property PharmacistAppointment[] $pharmacistAppointments
 */
class Pharmacist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pharmacist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'name'], 'required'],
            [['u_id', 'p_id'], 'integer'],
            [['name', 'location'], 'string', 'max' => 255],
            [['u_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'p_id' => 'P ID',
            'name' => 'Name',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPharmacistAppointments()
    {
        return $this->hasMany(PharmacistAppointment::className(), ['p_id' => 'u_id']);
    }
}
