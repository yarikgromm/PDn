<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => Yii::$app->user->isGuest ? ([
            ['label' => 'О программе', 'url' => ['/site/about']],
            ['label' => 'Вход', 'url' => ['/site/login']],
        
        ]) : ([
                    ['label' => 'Учёт работ', 'url' => ['/site/index']],
                    ['label' => 'Клиенты', 'url' => ['/site/client']],
                    ['label' => 'Отделы', 'url' => ['/department/index']],
                    ['label' => 'Специалисты', 'url' => ['/staff/index']],
                    ['label' => 'О программе', 'url' => ['/site/about']],
            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                            'Выход (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'btn btn-link logout']
                            )
                    . Html::endForm()
                            . '</li>'
        
        ]),

//         'items' => [
//             Yii::$app->user->isGuest ? ([]) : (
//             ['label' => 'Учёт работ', 'url' => ['/site/index']],
//             ['label' => 'Клиенты', 'url' => ['/site/client']],
//             ['label' => 'Отделы', 'url' => ['/site/department']],
//             ['label' => 'Специалисты', 'url' => ['/site/staff']]),
//             ['label' => 'О программе', 'url' => ['/site/about']],
// //             ['label' => 'Контакты', 'url' => ['/site/contact']],
//             Yii::$app->user->isGuest ? (
//                 ['label' => 'Вход', 'url' => ['/site/login']]
//             ) : (
//                 '<li>'
//                 . Html::beginForm(['/site/logout'], 'post')
//                 . Html::submitButton(
//                     'Выход (' . Yii::$app->user->identity->login . ')',
//                     ['class' => 'btn btn-link logout']
//                 )
//                 . Html::endForm()
//                 . '</li>'
//             )
//         ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ИСПДн <?= date('Y') ?></p>

        <!--p class="pull-right"><?= Yii::powered() ?></p-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
