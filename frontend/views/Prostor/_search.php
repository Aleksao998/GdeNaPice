<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProstorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prostor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProstor') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'imeProstora') ?>

    <?= $form->field($model, 'brTelefona') ?>

    <?= $form->field($model, 'igLink') ?>

    <?php // echo $form->field($model, 'vrstaProstora') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
