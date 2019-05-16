<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pharmacist;

/**
 * PharmacistSearch represents the model behind the search form of `app\models\Pharmacist`.
 */
class PharmacistSearch extends Pharmacist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'p_id'], 'integer'],
            [['name', 'location'], 'safe'],
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
        $query = Pharmacist::find();

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
            'u_id' => $this->u_id,
            'p_id' => $this->p_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
