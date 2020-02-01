<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Prostor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prostor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'imeProstora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brTelefona')->textInput() ?>

    <?= $form->field($model, 'igLink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vrstaProstora')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
