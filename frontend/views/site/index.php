<?php


use common\models\Prostor;
use common\models\Promocije;
use common\models\Lokacija;
use common\models\User;
use common\models\VrstaProstora;
use common\models\RadnoVreme;
clearstatcache();
/* @var $this yii\web\View */
$this->title = 'Gde na pice';
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<div class="site-index" style="margin-top:100px;">
<?php
//setTime Zone and get current time and date
date_default_timezone_set('Europe/Belgrade');
$day=date("l");

if($day=="Monday") $danasnjiDan=1;
if($day=="Tuesday") $danasnjiDan=2;
if($day=="Wednesday") $danasnjiDan=3;
if($day=="Thursday") $danasnjiDan=4;
if($day=="Friday") $danasnjiDan=5;
if($day=="Saturday") $danasnjiDan=6;
if($day=="Sunday") $danasnjiDan=7;
$currentTime=date("H:i:s");
?>


<div class="row">

  <div class="mapBox" >
    <div class="center" style="margin-top:10px;">
      <div class="section-heading">
          <h2> Večeras pijemo ovde! </h2>
          <div class="heading-line"></div>
          <h1>
            Izaberite tipove mesta na koje volite da izlazite i oduševite se šta sve ima u vašoj blizini a da niste ni znali!
          </h1>
          <h1>

          </h1>
      </div>
  </div>
    </div>
      </div>
    <div class="row">
    <div class="center-Search mapSearchBox">
      <div id="floating-panel" class="mapSearch">
           <input class="adress_search" id="address" type="textbox" onkeypress="return runScript(event)" onfocus="this.value=''" value="Upiši adresu/naziv lokala" style="text-align:center; font-style:italic; color:#aaa;" >
           <button type="submit" id="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>


  <!--checkboxovi sa slikama iznad njih -->

  <br><br>

  <div class="row">
    <div class="center-checkbox">


      <!--prve 3 u 1 red-->
        <div class="col-xs-4 col-sm-4 col-md-8r col-md-offset-2">

                  <table>
                  <tr>
                    <td><img src="mapIcon/Kafana.png"></td>
                  </tr>

                  <tr style="background-color:#fff">
                    <td>
                    <input id="CheckboxKafana" type="checkbox" onclick="toggleGroup('Kafana')" checked="checked"></input>
                    <label for="CheckboxKafana" class="checkbox_label">Kafana</label>
                  </td>

                </tr>
                </table>

        </div>
          <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                        <td> <img src="mapIcon/Kafanica.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">
                    <td>
                      <input id="CheckboxKafanica" type="checkbox" onclick="toggleGroup('Kafanica')" checked="checked"></input>
                      <label for="CheckboxKafanica" class="checkbox_label">Kafanica</label>
                    </td>
                </tr>
                </table>

          </div>
            <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                          <td> <img src="mapIcon/BeerGardenPin.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">

                      <td>
                            <input id="CheckboxPivnica" type="checkbox" onclick="toggleGroup('Pub')" checked="checked"></input>
                            <label for="CheckboxPivnica" class="checkbox_label">Pub</label>
                      </td>
                 </tr>
                </table>

          </div>
            <!--2 put po 3 rasporednjene-->
            <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                      <td> <img src="mapIcon/WinePin.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">

                    <td>
                        <input id="CheckboxVinarija" type="checkbox" onclick="toggleGroup('Vinarija')" checked="checked"></input>
                        <label for="CheckboxVinarija" class="checkbox_label">Vinarija</label>
                  </td>
                </tr>
                </table>

            </div>
              <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                      <td> <img src="mapIcon/club.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">


                      <td>
                            <input id="CheckboxKlub" type="checkbox" onclick="toggleGroup('Klub')" checked="checked"></input>
                            <label for="CheckboxKlub" class="checkbox_label">Klub</label>
                      </td>

                </tr>
                </table>

            </div>

              <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                    <td> <img src="mapIcon/Hookah.png"> </td>

                  </tr>

                  <tr style="background-color:#fff">

                        <td>
                            <input id="CheckboxNargila" type="checkbox" onclick="toggleGroup('Nargila')" checked="checked"></input>
                            <label for="CheckboxNargila" class="checkbox_label">Nargila</label>
                        </td>

                </tr>
                </table>

          </div>

            <!--u 3. redu ce biti 2-->

            <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                  <td> <img src="mapIcon/CoffeePin2.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">
                    <td>
                            <input id="CheckboxKafic" type="checkbox" onclick="toggleGroup('Kafic')" checked="checked"></input>
                            <label for="CheckboxKafic" class="checkbox_label">Kafic</label>
                    </td>

                </tr>
                </table>

          </div>
              <div class="col-xs-4 col-sm-4 col-md-8r">

                <table>
                  <tr>
                           <td> <img src="mapIcon/CaffeeBar.png"> </td>
                  </tr>

                  <tr style="background-color:#fff">
                      <td>
                            <input id="CheckboxCaffe&Bar" type="checkbox" onclick="toggleGroup('Caffe&Bar')" checked="checked"></input>
                            <label for="CheckboxCaffe&Bar" class="checkbox_label">Caffe&Bar</label>
                      </td>
                </tr>
                </table>


          </div>
          </div>
  </div>
  <div class="row">
  <div id="map"></div>
  </div>


<!--Promocije i Akcije--->
<div class="row" style="margin-top:20px;">
  <div class="center" style="margin-top:10px;">
    <div class="section-heading">
        <h2> Promocije </h2>
        <div class="heading-line"></div>
        <h1>
          Nisam baš pri kešu danas. Ne brini se, ima mnogo promocija u gradu!
        </h1>
        <h1>

        </h1>
    </div>
</div>
  <ul class="tabs clearfix  margin_big_screen_tabs" data-tabgroup="first-tab-group" style="margin-bottom:20px;">
    <li><a href="#tab1" id="pon" style="background-color:		#a678e4a6;"><span class="full-text">Ponedeljak</span><span class="short-text">Pon</span></a></li>
    <li><a href="#tab2" id="ut" style="background-color:#6a78ffad;"><span class="full-text">Utorak</span><span class="short-text">Ut</span></a></li>
    <li><a href="#tab3" id="sr" style="background-color: #5eccd6ad;"><span class="full-text">Sreda</span><span class="short-text">Sre</span></a></li>
    <li><a href="#tab4" id="cet" style="background-color: #70d8adc9;"><span class="full-text">Cetvrtak</span><span class="short-text">Cet</span></a></li>
    <li><a href="#tab5" id="pet" style="background-color:  #fcd55ac2;"><span class="full-text">Petak</span><span class="short-text">Pet</span></a></li>
    <li><a href="#tab6" id="sub" style="background-color: #f19456c7;"><span class="full-text">Subota</span><span class="short-text">Sub</span></a></li>
    <li><a href="#tab7" id="ned" style="background-color: #f26d6dbd;"><span class="full-text">Nedelja</span><span class="short-text">Ned</span></a></li>
  </ul>


  <section id="first-tab-group" class="tabgroup margin_big_screen_tabs">

  <div id="tab1" class="aleksa">
    <table class="promocije">
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>
     </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(1);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
    </table>
  </div>


  <div id="tab2" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>

  </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(2);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
 </table>
  </div>

  <div id="tab3" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>

  </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(3);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
 </table>
  </div>

  <div id="tab4" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>

  </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(4);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
 </table>
  </div>

  <div id="tab5" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>

  </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(5);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
 </table>
  </div>

  <div id="tab6" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>
   </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(6);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";

    echo "</tr>";
  }
   ?>
 </table>
  </div>

  <div id="tab7" class="aleksa">
    <table>
  <tr>
    <th>Mesto promocije</th>
    <th>Opis Promocije</th>

  </tr>
  <?php
  $promocija=Promocije::GetPromocijaByDay(7);
  foreach ($promocija as $value) {
    $nazivTipaProstora=VrstaProstora::GetNameById($value->vrstaProstoraId);
    echo "<tr>";
    echo "<td>".$nazivTipaProstora->naziv." ".$value->nazivProstora."</td>";
    echo "<td>".$value->opis."</td>";
      echo "</tr>";
  }
   ?>
 </table>
  </div>

</section>
</div>
<!--CONTACT FORMA--->
<section id="contact">
  <div class="center" style="margin-top:10px;">
    <div class="section-heading">
        <h2> Kontaktirajte nas </h2>
    <div class="heading-line"></div>
    </div>
  <div class="content-box-md">
      <div class="container">
        <div class="row">

            <div class="col-md-6">
              <!--LEVA STRANA CONTACTA---->
                <div id="contact-left">
                    <p>
		    Nismo ni svesni koliko ima dobrih mesta za izlazak a da ni ne znamo za njih. Mesta na kojima ljudi ne bleje samo na telefonima, slikaju se,
		   gde ne moraš da imaš mnogo para da bi se dobro proveo.<br> Ovaj sajt smo otvorili da pokušamo da vam pružimo <strong> više mogucnosti </strong>
		   i da <strong> pružimo sansu manjima </strong> da se dokažu i pokažu sta imaju da ponude. <br><strong> Otvoreni smo za sve nove ideje. Pomozite nam da svima bude još bolje! </strong>
		    </p>
                    <div id="offices">
                        <div class="row">
                            <div class="col-md-6">



                            </div>



                        </div>
                    </div>
                    <ul class="social-list">
                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>

                    </ul>
                </div>

            </div>

            <div class="col-md-6">
              <div id="contact-right">
                <form>
                  <h4> Pošalji poruku</h4>
                  <p>Popunite formu ispod kako bi nas kontaktirali.</p>
                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">

                          <input type="text" class="form-control" id="name" placeholder="Your Name">

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">

                          <input type="email" class="form-control" id="email" placeholder="Email Addres">

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">

                          <input type="text" class="form-control" id="subject" placeholder="subject">

                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" id="massage" placeholder="message"></textarea>
                  </div>

                  <!----dugme-->
                  <div id="submit-btn">
                    <a class="btn btn-general btn-yellow" href="#" title="Text" role="button">Text</a>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
  </div>

</section>
</div>
<!--Script for tabs  -->
<script>




window.onload = function() {
  var today=<?php echo $danasnjiDan?>;
  switch(today){

  case 1: var element = document.getElementById("pon");
          element.classList.add("active");
          break;
  case 2: var element = document.getElementById("ut");
          element.classList.add("active");
          break;
  case 3: var element = document.getElementById("sr");
          element.classList.add("active");
          break;
  case 4: var element = document.getElementById("cet");
          element.classList.add("active");
          break;
  case 5: var element = document.getElementById("pet");
          element.classList.add("active");
          break;
  case 6: var element = document.getElementById("sub");
          element.classList.add("active");
          break;
  case 7: var element = document.getElementById("ned");
          element.classList.add("active");
          break;
}
  $(".aleksa").hide();
  $(".tabgroup > div").hide();

  $(".tabgroup > div:first-of-type").show();
  $(".tabs a").click(function(e) {
    e.preventDefault();
    var $this = $(this),
        tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
        others = $this
    .closest("li")
    .siblings()
    .children("a"),
        target = $this.attr("href");
    others.removeClass("active");
    $this.addClass("active");
    $(tabgroup)
      .children("div")
      .hide();
    $(target).show();
  });

}


</script>
<script>

$(document).ready(function(){
  $("#address").keyup(function(event) {
    window.alert("a");
    if (event.keyCode === 13) {
        $("#submit").click();
    }
});

});

</script>
<!--Script for google map  -->
<script>


      var delay = 0;
      var geocoder;
      var map;
      var markerGroups = {
        "Kafana": [],
        "Kafanica": [],
        "Pub": [],
        "Vinarija": [],
        "Klub": [],
        "Caffe&Bar": [],
        "Kafic": [],
        "Nargila": []
      };
      var prostorlokacija="Batutova 8";
      function initMap() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map'), {
          //basic map options
          center: {lat: 44.787196, lng: 20.457273},
          zoom: 12,
          mapTypeControl: false,//disable sattelite and other type view
          streetViewControl: false,//disable street view
          styles: myStyles
        });

        getMyLocation();
        PutAllMarkers();
      }
      //Search bar
      function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
      var naziv=document.getElementById('address').value;
      var br=0;

      <?php  foreach ($prostori as $prostor):?>
      var nazivProstora="<?php echo $prostor->imeProstora?>";
      var SveVelikoNaziv=naziv.toUpperCase();
      var SveVelikonazivProstora=nazivProstora.toUpperCase();
      if(SveVelikoNaziv==SveVelikonazivProstora){
        br=1;
        <?php $prostorlokacija=Lokacija::getLokacijaById($prostor->idProstor); ?>
        prostorlokacija="<?php echo $prostorlokacija->adresa?>";
        geocodeProstorIme(geocoder, map);
	  if ($(window).width() < 480){
        window.scrollTo(0, 370);
        }      }
      <?php endforeach;  ?>
      if(br==0){
        geocodeAddress(geocoder, map);
	  if ($(window).width() < 480){
        window.scrollTo(0, 370);
        }
      }

        return false;
    }
}
     document.getElementById('submit').addEventListener('click', function() {
       var naziv=document.getElementById('address').value;
       var br=0;
       <?php  foreach ($prostori as $prostor):?>
       var nazivProstora="<?php echo $prostor->imeProstora?>";
       var SveVelikoNaziv=naziv.toUpperCase();
       var SveVelikonazivProstora=nazivProstora.toUpperCase();
       if(SveVelikoNaziv==SveVelikonazivProstora){
         br=1;
         <?php $prostorlokacija=Lokacija::getLokacijaById($prostor->idProstor); ?>
         prostorlokacija="<?php echo $prostorlokacija->adresa?>";
         geocodeProstorIme(geocoder, map);
  if ($(window).width() < 480){
        window.scrollTo(0, 370);
        }
       }
       <?php endforeach;  ?>
       if(br==0){

         geocodeAddress(geocoder, map);
	  if ($(window).width() < 480){
        window.scrollTo(0, 370);
        }       }
   });
   function geocodeProstorIme(geocoder, map) {
     var address = prostorlokacija;

     geocoder.geocode({'address': address}, function(results, status) {
       if (status == 'OK') {

         map.setCenter(results[0].geometry.location);
         map.setZoom(18);
       } else {
                  alert('Geocode was not successful for the following reason: ' + status);
                }
              });
   }
   function geocodeAddress(geocoder, resultsMap) {
     var address = document.getElementById('address').value;
     geocoder.geocode({'address': address}, function(results, status) {

       if (status == 'OK') {

           map.setCenter(results[0].geometry.location);
           map.setZoom(18);

       } else {
         alert('Geocode was not successful for the following reason: ' + status);
       }
     });
   }



   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	getLocation();
	var pos = {
              lat: 44.804684,
              lng: 20.462511            };

        	map.setCenter(pos);
            map.setZoom(13);
      }
   function getMyLocation(){
        infoWindow = new google.maps.InfoWindow;
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //izbacuje marker gde se nalazimo
            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            //infoWindow.open(map);
            map.setCenter(pos);
            map.setZoom(16);

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
          return;
      }      //put all markers in map
      function PutAllMarkers(){
          var br=0;
          var infowindow = new google.maps.InfoWindow();
          <?php  foreach ($location as $key):
          $prostor=Prostor::GetProstorById($key->prostorId);
          $vrstaProstora=VrstaProstora::GetNameById($prostor->vrstaProstora);
          $user=User::getUser($prostor->userId);
          $radnoVreme=RadnoVreme::GetRadnoVremeByUserIdAndDay($prostor->idProstor,$danasnjiDan);

          //if($radnoVreme->vremeOtvaranja < $currentTime && $radnoVreme->vremeZatvranja > $currentTime):
          ?>


          var address="<?php echo $key->adresa?>";

          var day='<?php echo $day ;?>';
          var longitude='<?php echo $key->longitude ;?>';
          var latitude='<?php echo $key->latitude ;?>';
          var dayBr;

          if(day=="Monday") dayBr=1;
          if(day=="Tuesday") dayBr=2;
          if(day=="Wednesday") dayBr=3;
          if(day=="Thursday") dayBr=4;
          if(day=="Friday") dayBr=5;
          if(day=="Saturday") dayBr=6;
          if(day=="Sunday") dayBr=7;


           var type=<?php echo $prostor->vrstaProstora?>;
           var nazivVrste;
           var mapIcon;
           var boja;

           switch(type){
           case 8: nazivVrste="Kafana";
                   mapIcon="Kafana.png";
                   boja="#ff2c46";
                  break;
           case 1: nazivVrste="Kafanica";
                   mapIcon="Kafanica.png";
                   boja="#70d8ad";
                   break;
           case 2: nazivVrste="Pub";
                   mapIcon="BeerGardenPin.png";
                   boja="#fcd55a";
                   break;
           case 3: nazivVrste="Vinarija";
                   mapIcon="WinePin.png";
                   boja="#ba314b";
                   break;
           case 4: nazivVrste="Klub";
                   mapIcon="club.png";
                   boja="#5eccd6";
                   break;
           case 5: nazivVrste="Caffe&Bar";
                   mapIcon="CaffeeBar.png";
                   boja="#a678e4";
                   break;
           case 6: nazivVrste="Kafic";
                   mapIcon="CoffeePin2.png";
                   boja="#6f4e37";
                   break;
           case 7: nazivVrste="Nargila";
                   mapIcon="Hookah.png";
                   boja="#6a78ff";

                   break;

         }
	  var userId=<?php echo $prostor->userId?>;
          if( userId==1)mapIcon="specialCoffee.png";
          if( userId==2)mapIcon="SpecialBar.png";

                        var contentString = '<div id="iw-container">' +
                    '<div class="iw-title" style="background-color:'+boja+'!important"><?php echo $vrstaProstora->naziv?> <?php echo $prostor->imeProstora?></div>' +
                    '<div class="iw-Time"><?php echo $radnoVreme->vremeOtvaranja ?> - <?php echo $radnoVreme->vremeZatvranja ?></div>'+
                    '<div class="iw-content" style="padding: 0px 0px 0px 0px; " >' +
                      '<div class="iw-subTitle">Kontakt</div>' +
                      '<p> <?php echo $key->adresa?>, Beograd'+
                      '<br>Phone. <?php echo $prostor->brTelefona?></p>'+
                      '<p><a href="<?php echo $prostor->igLink?>" style="color:black;">Moj instagram profil!</a></p>'+
                    '</div>' +
                    '<div class="iw-content" style="padding: 0px 0px 0px 0px; " >' +
                      '<div class="iw-subTitle">Promocije</div>' +
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

          var VremeOtvaranja="<?php echo $radnoVreme->vremeOtvaranja?>";
          var VremeOtvaranjaNiz="<?php echo $radnoVreme->vremeOtvaranja?>".split(':');
          var vremeZatvaranja="<?php echo $radnoVreme->vremeZatvranja?>";
          var vremeZatvaranjaNiz="<?php echo $radnoVreme->vremeZatvranja?>".split(':');
          var trenutnoVreme="<?php echo $currentTime?>";
          var radnidan=true;

          if(VremeOtvaranja=="11:11:11"||vremeZatvaranja=="11:11:11") radnidan=false;

          if(vremeZatvaranjaNiz[0]<8) {
            br=Number(vremeZatvaranjaNiz[0])+24;
            vremeZatvaranja=br+":"+vremeZatvaranjaNiz[1]+":"+vremeZatvaranjaNiz[2];
          }

          if(((VremeOtvaranja<trenutnoVreme && vremeZatvaranja>trenutnoVreme)||(VremeOtvaranja=="00:00:00" && vremeZatvaranja=="00:00:00"))&& radnidan==true){

            var location = new google.maps.LatLng(longitude, latitude);
            var marker = new google.maps.Marker({
                map: map,
                icon:{
                    url:"mapIcon/"+mapIcon,

                },
                position:location
            });

                markerGroups[nazivVrste].push(marker);
                bindInfoWindow(marker, map, infowindow, contentString);

          }

    <?php   //endif; ?>
      <?php endforeach;  ?>
        return;
      }

      //toogle marker on checkbox
      function bindInfoWindow(marker, map, infowindow, html) {
    marker.addListener('click', function() {
        infowindow.setContent(html);
        infowindow.open(map, this);
	map.setZoom(16);
    });
}
      function toggleGroup(type) {

        for (var i = 0; i < markerGroups[type].length; i++) {
        var marker = markerGroups[type][i];
        if (!marker.getVisible()) {
            marker.setVisible(true);
        } else {
            marker.setVisible(false);
        }
            }
        }
      //function that deletes all default markers from map(shops...)
       var myStyles =[
        {
            featureType: "poi",
            elementType: "labels",
            stylers: [
                  { visibility: "off" }
            ]
        }
        ];
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgjCtRGG23OK-c0JMhoYQ241ZKLfB8zs8&callback=initMap"
    async defer></script>
