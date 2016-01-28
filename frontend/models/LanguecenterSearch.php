<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FLanguecenter;

/**
 * LanguecenterSearch represents the model behind the search form about `frontend\models\FLanguecenter`.
 */
class LanguecenterSearch extends FLanguecenter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ordinal_view'], 'integer'],
            [['name', 'decription', 'image', 'address', 'open_at', 'url'], 'safe'],
            [['rate'], 'number'],
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
        $query = FLanguecenter::find();

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
            'ID' => $this->ID,
            'open_at' => $this->open_at,
            'rate' => $this->rate,
            'ordinal_view' => $this->ordinal_view,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'decription', $this->decription])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
