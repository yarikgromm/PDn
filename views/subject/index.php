<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Staff;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subject', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname:ntext',
//             'address:ntext',
            'phone',
            'passport_id',
            //'passport_issuer:ntext',
            //'passport_date',
            'contents:ntext',
            //'staff_code',
            [
                'attribute' => 'staff',
                'label'     => 'Ответственный',
                'value'     => function($model) {
                    return Staff::findOne(['id'=>$model->staff_code])->fullname;
                }
            ],
            //'result_code',
            //'doc_id',
            //'doc_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
