<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Prostor;

/**
 * ProstorSearch represents the model behind the search form of `common\models\Prostor`.
 */
class ProstorSearch extends Prostor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProstor', 'userId', 'brTelefona', 'vrstaProstora'], 'integer'],
            [['imeProstora', 'igLink'], 'safe'],
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
        $query = Prostor::find();

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
            'idProstor' => $this->idProstor,
            'userId' => $this->userId,
            'brTelefona' => $this->brTelefona,
            'vrstaProstora' => $this->vrstaProstora,
        ]);

        $query->andFilterWhere(['like', 'imeProstora', $this->imeProstora])
            ->andFilterWhere(['like', 'igLink', $this->igLink]);

        return $dataProvider;
    }
}
