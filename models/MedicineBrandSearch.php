<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MedicineBrand;

/**
 * MedicineBrandSearch represents the model behind the search form of `app\models\MedicineBrand`.
 */
class MedicineBrandSearch extends MedicineBrand
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mb_id'], 'integer'],
            [['mb_name', 'mb_img'], 'safe'],
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
        $query = MedicineBrand::find();

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
            'mb_id' => $this->mb_id,
        ]);

        $query->andFilterWhere(['like', 'mb_name', $this->mb_name])
            ->andFilterWhere(['like', 'mb_img', $this->mb_img]);

        return $dataProvider;
    }
}
