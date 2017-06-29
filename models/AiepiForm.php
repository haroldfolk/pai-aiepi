<?php
namespace app\models;
use yii\base\Model;

/**
 * Created by PhpStorm.
 * User: Harold Salces
 * Date: 29/06/2017
 * Time: 07:38
 */
class AiepiForm extends \yii\db\ActiveRecord
{
    public $fechainicio;
    public $fechafin;
    public $sexo;
public $edadinicio;
    public $edadfin;
    public $idcentro;
    public function rules()
    {
        return [
            // username and password are both required
            [['fechainicio', 'fechafin','sexo','edadinicio','edadfin','idcentro'], 'required'],
            [['fechainicio', 'fechafin'], 'safe'],
            // password is validated by validatePassword()

        ];
    }



}