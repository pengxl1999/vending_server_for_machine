<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pharmacist_appointment".
 *
 * @property int $pa_id
 * @property int $p_id
 * @property string $time
 * @property string $image
 * @property string $reason
 *
 * @property CustomerAppointment[] $customerAppointments
 * @property CustomerPurchase[] $customerPurchases
 * @property Pharmacist $p
 */
class PharmacistAppointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pharmacist_appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pa_id'], 'required'],
            [['pa_id', 'p_id'], 'integer'],
            [['time'], 'safe'],
            [['image'], 'string', 'max' => 20],
            [['reason'], 'string', 'max' => 255],
            [['pa_id'], 'unique'],
            [['p_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pharmacist::className(), 'targetAttribute' => ['p_id' => 'u_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pa_id' => 'Pa ID',
            'p_id' => 'P ID',
            'time' => 'Time',
            'image' => 'Image',
            'reason' => 'Reason',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAppointments()
    {
        return $this->hasMany(CustomerAppointment::className(), ['pa_id' => 'pa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerPurchases()
    {
        return $this->hasMany(CustomerPurchase::className(), ['pa_id' => 'pa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Pharmacist::className(), ['u_id' => 'p_id']);
    }
}
