<?php

namespace frontend\controllers;



use Yii;

use yii\base\Model;

use yii\base\InvalidArgumentException;

use yii\web\BadRequestHttpException;

use yii\web\Controller;

use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use yii\helpers\Json;

use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;

use frontend\models\ResetPasswordForm;

use frontend\models\SignupForm;

use frontend\models\ContactForm;

use common\models\Prostor;

use common\models\Lokacija;

use common\models\User;

use common\models\Promocije;

use kartik\growl\Growl;

use common\models\RadnoVreme;

use app\models\Setting;

use common\models\RadnoVremeSearch;

use common\models\PromocijeSearch;

/**

 * Site controller

 */

class SiteController extends Controller

{

    /**

     * {@inheritdoc}

     */

    public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'only' => ['logout', 'signup'],

                'rules' => [

                    [

                        'actions' => ['signup'],

                        'allow' => true,

                        'roles' => ['?'],

                    ],

                    [

                        'actions' => ['logout'],

                        'allow' => true,

                        'roles' => ['@'],

                    ],

                ],

            ],

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'logout' => ['post'],

                ],

            ],

        ];

    }

    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['site/profile', 'id' => Yii::$app->user->identity->id]);

    }

    protected function findModel($id)

    {

        if (($model = Promocije::findOne($id)) !== null) {

            return $model;

        }



        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    /**

     * {@inheritdoc}

     */

    public function actions()

    {

        return [

            'error' => [

                'class' => 'yii\web\ErrorAction',

            ],

            'captcha' => [

                'class' => 'yii\captcha\CaptchaAction',

                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,

            ],

        ];

    }



    /**

     * Displays homepage.

     *

     * @return mixed

     */

    public function actionIndex()

    {

        $location=Lokacija::getAllLokacion();

        $prostori=Prostor::getAllProstor();

        return $this->render('index',[

          'location'=> $location,

          'prostori' => $prostori

        ]



      );

    }

    public function actionAleksa()

    {

        return $this->render('aleksa');

    }



    /**

     * Logs in a user.

     *

     * @return mixed

     */

    public function actionLogin()

    {

        if (!Yii::$app->user->isGuest) {

          return $this->goBack();

        }



        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && ($model->login()||$model->admin())) {



              return $this->redirect(['site/profile', 'id' => Yii::$app->user->identity->id]);

        } else {

            $model->password = '';



            return $this->render('login', [

                'model' => $model,

            ]);

        }

    }



    /**

     * Logs out the current user.

     *

     * @return mixed

     */

    public function actionLogout()

    {

        Yii::$app->user->logout();



        return $this->goHome();

    }



    /**

     * Displays contact page.

     *

     * @return mixed

     */

    public function actionContact()

    {

        $model = new ContactForm();



        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {

                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');

            } else {

                Yii::$app->session->setFlash('error', 'There was an error sending your message.');

            }



            return $this->refresh();

        } else {

            return $this->render('contact', [

                'model' => $model,

            ]);

        }

    }



    /**

     * Displays about page.

     *

     * @return mixed

     */

    public function actionAbout()

    {



        return $this->render('about');

    }



    /**

     * Signs user up.

     *

     * @return mixed

     */

      public function actionSignup()
    {
        $model = new SignupForm();
        $prostor = new Prostor();
        $lokacija = new Lokacija();
        $radnoVreme1=new RadnoVreme();
        $radnoVreme2=new RadnoVreme();
        $radnoVreme3=new RadnoVreme();
        $radnoVreme4=new RadnoVreme();
        $radnoVreme5=new RadnoVreme();
        $radnoVreme6=new RadnoVreme();
        $radnoVreme7=new RadnoVreme();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                   $prostor->setUserId($user->id);
                   $prostor->setImeProstora($user->username);
                   $prostor->setbr("xxx xxxx xxx");
                   $prostor->setIg("www.istagram.com");
                   $prostor->load(Yii::$app->request->post());
                   $prostor->save(true);

                   $lokacija->setIdProstor($prostor->getProstorId());
                   $lokacija->setGrad("Beograd");
                   $lokacija->setDrzava("Srbija");
                   $lokacija->load(Yii::$app->request->post());

                   $geocode=geocode($lokacija->adresa);
                   $lokacija->setLongitude($geocode[0]);
                   $lokacija->setLatitude($geocode[1]);
                   $lokacija->save(true);
                   //radno vreme

                  $radnoVreme1->setProstorId($prostor->getProstorId());
                  $radnoVreme1->setVremeOtvaranja();
                  $radnoVreme1->setVremeZatvaranja();
                  $radnoVreme1->setDan(1);
                  $radnoVreme1->save(true);

                  $radnoVreme2->setProstorId($prostor->getProstorId());
                  $radnoVreme2->setVremeOtvaranja();
                  $radnoVreme2->setVremeZatvaranja();
                  $radnoVreme2->setDan(2);
                  $radnoVreme2->save(true);

                  $radnoVreme3->setProstorId($prostor->getProstorId());
                  $radnoVreme3->setVremeOtvaranja();
                  $radnoVreme3->setVremeZatvaranja();
                  $radnoVreme3->setDan(3);
                  $radnoVreme3->save(true);

                  $radnoVreme4->setProstorId($prostor->getProstorId());
                  $radnoVreme4->setVremeOtvaranja();
                  $radnoVreme4->setVremeZatvaranja();
                  $radnoVreme4->setDan(4);
                  $radnoVreme4->save(true);

                  $radnoVreme5->setProstorId($prostor->getProstorId());
                  $radnoVreme5->setVremeOtvaranja();
                  $radnoVreme5->setVremeZatvaranja();
                  $radnoVreme5->setDan(5);
                  $radnoVreme5->save(true);

                  $radnoVreme6->setProstorId($prostor->getProstorId());
                  $radnoVreme6->setVremeOtvaranja();
                  $radnoVreme6->setVremeZatvaranja();
                  $radnoVreme6->setDan(6);
                  $radnoVreme6->save(true);

                  $radnoVreme7->setProstorId($prostor->getProstorId());
                  $radnoVreme7->setVremeOtvaranja();
                  $radnoVreme7->setVremeZatvaranja();
                  $radnoVreme7->setDan(7);
                  $radnoVreme7->save(true);





                   return $this->redirect(['site/profile', 'id' => $user->id]);
                }


            }
        }

        return $this->render('signup', [
            'model' => $model,
            'prostor'=> $prostor,
            'lokacija'=> $lokacija,
            'radnoVreme'=> $radnoVreme
        ]);
    }


    public function actionProfile($id)

      {
	if (Yii::$app->user->isGuest){
          return Yii::$app->getResponse()->redirect(['site/login']);
        }
        else if (Yii::$app->user->identity->id !=$id){
          return Yii::$app->getResponse()->redirect(['site/index']);
        }

        $user=new User();

        $user=$user->getUser($id);

        $signup = new SignupForm();

        $prostor=new Prostor();

        $prostor=$prostor->GetProstorByUserId($user);

        $promocije=new Promocije();

        $lokacija=Lokacija::getLokacijaById($prostor->prostorId);

        $searchModelRadnoVreme = new RadnoVremeSearch();

        $dataProviderRadnoVreme = $searchModelRadnoVreme->search(Yii::$app->request->queryParams,$prostor->prostorId);



        $searchModelPromocije = new PromocijeSearch();

        $dataProviderPromocije = $searchModelPromocije->search(Yii::$app->request->queryParams,$prostor->prostorId);



        $tabelaRadnoVreme=new RadnoVreme();

        if($prostor->load(Yii::$app->request->post())&& $prostor->save()){

          return $this->redirect(['site/profile', 'id' => $user->id]);

        }

        if($lokacija->load(Yii::$app->request->post())&& $lokacija->save()){
          $geocode=geocode($lokacija->adresa);
          $lokacija->setLongitude($geocode[0]);
          $lokacija->setLatitude($geocode[1]);
          $lokacija->save(true);


          return $this->redirect(['site/profile', 'id' => $user->id]);

        }



        if(Yii::$app->request->post('hasEditable')){

            $RadnoVremeId=Yii::$app->request->post('editableKey');

            $radnovreme = RadnoVreme::findOne($RadnoVremeId);

            $out=Json::encode(['output'=>'','message'=>'']);

            $post=[];

            $posted=current($_POST['RadnoVreme']);

            $post['RadnoVreme']=$posted;

            if($radnovreme->load($post)){

              $radnovreme->save();

            }







            return $out;

        }

        if($promocije->load(Yii::$app->request->post())){



          $promocije->setProstorId($prostor->prostorId);

          $promocije->setvrstaProstoraId($prostor->vrstaProstora);

          $promocije->setnazivProstora($prostor->imeProstora);

          $promocije->setKategorije(1);

          $promocije->save(true);

          Yii::$app->getSession()->setFlash('success');



          return $this->redirect(['site/profile', 'id' => $user->id]);

        }

          if ($user->load(Yii::$app->request->post())) {

              $user->updatePassword($user->new_password);

              $user->save(true);

              return $this->redirect(['site/profile', 'id' => $user->id]);



          }





        return $this->render('profile',[

          'searchModelRadnoVreme' => $searchModelRadnoVreme,

          'dataProviderRadnoVreme' => $dataProviderRadnoVreme,

          'searchModelPromocije' => $searchModelPromocije,

          'dataProviderPromocije' => $dataProviderPromocije,

          'user'=>$user,

          'prostor'=>$prostor,

          'signup' => $signup,

          'lokacija'=>$lokacija,



          'promocije'=>$promocije

        ]);

      }

    /**

     * Requests password reset.

     *

     * @return mixed

     */

    public function actionRequestPasswordReset()

    {

        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail()) {

                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');



                return $this->goHome();

            } else {

                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');

            }

        }



        return $this->render('requestPasswordResetToken', [

            'model' => $model,

        ]);

    }



    /**

     * Resets password.

     *

     * @param string $token

     * @return mixed

     * @throws BadRequestHttpException

     */

    public function actionResetPassword($token)

    {

        try {

            $model = new ResetPasswordForm($token);

        } catch (InvalidArgumentException $e) {

            throw new BadRequestHttpException($e->getMessage());

        }



        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {

            Yii::$app->session->setFlash('success', 'New password saved.');



            return $this->goHome();

        }



        return $this->render('resetPassword', [

            'model' => $model,

        ]);

    }

}
function url_get_contents($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function geocode($address){



    // url encode the address

    //encode string when it is used for url

    $address = urlencode($address);



    // google map geocode api url

    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBgjCtRGG23OK-c0JMhoYQ241ZKLfB8zs8";



    // get the json response

    $resp_json = url_get_contents($url);



    // decode the json

    $resp = json_decode($resp_json, true);



    // response status will be 'OK', if able to geocode given address

    if($resp['status']=='OK'){



        // get the important data

        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";

        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";

        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";



        // verify if data is complete

        if($lati && $longi && $formatted_address){



            // put the data in the array

            $data_arr = array();



            array_push(

                $data_arr,

                    $lati,

                    $longi,

                    $formatted_address

                );



            return $data_arr;



        }else{

            return false;

        }



    }



    else{

        echo "<strong>ERROR: {$resp['status']}</strong>";

        return false;

    }

}
