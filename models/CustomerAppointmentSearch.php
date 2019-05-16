<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustomerAppointment;

/**
 * CustomerAppointmentSearch represents the model behind the search form of `app\models\CustomerAppointment`.
 */
class CustomerAppointmentSearch extends CustomerAppointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ca_id', 'c_id', 'm_id', 'status', 'v_id', 'num', 'pa_id'], 'integer'],
            [['ca_time', 'deadline', 'img'], 'safe'],
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
        $query = CustomerAppointment::find();

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
            'ca_id' => $this->ca_id,
            'c_id' => $this->c_id,
            'm_id' => $this->m_id,
            'ca_time' => $this->ca_time,
            'status' => $this->status,
            'v_id' => $this->v_id,
            'deadline' => $this->deadline,
            'num' => $this->num,
            'pa_id' => $this->pa_id,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
