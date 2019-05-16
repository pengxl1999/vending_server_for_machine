<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PharmacistAppointment;

/**
 * PharmacistAppointmentSearch represents the model behind the search form of `app\models\PharmacistAppointment`.
 */
class PharmacistAppointmentSearch extends PharmacistAppointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pa_id', 'p_id'], 'integer'],
            [['time', 'image', 'reason'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PharmacistAppointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pa_id' => $this->pa_id,
            'p_id' => $this->p_id,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
