<?php
  include_once 'konek.php';
  include_once 'analis.php';
  $analisis = analisis($_POST);

?>


<!DOCTYPE html>
<html>
<head>
	<title>hasil Analisi</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/fontawesome-free/css/regular.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">


    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
                <meta charset="utf-8">
                    <style>
                        /* Always set the map height explicitly to define the size of the div
                         * element that contains the map. */
                        #map {
                            height: 100%;
                      }
                      /* Optional: Makes the sample page fill the window. */
      html, body {
                            height: 100%;
                        margin: 0;
                        padding: 0;
                      }
    </style>
</head>
<body>
    <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #F05F40;">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Go_tani </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">ketentuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Fitur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Galleri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Tentang</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--   goolemap -->
    <body>
               <div id="map"></div>
              
            <input hidden id="lat1" value="<?php echo $analisis['latitude'] ?>"></input>
            <input hidden  id="long1" value="<?php echo $analisis['longtitude'] ?>"></input>
           
          
    <script>

      
      var marker;

        var lat= document.getElementById('lat');
        var long= document.getElementById('long');
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat:<?php echo $analisis['latitude'] ?>, lng: <?php echo $analisis['longtitude'] ?>}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          animation: google.maps.Animation.BOUNCE,
          position: {lat:<?php echo $analisis['latitude'] ?>, lng: <?php echo $analisis['longtitude'] ?>}
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSHhSMyxh3XrHskeQN40xbTNt2WMQzW94&callback=initMap">
    </script>

    <?php

//$name = $_GET['name'];
//$address = $_GET['address'];
$lat = $_POST['latitude'];
$lng = $_POST['longtitude'];

//$type = $_GET['type'];


$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?lat=". "$lat" . "&lon=". "$lng" ."&APPID=659e5a7c59b5d4ecc49ab63b97b05727",
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$resultJson = json_decode($resp, true);
// print_r($resultJson);

$curl2 = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl2, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/elevation/json?locations=39.7391536,-104.9847034&key=AIzaSyDS36n8mVUcxPAMUcTSptdG8k_vZ-TcdjQ',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp2 = curl_exec($curl2);
// Close request to clear up some resources
curl_close($curl2);

$resultJson2 = json_decode($resp2, true);
echo "<br><br>";
// print_r($resultJson2);

echo "<br><br>";
// echo "hasil evaluasi google =" .$resultJson2["results"][0]["elevation"];
$suhu=round( $resultJson["main"]["temp"]-273.15,2) ;
$ketinggian=round( $resultJson2["results"][0]["elevation"]/10,2) ;
 // satuan suhu kelvin
if (!$suhu==-273.15) {
    header("location:input.php");
}
    $hujan=$dbkonek->query("select * from curah_hujan where id_hujan='$analisis[hujan]' ");
    $tanah=$dbkonek->query("select * from tanah where id_tanah='$analisis[tanah]'");
?>

                    <section id="services">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Hasil Analisis Kami Pada Lokasi Anda </h2>
                            <hr class="my-4">
                          </div>
                        </div>
                      </div>
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-thermometer-three-quarters text-primary mb-3 sr-icon-1"></i>
                              <h3 class="mb-3">Suhu Lokasi Anda</h3>
                                      <h2 class="text-muted mb-0">
                                      <?php echo $suhu?> C
                                     </h2>
                            </div>
                          </div>

                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-map-marked-alt text-primary mb-3  sr-icon-2"></i>
                              <h3 class="mb-3">Ketinggian Anda :</h3>
                                <h2  class="text-muted mb-0"><?php echo $ketinggian?> Mdpl</h2>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-cloud-showers-heavy text-primary mb-3 sr-icon-3"></i>
                              <h3 class="mb-3">Curah Hujan</h3>
                              <p class="text-muted mb-0">
                                                                  
                                    <?php while ($data=mysqli_fetch_array($hujan)) {
                                   ?>
                                    <h2  class="text-muted mb-0"><?php echo$data['kategori'] ?></h2>
                                    <?php
                                    } 
                                    ?>
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-microscope text-primary mb-3 sr-icon-4"></i>
                              <h3 class="mb-3">Ph tanah</h3>
                              <p class="text-muted mb-0">
                                  
                                    <?php
                                    while ($data_h=mysqli_fetch_array($tanah)) {
                                        ?>
                                         <h2  class="text-muted mb-0"><?php echo $data_h['kategori']; ?></h2>
                                    <?php
                                    }
                                    ?>
                                      
                                  
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                      
      <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Tanaman Yang Potensial di Daerah Anda!</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>



      <div class="container">
        <div class="row">


<!-- hasil analisi farward chaining  -->

 <?php 
                  $tanaman=$dbkonek->query("select * from tanaman WHERE  ketinggian = '$analisis[tinggi]' AND jenis_tanah = '$analisis[tanah]' AND suhu = '$analisis[suhu]' OR curah_hujan = '$analisis[hujan]'");
                  $d_row=mysqli_num_rows($tanaman);            
                  
                  if ($d_row != 0) {
                        while ($data=mysqli_fetch_array($tanaman)){       
                          ?>

                            <div class="col-lg-3 col-md-6 text-center">
                              <div class="service-box mt-5 mx-auto">
                              <img  width="252"  class="fas fa-4x text-primary mb-3 sr-icon-3" src="https://img.over-blog-kiwi.com/2/12/87/31/20170925/ob_597d6e_5-manfaat-kesehatan-fantastis-dari-kub.png"></img>
                                <h3 class="mb-3"><?php echo $data['nama']; ?></h3>
                                <p class="text-muted mb-0"><h3>Rp<?php echo $data['harga']; ?></h3></p>
                              </div>
                            </div>
                          <?php
                          }

                      }else{

                        ?>
                              <div class="col-lg-12 text-center">
                                  <h2 class="section-heading">Maaf Sistem Kami tidak menemukan kecocokan pada lokasi anda</h2>
                                  
                              </div>
                        
                     <?php
                     }
                    
                      ?>

          </div>
                </div>
              </section>
      
      <section class="bg-secondary text-white">
        <div class="container text-center">
          <h2 class="mb-4">Simpan Hasil Ananlisis Lokasi Anda</h2>
          <h5 class="mb-4"> Agar hasil analisis dapat di simpan maka anda terlebih dahulu harus melakukan registrasi , Nantinya hasil analisis akan secara otomatis tersimpan
          pada account anda , dan dapat di buka kembali kapan pun saat anda login.
          
          </h5>
          <a class="btn btn-light btn-xl sr-button" href="signin.php">Simpan</a>
        </div>
    </section>

      <section class="bg-white text-black">
        <div class="container text-center">
          
        </div>
    </section>

<?php
include_once 'footer.php';
?>

</body>
</html>