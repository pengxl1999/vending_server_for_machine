<?php

namespace app\models;

use app\models\Medicine;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MedicineSearch represents the model behind the search form of `app\models\Medicine`.
 */
class MedicineSearch extends Medicine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['m_id', 'type', 'number', 'guarantee', 'fomulation', 'brand', 'manufacturer'], 'integer'],
            [['name', 'commodity_name', 'common_name', 'other_name', 'english_name', 'composition', 'usage', 'symptom', 'attention', 'interaction', 'dose', 'cert',
                //'img'
            ], 'safe'],
            [['money'], 'number'],
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
        $query = Medicine::find();
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
            'm_id' => $this->m_id,
            'type' => $this->type,
            'number' => $this->number,
            'guarantee' => $this->guarantee,
            'fomulation' => $this->fomulation,
            'brand' => $this->brand,
            'manufacturer' => $this->manufacturer,
            'money' => $this->money,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'commodity_name', $this->commodity_name])
            ->andFilterWhere(['like', 'common_name', $this->common_name])
            ->andFilterWhere(['like', 'other_name', $this->other_name])
            ->andFilterWhere(['like', 'english_name', $this->english_name])
            ->andFilterWhere(['like', 'composition', $this->composition])
            ->andFilterWhere(['like', 'usage', $this->usage])
            ->andFilterWhere(['like', 'symptom', $this->symptom])
            ->andFilterWhere(['like', 'attention', $this->attention])
            ->andFilterWhere(['like', 'interaction', $this->interaction])
            ->andFilterWhere(['like', 'dose', $this->dose])
            ->andFilterWhere(['like', 'cert', $this->cert])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }

    public function searchByParams($params)
    {
        $query = Medicine::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->orFilterWhere([
            'm_id' => $params,
            'type' => $params,
            'number' => $params,
            'guarantee' => $params,
            'fomulation' => $params,
            'brand' => $params,
            'manufacturer' => $params,
            'money' => $params,
        ]);

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'commodity_name', $params])
            ->orFilterWhere(['like', 'common_name', $params])
            ->orFilterWhere(['like', 'other_name', $params])
            ->orFilterWhere(['like', 'english_name', $params])
            ->orFilterWhere(['like', 'composition', $params])
            ->orFilterWhere(['like', 'usage', $params])
            ->orFilterWhere(['like', 'symptom', $params])
            ->orFilterWhere(['like', 'attention', $params])
            ->orFilterWhere(['like', 'interaction', $params])
            ->orFilterWhere(['like', 'dose', $params])
            ->orFilterWhere(['like', 'cert', $params])
            ->orFilterWhere(['like', 'img', $params]);

        return $dataProvider;
    }
}
