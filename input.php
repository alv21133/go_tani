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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

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

                <body>
                    <div id="map"></div>
                    <script>
                        // Note: This example requires that you consent to location sharing when
                        // prompted by your browser. If you see the error "The Geolocation service
                        // failed.", it means you probably did not give permission for the browser to
                        // locate you.
                        var map, infoWindow;
      function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                center: { lat: -34.397, lng: 150.644 },
                                zoom: 6
                            });
                        infoWindow = new google.maps.InfoWindow;
                
                        // Try HTML5 geolocation.
        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function (position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };
                                
                                var latitude = position.coords.latitude;
                                var longtitude = position.coords.longitude;

                                infoWindow.setPosition(pos);
                                infoWindow.setContent('Lokasi Anda !');
                                infoWindow.open(map);
                                map.setCenter(pos);

                                document.cookie = "latitude = " + latitude;
                                document.cookie = "longtitude = " + longtitude;
                            }, function () {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                      }
                
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                            infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                                              'Error: Lokasi tidak ditemukan, periksa perizinan pengaksesan lokasi.' :
                                              'Error: Browser anda tidak mendukung geolocation, periksa gps anda.');
                        infoWindow.open(map);
                      }  
                      
                      
                      //evaluation maps 
                      



            </script>
            
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
?>

                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSHhSMyxh3XrHskeQN40xbTNt2WMQzW94&callback=initMap">
                    </script>

                    <form action="analis.php" method="POST">
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
                </body>

</html>