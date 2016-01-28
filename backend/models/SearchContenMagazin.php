<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BContentMagazin;

/**
 * SearchContenMagazin represents the model behind the search form about `backend\models\BContentMagazin`.
 */
class SearchContenMagazin extends BContentMagazin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Day'], 'integer'],
            [['Level', 'Subject', 'Content'], 'safe'],
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
        $query = BContentMagazin::find();

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
            'Day' => $this->Day,
        ]);

        $query->andFilterWhere(['like', 'Level', $this->Level])
            ->andFilterWhere(['like', 'Subject', $this->Subject])
            ->andFilterWhere(['like', 'Content', $this->Content]);

        return $dataProvider;
    }
}
