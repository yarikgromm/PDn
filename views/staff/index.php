<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname',
//             'department_code',
            [
                'attribute' => 'department',
                'label'     => 'Отдел',
                'value'     => function($model) {
                    return Department::findOne(['id'=>$model->department_code])->name;
                }
            ],
            'room',
            'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
