<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vem".
 *
 * @property int $vem_id
 * @property string $vem_name
 * @property string $vem_location
 * @property int $vem_type
 *
 * @property CustomerAppointment[] $customerAppointments
 * @property CustomerPurchase[] $customerPurchases
 * @property VemType $vemType
 * @property VemStatus[] $vemStatuses
 */
class Vem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vem_id', 'vem_name', 'vem_type'], 'required'],
            [['vem_id', 'vem_type'], 'integer'],
            [['vem_name', 'vem_location'], 'string', 'max' => 255],
            [['vem_id'], 'unique'],
            [['vem_type'], 'exist', 'skipOnError' => true, 'targetClass' => VemType::className(), 'targetAttribute' => ['vem_type' => 'vt_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vem_id' => 'Vem ID',
            'vem_name' => '药店名称',
            'vem_location' => '地址',
            'vem_type' => 'Vem Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAppointments()
    {
        return $this->hasMany(CustomerAppointment::className(), ['v_id' => 'vem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerPurchases()
    {
        return $this->hasMany(CustomerPurchase::className(), ['v_id' => 'vem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVemType()
    {
        return $this->hasOne(VemType::className(), ['vt_id' => 'vem_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVemStatuses()
    {
        return $this->hasMany(VemStatus::className(), ['vem_id' => 'vem_id']);
    }
}
