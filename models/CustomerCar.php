<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_car".
 *
 * @property int $cc_id
 * @property int $c_id
 * @property int $cc_medicine
 * @property int $cc_num
 *
 * @property Medicine $ccMedicine
 * @property User $c
 */
class CustomerCar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id', 'cc_medicine', 'cc_num'], 'required'],
            [['c_id', 'cc_medicine', 'cc_num'], 'integer'],
            [['cc_medicine'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['cc_medicine' => 'm_id']],
            [['c_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['c_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cc_id' => 'Cc ID',
            'c_id' => 'C ID',
            'cc_medicine' => 'Cc Medicine',
            'cc_num' => 'Cc Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCcMedicine()
    {
        return $this->hasOne(Medicine::className(), ['m_id' => 'cc_medicine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(User::className(), ['id' => 'c_id']);
    }

    public static function getMaxId() {
        return CustomerCar::find()->max('cc_id');
    }
}
