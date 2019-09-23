<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property int $info_id
 * @property string $info_question
 * @property string $info_result
 * @property string $info_voice
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info_id'], 'required'],
            [['info_id'], 'integer'],
            [['info_question', 'info_result', 'info_voice'], 'string', 'max' => 255],
            [['info_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'info_question' => 'Info Question',
            'info_result' => 'Info Result',
            'info_voice' => 'Info Voice',
        ];
    }
}
