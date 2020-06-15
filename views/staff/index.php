<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Department;
use app\models\Subject;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Специалисты';
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
                'attribute' => 'department_code',
                'label'     => 'Отдел',
                'value'     => function($model) {
                    return Department::findOne(['id'=>$model->department_code])->name;
                }
            ],
            'room',
            'phone',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'attribute' => 'null',
                'label'     => 'Дела в работе',
                'format'    => 'raw',
                'value'     => function($model) {
                $list = Subject::find()->where(['staff_code'=>$model->id])->all();
                $n = count($list);
                $t = '';
                foreach ($list as $item) {
                    $t .= 'Субъект:<br><a target="_blank" href="/subject/view?id=' . $item->id . '"><h4>' . $item->fullname .
                        '</h4></a><br>Содержание обращения:<br>' . $item-> contents . '<br><hr>';
                }
                $modalId = 'modalID'.$model->id;
                return
                
'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#' . $modalId . '"  data-whatever="">' . $n . '</button>
<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalId . 'Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="' . $modalId . 'Label">Документы в работе: </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ' . $t . '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>';
                }
                ],
        ],
    ]); ?>


</div>
