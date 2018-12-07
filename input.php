    <?php
    include_once 'konek.php';
    ?>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Go_Tani App </title>
    <!-- Bootstrap core CSS -->
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

                      #top {
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
                <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
    <div id="top" class="container">
      <div class="row justify-content-center">
        <h1>Selamat Datang, User</h1><br>
        <h3>Untuk dapat menggunakan layanan JAGO TANI</h3>
        <h3>Silahkan klik tombol dibawah ini untuk mendapatkan lokasi anda</h3>
        <a class="btn btn-primary col align-self-center" href="#map" role="button" onclick="getLocation()">Link</a>
      </div>
    </div>
    <div id="map"></div>
            
<?php

//$name = $_GET['name'];
//$address = $_GET['address'];
$lat = $_COOKIE['latitude'];
$lng = $_COOKIE['longtitude'];
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
print_r($resultJson);

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
print_r($resultJson2);

echo "<br><br>";

echo "hasil evaluasi google =" .$resultJson2["results"][0]["elevation"];
$suhu=round( $resultJson["main"]["temp"]-273.15,2) ;
$ketinggian=round( $resultJson2["results"][0]["elevation"]/10,2) ;
// satuan suhu kelvin
    $hujan=$dbkonek->query("select * from curah_hujan");
    $tanah=$dbkonek->query("select * from tanah");
?>

                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSHhSMyxh3XrHskeQN40xbTNt2WMQzW94&callback=initMap">
                    </script>


                    <section id="services">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Pastikan Data Sesuai Lokasi Anda </h2>
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
                                  <select class="form-control form-control-lg">
                                    
                                    <?php while ($data=mysqli_fetch_array($hujan)) {
                                    ?>
                                        <option value="<?php echo$data['kategori'] ?>"><?php echo $data['kategori']; ?></option>
                                    <?php
                                    } 
                                    ?>
                                      
                                   </select>
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-microscope text-primary mb-3 sr-icon-4"></i>
                              <h3 class="mb-3">Ph tanah</h3>
                              <p class="text-muted mb-0">
                                  <select class="form-control form-control-lg">
                                    <?php
                                    while ($data_h=mysqli_fetch_array($tanah)) {
                                        ?>
                                        <option><?php echo $data_h['kategori']; ?></option>
                                    <?php
                                    }
                                    ?>
                                      
                                   </select>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <form action="analis.php" method="get">
                    <!-- Inputan latitude dan Longtitude hidden -->
                      
                        <input type="text" id="lat" name="latitude">
                        <input type="text" id="long" name="longtitude">
                      
                        <div class="row" style="margin: 1rem">
                              <label class="col-md-2"for="ketinggian">Ph Tanah</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Keasaman Tanah" name="tanah">
                            </div>
                            <label for="ketinggian" class="col-md-2">Curah hujan</label>
                             <div class="col-md-4">
                                 <input type="text" class="form-control" placeholder="Curah Hujan " name="hujan">
                             </div>
                        </div>

                        <div class="row" style="margin: 1rem">
                              <label class="col-md-2"for="ketinggian">Suhu</label>
                            <div class="col-md-4">
                                <input type="text" readonly  class="form-control" placeholder="Suhu" name="suhu" value="<?php echo $suhu?>">
                            </div>
                            <label for="ketinggian" class="col-md-2">Ketinggian</label>
                             <div class="col-md-4">
                                        <input type="text"  class="form-control"  name="ketinggian" placeholder="ketinggian" value="<?php echo $ketinggian?>">
                             </div>
                        </div >
                                    <input type="submit"  name="submit">
                     </form>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
    <script src="js/script_maps.js"></script>


                </body>

</html>