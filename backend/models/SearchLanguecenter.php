<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BLanguecenter;

/**
 * SearchLanguecenter represents the model behind the search form about `backend\models\BLanguecenter`.
 */
class SearchLanguecenter extends BLanguecenter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'is_show'], 'integer'],
            [['name', 'decription', 'image', 'address', 'url','phone'], 'safe'],
            [['rate'], 'number'],
            [['email'], 'email'],
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
        $query = BLanguecenter::find();

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
            'rate' => $this->rate,
            'is_show' => $this->is_show,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'decription', $this->decription])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
