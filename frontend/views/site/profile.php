<?php

use yii\helpers\Html;

use kartik\form\ActiveField;

use kartik\form\ActiveForm;

use kartik\growl\Growl;

use kartik\detail\DetailView;

use kartik\grid\GridView;

use kartik\dynagrid\DynaGrid;

use kartik\editable\Editable;

use kartik\time\TimePicker;

$this->title = 'Profile';

$vrstaProstoraNaziv='';

$boja="";

if($prostor->vrstaProstora==1) {

  $vrstaProstoraNaziv='Kafanica';

  $boja="#70d8ad";

}

if($prostor->vrstaProstora==2){

  $vrstaProstoraNaziv='Pub';  $boja="#fcd55a";

}

if($prostor->vrstaProstora==3)  {

  $vrstaProstoraNaziv='Vinarija';

  $boja="#ba314b";

}

if($prostor->vrstaProstora==4){

  $vrstaProstoraNaziv='Klub';

  $boja="#5eccd6";

}

if($prostor->vrstaProstora==5){

   $vrstaProstoraNaziv='Caffe&Bar';

   $boja="#a678e4";

}

if($prostor->vrstaProstora==6) {

  $vrstaProstoraNaziv='Kafic';

   $boja="#6f4e37";

}

if($prostor->vrstaProstora==7){

   $vrstaProstoraNaziv='Nargila';

   $boja="#6a78ff";

}

if($prostor->vrstaProstora==8) {

  $vrstaProstoraNaziv='Kafana';

   $boja="#70d8ad";

}





?>













<div class="wrapper" style="margin-top:100px;">

  <div class="container-full margin-big">

  <div class="row">





    <div id="narrow-browser-alert" class="alert alert-info text-center" style="background-color: <?php echo $boja?>;color: #ffffff;border-color: #fff; margin-bottom:40px;">

      <strong> <?php echo $prostor->imeProstora; ?></strong> <br><?php echo $vrstaProstoraNaziv?></div>



    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

      <ul id="myTab" class="nav nav-tabs nav-tabs-responsive profile_field" role="tablist">

        <li role="presentation" class="active">

          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">

            <span class="text profile_tabs">Licni podaci</span>

          </a>

        </li>

        <li role="presentation" class="next">

          <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">

            <span class="text profile_tabs">Radno vreme</span>

          </a>

        </li>

        <li role="presentation">

          <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa" class="profile_field">

            <span class="text profile_tabs">Promocije</span>

          </a>

        </li>

      </ul>

</div>

</div>







      <!--LICNI PODACI-->

      <div id="myTabContent" class="tab-content">

        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

          <div class="center" style="margin-top:10px;">

            <div class="section-heading">

                <h2> Licni Podaci </h2>

                <div class="heading-line"></div>

                <h1>

                  Dobro proverite vase podatke, jer prema njima vas vase musterije nalaze i prepoznaju

                </h1>

                <h1>



                </h1>

            </div>

        </div>

          <!--LICNI PODACI-->

          <div class="row">

            <div class="col-md-6">

              <?php

                echo DetailView::widget([

                    'model'=>$prostor,

                    'condensed'=>true,

                    'hover'=>true,

                    'class' => 'probaa',

                    'mode'=>DetailView::MODE_VIEW,

                    'panel'=>[

                        'heading'=>'Licni Podaci',

                        'type'=>DetailView::TYPE_INFO,

                    ],

                    'attributes'=>[

                        'imeProstora',

                        'brTelefona',

                        'igLink',



                        ['attribute'=>'vrstaProstora',

                        'type'=>DetailView::INPUT_SELECT2,

                        'value' => $vrstaProstoraNaziv,

                        'widgetOptions' => [

                        'data' => [1 => "Kafanica", 2 => "Pub", 3 => "Vinarija", 4 => "Klub", 5 => "Caffe&bar", 6 => "Kafic", 7 => "Nargila", 7 => "Kafana"],





                      ]

                      ],

                    ]

                ]);

                ?>

              </div>

              <div class="col-md-6">

                  <?php

                echo DetailView::widget([

                    'model'=>$lokacija,

                    'condensed'=>true,

                    'hover'=>true,

                    'mode'=>DetailView::MODE_VIEW,

                    'panel'=>[

                        'heading'=>'Lokacija',

                        'type'=>DetailView::TYPE_INFO,

                    ],

                    'attributes'=>[

                        'adresa',

                        'grad',

                        'drzava'

                    ]

                ]);

          ?>

            </div>

              </div>

              <div class="row">



                <div class="center" style="margin-top:10px;">

                  <div class="section-heading">

                      <h2> Promeni sifru </h2>

                      <div class="heading-line"></div>

                      <h1>

                        Unesite novu sifru

                      </h1>

                      <h1>



                      </h1>

                  </div>

              </div>

              <?php

              $form = ActiveForm::begin([]); ?>



                  <?php

                  echo $form->field($user, 'new_password')->passwordInput()->label(false);

                  ?>

                  <!--TypeOfLocal ActiveField -->



                  <div class="row" style="margin-bottom:20px;">

                    <div class="text-center">

                      <?= Html::submitButton('Postavi', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                    </div>





                   </div>

              <?php ActiveForm::end(); ?>



              </div>

        </div>



        <!--RADNO VREME-->

        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">



          <div class="center" style="margin-top:10px;">

            <div class="section-heading">

                <h2> Radno Vreme </h2>

                <div class="heading-line"></div>

                <h1>

                  Pomozite vasim musterijama da uvek znaju kada radite, jer na mapi se prikazuju samo lokali koji trenutno rade. <br /> Da biste pormenili vreme kliknite na njega i postavite novo

                </h1>

                <h1>



                </h1>

            </div>

        </div>

          <!--RADNO VREME-->

                <div class="row">

                  <div class="col-md-8 col-md-offset-2">

                    <?php

                  $day = 'day';

                  echo  GridView::widget([

                'responsiveWrap' => false,

                'bordered'=>true,

                'hover'=>true,

                'resizableColumns'=>true,

                'pjax' => true,

                'export' =>false,

                'dataProvider' => $dataProviderRadnoVreme,

                'columns' => [

                  [

                    'header' => 'Dan',

                      'attribute' => 'dan',

                     'value' => function ($model) {

                       $naziv='';

                       if($model->dan == 1) $naziv='Ponedeljak';

                       if($model->dan == 2) $naziv='Utorak';

                       if($model->dan == 3) $naziv='Sreda';

                       if($model->dan == 4) $naziv='Cetvrtak';

                       if($model->dan == 5) $naziv='Petak';

                       if($model->dan == 6) $naziv='Subota';

                       if($model->dan == 7) $naziv='Nedelja';



                      return $naziv;

                    }



                  ],



                                      [
                                        'class' => 'kartik\grid\EditableColumn',

                                        'editableOptions'=>[

                                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                          'data' => ['00:00:00' => 'Ne zatvaram','11:11:11' => 'Ne Radim', '07:00:00' => '07:00','08:00:00' => '08:00','09:00:00' => '09:00','10:00:00' => '10:00','11:00:00' => '11:00','15:00:00' => '15:00','21:00:00' => '21:00'],


                                     ],

                                        'header' => 'Otvaranje',

                                        'attribute' => 'vremeOtvaranja',

                                      ],
                    [

                      'class' => 'kartik\grid\EditableColumn',

                      'editableOptions'=>[

                      'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data' => ['00:00:00' => 'Ne zatvaram','11:11:11' => 'Ne Radim', '21:00:00' => '21:00','22:00:00' => '22:00','23:00:00' => '23:00','24:00:00' => '24:00','01:00:00' => '01:00','02:00:00' => '02:00','03:00:00' => '03:00','04:00:00' => '04:00'],



                   ],

                      'header' => 'Zatvaranje',

                      'attribute' => 'vremeZatvranja',



                    ]

                    // ...

                ],

              ]);

                    ?>

                  </div>

          </div>



        </div>



        <!--PROMOCIJE-->

        <div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="samsa-tab">

          <div class="center" style="margin-top:10px;">

            <div class="section-heading">

                <h2> Promocije </h2>

                <div class="heading-line"></div>

                <h1>

                  Promocije su najbolji nacin da privucete nove musterije!

                </h1>

                <h1>



                </h1>

            </div>

        </div>



        <div class="row" style="margin-top:50px;">

          <div class="col-md-6">

          <p class="postavi_promociji">

          <strong>Postavi promociju:</strong> napisi opis promocije i izaberi koji dan vazi promocija

          </p>



        <?php



        $form = ActiveForm::begin([

                                          'id' => 'form-signup',

                                          'type' => ActiveForm::TYPE_HORIZONTAL,



                                        ]); ?>



            <?php

            echo $form->field($promocije, 'opis')->textarea();

            ?>

            <!--TypeOfLocal ActiveField -->

            <?=


             $form->field($promocije, 'danId')->radioList(

                         [1 => 'Ponedeljak', 2 => 'Utorak', 3 => 'Sreda',4 => 'Četvrtak', 5 => 'Petak', 6 => 'Subota', 7 => 'Nedelja'],

                         ['custom' => true, 'inline' => true, 'id' => 'custom-radio-list-inline', 'style'=>"font-size:14px;"]

                         )->label("Dan");



            ?>

            <div class="form-group row">

              <div class="col-sm-5"></div>

               <div class="col-sm-7">

                 <?= Html::submitButton('Postavi', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

               </div>

             </div>

        <?php ActiveForm::end(); ?>

        </div>

        </div>



          <div class="row" style="margin-top:35px;">

            <p class="postavi_promociji"style="padding-left:15px;">

              <strong>Pogledaj promocije:</strong> Ovde mozete da vidite sve promocije koje ste do sada postavili , ukoliko vam neka promocija vise nije aktivna molimo vas da je obrisete da ne bi doslo do zabune

            </p>

            <div class="col-md-8 col-md-offset-2 col-sm-12" style="padding-left:0px;padding-right:0px;">

              <?php

            echo  GridView::widget([



          'responsiveWrap' => false,

          'bordered'=>true,

          'hover'=>true,

          'resizableColumns'=>false,

          'pjax' => true,

          'export' =>false,

          'dataProvider' => $dataProviderPromocije,

          'options' => ['style' => ['max-width' => '100%;','word-wrap'=> 'break-word;']],

          'columns' => [



              [

                'header' => 'Naziv',

                'attribute' => 'nazivProstora',

                'width' => '20%',



              ],

              [

                'header' => 'Opis',

                'attribute' => 'opis',



              ],

              [

                'header' => 'Dan',

                'attribute' => 'danId',

                'width' => '15%',

                'value' => function ($model) {

                  $naziv='';

                  if($model->danId == 1) $naziv='Ponedeljak';

                  if($model->danId == 2) $naziv='Utorak';

                  if($model->danId == 3) $naziv='Sreda';

                  if($model->danId == 4) $naziv='Cetvrtak';

                  if($model->danId == 5) $naziv='Petak';

                  if($model->danId == 6) $naziv='Subota';

                  if($model->danId == 7) $naziv='Nedelja';



                 return $naziv;

               }

              ],

              [



                'class' => 'yii\grid\ActionColumn',

                'header' => 'Obrisi',

                  'headerOptions' => ['style' => 'width:20%'],

                'template' => '{delete}',



              ],

          ],





          ]);



              ?>

            </div>

          </div>







        </div>

      </div>

    </div>

  </div>

</div>





<script>





(function($) {



  'use strict';



  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {

    var $target = $(e.target);

    var $tabs = $target.closest('.nav-tabs-responsive');

    var $current = $target.closest('li');

    var $parent = $current.closest('li.dropdown');

		$current = $parent.length > 0 ? $parent : $current;

    var $next = $current.next();

    var $prev = $current.prev();

    var updateDropdownMenu = function($el, position){

      $el

      	.find('.dropdown-menu')

        .removeClass('pull-xs-left pull-xs-center pull-xs-right')

      	.addClass( 'pull-xs-' + position );

    };



    $tabs.find('>li').removeClass('next prev');

    $prev.addClass('prev');

    $next.addClass('next');



    updateDropdownMenu( $prev, 'left' );

    updateDropdownMenu( $current, 'center' );

    updateDropdownMenu( $next, 'right' );

  });



})(jQuery);



</script>
