<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacuna;

/**
 * VacunaSearch represents the model behind the search form about `app\models\Vacuna`.
 */
class VacunaSearch extends Vacuna
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vacuna', 'nro_dosis', 'id_metodo'], 'integer'],
            [['nombre', 'unidad_de_medida', 'descripcion'], 'safe'],
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
        $query = Vacuna::find();

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
            'id_vacuna' => $this->id_vacuna,
            'nro_dosis' => $this->nro_dosis,
            'id_metodo' => $this->id_metodo,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'unidad_de_medida', $this->unidad_de_medida])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
