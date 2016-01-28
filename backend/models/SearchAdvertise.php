<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BAdvertise;

/**
 * SearchAdvertise represents the model behind the search form about `backend\models\BAdvertise`.
 */
class SearchAdvertise extends BAdvertise
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_show','show_in'], 'integer'],
            [['name', 'image', 'type','position','start_at', 'end_at', 'link'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = BAdvertise::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'is_show' => $this->is_show,
            'type' => $this->type,
            'position' => $this->position,
            'show_in' => $this->show_in,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
