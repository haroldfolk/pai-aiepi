<?php
use yii\helpers\Url as Url;

class PacienteCest
{
    public function ensureThatPacienteWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/paciente/create'));
        $I->see('Create Paciente');
    }
}
