<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MedicineMan;

/**
 * MedicineManSearch represents the model behind the search form of `app\models\MedicineMan`.
 */
class MedicineManSearch extends MedicineMan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mm_id'], 'integer'],
            [['mm_name'], 'safe'],
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
        $query = MedicineMan::find();

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
            'mm_id' => $this->mm_id,
        ]);

        $query->andFilterWhere(['like', 'mm_name', $this->mm_name]);

        return $dataProvider;
    }
}
