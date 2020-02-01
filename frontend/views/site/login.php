<?php



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */



use yii\helpers\Html;

use kartik\form\ActiveForm;



$this->title = 'Login';

$this->params['breadcrumbs'][] = $this->title;

?>

<?php

$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");

?>

<!-- Sing in  Form -->

<div class="row loginPage" style="background-color:#f8f8f8;">

<section class="sign-in" style="margin-top:100px; margin-bottom:100px;">

    <div class="containerSignUp">

        <div class="signin-content">

            <div class="signin-image">

                <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>

                <a href="http://gdenapice.com/index.php?r=site%2Fsignup" class="signup-image-link" style="font-size:16px;">Napravi novi nalog!</a>

            </div>



            <div class="signin-form">



                  <?php $form = ActiveForm::begin(['id' => 'login-form-horizontal',

                   'type' => ActiveForm::TYPE_HORIZONTAL,

                   'formConfig' => ['labelSpan' => 1, 'deviceSize' => ActiveForm::SIZE_SMALL],

                  'class' => 'register-form']); ?>





                    <div class="form-group">

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    </div>

                    <div class="form-group">

                         <?= $form->field($model, 'password')->passwordInput() ?>

                    </div>



                    <div class="form-group form-button">

                         <?= Html::submitButton('Uloguj se', ['class' => 'login_button', 'name' => 'login-button']) ?>

                    </div>

                <?php ActiveForm::end(); ?>



            </div>

        </div>

    </div>

</section>

</div>

