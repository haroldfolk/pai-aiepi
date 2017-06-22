<?php
use yii\helpers\Url as Url;

class AboutCest
{
    public function ensureThatPacienteWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/paciente/create'));
        $I->see('Create Paciente');
    }
}
