<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'async')->dropDownList(['0' => 'Sync', '1' => 'Async',]) ?>

    <?= $form->field($model, 'cnt')->dropDownList([
		'1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6',
		]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
