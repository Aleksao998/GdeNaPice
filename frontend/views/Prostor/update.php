<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prostor */

$this->title = Yii::t('app', 'Update Prostor: {name}', [
    'name' => $model->idProstor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prostors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProstor, 'url' => ['view', 'id' => $model->idProstor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prostor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
