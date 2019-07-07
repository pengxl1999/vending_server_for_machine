<?php

namespace app\models;

use app\models\CustomerCar;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CustomerCarSearch represents the model behind the search form of `app\models\CustomerCar`.
 */
class CustomerCarSearch extends CustomerCar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cc_id', 'c_id', 'cc_medicine', 'cc_num'], 'integer'],
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
        $query = CustomerCar::find();

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
            'cc_id' => $this->cc_id,
            'c_id' => $this->c_id,
            'cc_medicine' => $this->cc_medicine,
            'cc_num' => $this->cc_num,
        ]);

        return $dataProvider;
    }

    public function searchByUser($userId) {       //根据用户名搜索
        $query = CustomerCar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->where([
            'c_id' => $userId,
        ]);

        return $dataProvider;
    }

    public function searchById($cartId) {       //根据购物车id搜索
        $query = CustomerCar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->where([
            'cc_id' => $cartId,
        ]);

        return $dataProvider;
    }
}
