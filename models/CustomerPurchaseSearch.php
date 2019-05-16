<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustomerPurchase;

/**
 * CustomerPurchaseSearch represents the model behind the search form of `app\models\CustomerPurchase`.
 */
class CustomerPurchaseSearch extends CustomerPurchase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cp_id', 'c_id', 'm_id', 'status', 'v_id', 'num', 'pa_id'], 'integer'],
            [['cp_time', 'img'], 'safe'],
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
        $query = CustomerPurchase::find();

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
            'cp_id' => $this->cp_id,
            'c_id' => $this->c_id,
            'm_id' => $this->m_id,
            'cp_time' => $this->cp_time,
            'status' => $this->status,
            'v_id' => $this->v_id,
            'num' => $this->num,
            'pa_id' => $this->pa_id,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }

    public function searchByParams($param) {
        $query = CustomerPurchase::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->orFilterWhere([
            'cp_id' => $param,
            //'c_id' => $this->c_id,
            //'m_id' ,
            'cp_time' => $param,
            'status' => $param,
            //'v_id' => $this->v_id,
            //'num' => $this->num,
            //'pa_id' => $this->pa_id,
        ]);

        //$query->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
