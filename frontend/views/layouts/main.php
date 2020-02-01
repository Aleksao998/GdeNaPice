<?php



/* @var $this \yii\web\View */

/* @var $content string */



use yii\helpers\Html;

use yii\bootstrap\Nav;

use yii\bootstrap\NavBar;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;



AppAsset::register($this);



?>

<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138205898-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138205898-1');
</script>
	

    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->registerCsrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>

<body>

<?php $this->beginBody() ?>



<div class="wrap">

    <?php

    NavBar::begin([

          'brandLabel' => '<img src="images/proba.png" style="margin-top:-18px;"/>',

        'brandUrl' => Yii::$app->homeUrl,

        'options' => [

            'class' => 'navbar white-nav-top navbar-fixed-top navbar-expand-lg navbar-light',



        ],

    ]);

    $menuItems = [

        ['label' => 'Pocetna', 'url' => ['/site/index']],

    ];

    if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Registruj se', 'url' => ['/site/signup']];

        $menuItems[] = ['label' => 'Uloguj se', 'url' => ['/site/login']];

    } else {
	
      $menuItems[] = ['label' => 'Moj Profil', 'url' => 'http://gdenapice.com/index.php?r=site%2Fprofile&id='.Yii::$app->user->identity->id];

        $menuItems[] = '<li>'

            . Html::beginForm(['/site/logout'], 'post')

            . Html::submitButton(

                'Odjavite se (' . Yii::$app->user->identity->username .')',

                ['class' => 'btn btn-link logout']

            )

            . Html::endForm()

            . '</li>';



    }

    echo Nav::widget([

        'options' => ['class' => 'navbar-nav menu_center'],

        'items' => $menuItems,

    ]);

    NavBar::end();

    ?>



    <div class="container-fluid">

        <?= Breadcrumbs::widget([

            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?>

        <?= Alert::widget() ?>



        <?= $content ?>



    </div>

</div>



<footer class="footer">

    <div class="container">

      <div class="row">

        <div class="col-mid-12">

            <p> Copyright &copy; 2019 all rights by <span>gdenapice.com</span>  </p>

        </div>

      </div>

    </div>

</footer>



<?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>

