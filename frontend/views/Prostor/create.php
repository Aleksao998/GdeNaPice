<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prostor */

$this->title = Yii::t('app', 'Create Prostor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prostors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prostor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
