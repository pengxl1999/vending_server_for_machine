<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property int $m_id
 * @property string $name
 * @property string $commodity_name
 * @property string $common_name
 * @property string $other_name
 * @property string $english_name
 * @property int $type
 * @property string $composition
 * @property string $usage
 * @property string $symptom
 * @property string $attention
 * @property string $interaction
 * @property string $dose
 * @property int $number
 * @property int $guarantee
 * @property int $fomulation
 * @property int $brand
 * @property string $cert
 * @property int $manufacturer
 * @property string $img
 * @property string $money
 *
 * @property CustomerAppointment[] $customerAppointments
 * @property CustomerCar[] $customerCars
 * @property CustomerPurchase[] $customerPurchases
 * @property MedicineType $type0
 * @property MedicineMan $manufacturer0
 * @property MedicineBrand $brand0
 * @property MedicineFormulation $fomulation0
 * @property VemStatus[] $vemStatuses
 */
class Medicine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_id', 'guarantee', 'cert', 'money'], 'required'],
            [['m_id', 'type', 'number', 'guarantee', 'fomulation', 'brand', 'manufacturer'], 'integer'],
            [['money'], 'number'],
            [['name', 'commodity_name', 'common_name', 'other_name', 'english_name', 'composition', 'img'], 'string', 'max' => 255],
            [['usage', 'symptom', 'attention', 'interaction'], 'string', 'max' => 1024],
            [['dose'], 'string', 'max' => 10],
            [['cert'], 'string', 'max' => 20],
            [['m_id'], 'unique'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => MedicineType::className(), 'targetAttribute' => ['type' => 'mt_id']],
            [['manufacturer'], 'exist', 'skipOnError' => true, 'targetClass' => MedicineMan::className(), 'targetAttribute' => ['manufacturer' => 'mm_id']],
            [['brand'], 'exist', 'skipOnError' => true, 'targetClass' => MedicineBrand::className(), 'targetAttribute' => ['brand' => 'mb_id']],
            [['fomulation'], 'exist', 'skipOnError' => true, 'targetClass' => MedicineFormulation::className(), 'targetAttribute' => ['fomulation' => 'mft_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'm_id' => 'ID',
            'name' => '药品名称',
            'commodity_name' => 'Commodity Name',
            'common_name' => 'Common Name',
            'other_name' => 'Other Name',
            'english_name' => '英文名称',
            'type' => '类型',         //处方or非处方
            'composition' => 'Composition',
            'usage' => '用法',
            'symptom' => '适应症',
            'attention' => '注意事项',
            'interaction' => 'Interaction',
            'dose' => 'Dose',
            'number' => 'Number',
            'guarantee' => 'Guarantee',
            'fomulation' => 'Fomulation',
            'brand' => '商标',
            'cert' => 'Cert',
            'manufacturer' => '生产商',
            'img' => '图片',
            'money' => '价格',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAppointments()
    {
        return $this->hasMany(CustomerAppointment::className(), ['m_id' => 'm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerCars()
    {
        return $this->hasMany(CustomerCar::className(), ['cc_medicine' => 'm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerPurchases()
    {
        return $this->hasMany(CustomerPurchase::className(), ['m_id' => 'm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(MedicineType::className(), ['mt_id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer0()
    {
        return $this->hasOne(MedicineMan::className(), ['mm_id' => 'manufacturer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand0()
    {
        return $this->hasOne(MedicineBrand::className(), ['mb_id' => 'brand']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFomulation0()
    {
        return $this->hasOne(MedicineFormulation::className(), ['mft_id' => 'fomulation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVemStatuses()
    {
        return $this->hasMany(VemStatus::className(), ['m_id' => 'm_id']);
    }
}
