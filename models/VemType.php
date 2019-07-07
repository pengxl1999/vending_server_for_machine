<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vem_type".
 *
 * @property int $vt_id
 * @property string $vt_name
 *
 * @property Vem[] $vems
 */
class VemType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vem_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vt_id', 'vt_name'], 'required'],
            [['vt_id'], 'integer'],
            [['vt_name'], 'string', 'max' => 255],
            [['vt_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vt_id' => 'Vt ID',
            'vt_name' => 'Vt Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVems()
    {
        return $this->hasMany(Vem::className(), ['vem_type' => 'vt_id']);
    }
}
