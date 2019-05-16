<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MedicineType;

/**
 * MedicineTypeSearch represents the model behind the search form of `app\models\MedicineType`.
 */
class MedicineTypeSearch extends MedicineType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mt_id'], 'integer'],
            [['mt_name'], 'safe'],
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
        $query = MedicineType::find();

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
            'mt_id' => $this->mt_id,
        ]);

        $query->andFilterWhere(['like', 'mt_name', $this->mt_name]);

        return $dataProvider;
    }

    public function searchById($params)
    {
        $query = MedicineType::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'mt_id' => $this->mt_id,
        ]);

        return $dataProvider;
    }
}
