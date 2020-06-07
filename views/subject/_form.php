<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Staff;
use app\models\Result;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */
/* @var $form yii\widgets\ActiveForm */

$staff  = Staff::find()->select(['fullname'])->indexBy('id')->column();
$result = Result::find()->select(['response'])->indexBy('id')->column();

?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_issuer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'passport_date')->textInput() ?>

    <?= $form->field($model, 'contents')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'staff_code')->dropDownList($staff) ?>
    <!-- ?= $form->field($model, 'staff_code')->textInput() ?-->

    <?= $form->field($model, 'result_code')->dropDownList($result) ?>
    <!-- ?= $form->field($model, 'result_code')->textInput() ?-->

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
