<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dosis;

/**
 * DosisSearch represents the model behind the search form about `app\models\Dosis`.
 */
class DosisSearch extends Dosis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dosis', 'meses_minimo', 'meses_maximo', 'id_vacuna', 'id_metodo'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = Dosis::find();

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
            'id_dosis' => $this->id_dosis,
            'meses_minimo' => $this->meses_minimo,
            'meses_maximo' => $this->meses_maximo,
            'id_vacuna' => $this->id_vacuna,
            'id_metodo' => $this->id_metodo,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
