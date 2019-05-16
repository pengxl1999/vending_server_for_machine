<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vem;

/**
 * VemSearch represents the model behind the search form of `app\models\Vem`.
 */
class VemSearch extends Vem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vem_id', 'vem_type'], 'integer'],
            [['vem_name', 'vem_location'], 'safe'],
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
        $query = Vem::find();

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
            'vem_id' => $this->vem_id,
            'vem_type' => $this->vem_type,
        ]);

        $query->andFilterWhere(['like', 'vem_name', $this->vem_name])
            ->andFilterWhere(['like', 'vem_location', $this->vem_location]);

        return $dataProvider;
    }
}
