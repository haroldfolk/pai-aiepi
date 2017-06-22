<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Red De Salud Este',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'cadena de frio', 'url' => ['/cadenafrio']],
            ['label' => 'Todo sobre vacunas', 'items'=>[
                    ['label' => 'metododeaplicacion', 'url' => ['/metodoaplicacion']],
                    ['label' => 'vacuna', 'url' => ['/vacuna']],
                    ['label' => 'rango de edad', 'url' => ['/rangoedad']],
                ],],

            ['label' => 'refrigerador', 'url' => ['/refrigerador']],
            ['label' => 'centrodesalud', 'url' => ['/centrodesalud']],
            ['label' => 'personal', 'url' => ['/personal']],
            ['label' => 'paciente', 'url' => ['/paciente']],
            ['label' => 'controlnutricional', 'url' => ['/controlnutricional']],
//            ['label' => 'actodevacunacion', 'url' => ['/actovacunacion']],
            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
<!--        --><?php //echo Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SQS Salces Calidad en Software <?= date('Y') ?></p>

        <p class="pull-right"><?='Taller de Grado '. date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
