<?php
namespace app\models;
use yii\base\Model;

/**
 * Created by PhpStorm.
 * User: Harold Salces
 * Date: 29/06/2017
 * Time: 07:38
 */
class PaiForm extends \yii\db\ActiveRecord
{
    public $fechainicio;
    public $fechafin;
    public $dosis;

    public function rules()
    {
        return [
            // username and password are both required
            [['fechainicio', 'fechafin','dosis'], 'required'],
            [['fechainicio', 'fechafin'], 'safe'],
            // password is validated by validatePassword()
            [['dosis'], 'integer'],
        ];
    }



}