<?php

namespace app\models;

use app\models\VemStatus;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VemStatusSearch represents the model behind the search form of `app\models\VemStatus`.
 */
class VemStatusSearch extends VemStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vemc_id', 'vem_id', 'm_id', 'num'], 'integer'],
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
        $query = VemStatus::find();

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
            'vemc_id' => $this->vemc_id,
            'vem_id' => $this->vem_id,
            'm_id' => $this->m_id,
            'num' => $this->num,
        ]);

        return $dataProvider;
    }

    /**
     * 搜索所有
     * @param $machine
     * @return ActiveDataProvider
     */
    public function searchAll($machine)
    {
        $query = VemStatus::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'vem_id' => $machine,
        ]);

        return $dataProvider;
    }

    public function searchByParams($machine, $param) {
        $query = VemStatus::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'vem_id' => $machine,
            'm_id' => $param,
        ]);

        return $dataProvider;
    }
}
