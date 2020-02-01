<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use kartik\form\ActiveField;
use kartik\form\ActiveForm;
use kartik\password\StrengthValidator;
use kartik\time\TimePicker;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<div class="site-signup signupPage">

  <!--TITLE and description -->
  <div class="row" style="margin-top:40px;">
    <div class="center" style="margin-top:10px;">
      <div class="section-heading">
          <h2> Online prijava </h2>
      <div class="heading-line"></div>
      <h1>
        Brzo i lako! Dovoljno je da upišete osnovne podatke i vec postajete deo ekipe
      </h1>
      </div>
  </div>
  </div>

<div class="row">
<div class="col-md-6 col-md-offset-3" style="font-size:17px;">

      <?php $form = ActiveForm::begin([
                                        'id' => 'form-signup',
                                        'type' => ActiveForm::TYPE_HORIZONTAL,

                                      ]); ?>

          <!--Email ActiveField -->
          <?php
          echo $form->field($model, 'email',[
                                'feedbackIcon' => [
                                'prefix' => 'fas fa-',
                                'default' => 'envelope',
                                'success' => 'check text-success',
                                'error' => 'exclamation-triangle text-danger',
                                'defaultOptions' => ['class'=>'text-primary']]
                              ]
                           )->textInput(['placeholder'=>'Enter email...']);
          ?>

          <!--Password ActiveField -->

          <?=

          $form->field($model, 'password',
                              ['hintType' => ActiveField::HINT_SPECIAL,'hintSettings' =>
                              ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false],
                              'feedbackIcon' => [
                                'prefix' => 'fas fa-',
                                'default' => 'key',
                                'success' => 'check text-success',
                                'error' => 'exclamation-triangle text-danger',
                                'defaultOptions' => ['class'=>'text-primary']]
                              ]
                          )->passwordInput()->hint('Sifra mora da sadrzi minimum 6 karaktera i jedan znak!');

           ?>

           <?=

           $form->field($model, 'repeatnewpass',
                               ['hintType' => ActiveField::HINT_SPECIAL,'hintSettings' =>
                               ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false],
                               'feedbackIcon' => [
                                 'prefix' => 'fas fa-',
                                 'default' => 'key',
                                 'success' => 'check text-success',
                                 'error' => 'exclamation-triangle text-danger',
                                 'defaultOptions' => ['class'=>'text-primary']]
                               ]
                           )->passwordInput();

            ?>

           <!--Name ActiveField -->
           <?=

           $form->field($model, 'username', [
                                    'feedbackIcon' => [
                                      'prefix' => 'fas fa-',
                                      'default' => 'user',
                                      'success' => 'check text-success',
                                      'error' => 'exclamation-triangle text-danger',
                                      'defaultOptions' => ['class'=>'text-primary']
                                                      ]
                                          ])->textInput(['placeholder'=>'Enter Name...'])->label("Naziv");

           ?>


           <!--Location ActiveField -->
           <?=

           $form->field($lokacija, 'adresa',
                              ['hintType' => ActiveField::HINT_SPECIAL,'hintSettings' =>
                              ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false],
                                    'feedbackIcon' => [
                                      'prefix' => 'fas fa-',
                                      'default' => 'map-pin',
                                      'success' => 'check text-success',
                                      'error' => 'exclamation-triangle text-danger',
                                      'defaultOptions' => ['class'=>'text-primary']
                                      ]
                                      ])->textInput(['placeholder'=>'Enter Your Adress...']);

           ?>
           <br />
           <!--TypeOfLocal ActiveField -->
           <?=

            $form->field($prostor, 'vrstaProstora')->radioList(
                        [8 => 'Kafana', 1 => 'Kafanica', 2 => 'Pivnica',3 => 'Vinarija', 4 => 'Klub', 5 => 'Caffe&Bar', 6 => 'Kafic', 7 => 'Nargila'],
                        ['custom' => true, 'inline' => true, 'id' => 'custom-radio-list-inline', 'class'=>'signupList']
                        );

           ?>





</div>

</div>
<div class="col-md-12">
<div class="form-group row">

   <?= Html::submitButton('Signup', ['class' => 'signup_button', 'name' => 'signup-button', 'style'=>'margin: 0 auto;display: block;']) ?>


<?php ActiveForm::end(); ?>
</div>
</div>




</div>
