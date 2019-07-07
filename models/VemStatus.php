<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vem_status".
 *
 * @property int $vemc_id
 * @property int $vem_id
 * @property int $m_id
 * @property int $num
 *
 * @property Vem $vem
 * @property Medicine $m
 */
class VemStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vem_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vem_id', 'm_id', 'num'], 'integer'],
            [['vem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vem::className(), 'targetAttribute' => ['vem_id' => 'vem_id']],
            [['m_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['m_id' => 'm_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vemc_id' => 'Vemc ID',
            'vem_id' => 'Vem ID',
            'm_id' => 'M ID',
            'num' => 'Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVem()
    {
        return $this->hasOne(Vem::className(), ['vem_id' => 'vem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getM()
    {
        return $this->hasOne(Medicine::className(), ['m_id' => 'm_id']);
    }
}
