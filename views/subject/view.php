<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Staff;
use app\models\Result;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Учёт субъектов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subject-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname:ntext',
            'address:ntext',
            'phone',
            'passport_id',
            'passport_issuer:ntext',
            'passport_date',
            'contents:ntext',
            [
                'label'     => 'Ответственный cотрудник',
                'value'     => function($model) {
                return Staff::findOne(['id'=>$model->staff_code])->fullname;
                }
            ],
            [
                'label'     => 'Результат',
                'value'     => function($model) {
                return Result::findOne(['id'=>$model->result_code])->response;
                }
            ],
//             'staff_code',
//             'result_code',
            [
                'label'     => 'Номер документа',
                'format'    => 'raw',
                'value'     => function($model) {
                return '<a href="#" onclick="javascript:return false;" title="Открыть документ № ' . $model->doc_id . '">' . $model->doc_id . '</a>';
                }
            ],
//             'doc_id',
            'doc_date',
        ],
    ]) ?>

</div>
