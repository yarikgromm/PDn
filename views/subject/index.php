<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Staff;
use app\models\Result;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учёт субъектов';
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
//             'passport_id',
            //'passport_issuer:ntext',
            //'passport_date',
            'contents:ntext',
            //'staff_code',
            [
                'attribute' => 'staff_code',
                'label'     => 'Ответственный',
                'value'     => function($model) {
                    return Staff::findOne(['id'=>$model->staff_code])->fullname;
                }
            ],
            //'result_code',
            [
                'attribute' => 'result_code',
                'label'     => 'Результат',
                'value'     => function($model) {
                return Result::findOne(['id'=>$model->result_code])->response;
                }
            ],
            //'doc_id',
            //'doc_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
