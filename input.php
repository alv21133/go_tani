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
                            height: 90%;
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
   
         
        <div id="map"></div>
            <section class="bg-light" id="about">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 mx-auto text-center">
                  <h2 class="section-heading text-black">Lokasi Anda Tidak Sesuai ?</h2>
                  <hr class="black my-4">
                  <p class=" mb-4 text-black">Jika geolokasi pada sistem kami kurang akurat anda bisa menggatinya dengan 
                      cara klik area yang sesuai dimana anda berada saat ini. Akurasi dari lokasi sangat berpengaruh pada hasil analisis dari sistem kami. Maka Dari Itu Klik Dengan tepat dimana lokasi anda ..  </p>
              </div>
            </div>
          </section>
           
                  <!-- Modal -->
              <div class="modal fade" id="setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Aktifkan Geolocation Otomatis ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Jika da kotak dialog penggunana GPS maka klik ijinkan atau allow
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-Danger" onclick="getLocation()" data-dismiss="modal">Mengerti</button>
                    </div>
                  </div>
                </div>
              </div>
                          
<?php

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
                            <h2 class="section-heading">Pilih Data Sesuai Lokasi Anda </h2>
                            <hr class="my-4">
                          </div>
                        </div>
                      </div>
                        <form action="hasil.php" method="post">
                        <div class="container">
                          <div class="row">
                          <input hidden type="text" id="lat" name="latitude" >
                            <input hidden type="text" id="long" name="longtitude" >
                          <div class="col-lg-6 col-md-12 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-cloud-showers-heavy text-primary mb-3 sr-icon-3"></i>
                              <h3 class="mb-3">Curah Hujan</h3>
                              <p class="text-muted mb-0">
                                  <select class="form-control form-control-lg" name="hujan">
                                    
                                    <?php while ($data=mysqli_fetch_array($hujan)) {

                                      if (($data['hujan_max']+$data['hujan_min'])/2 == 225.5) {
                                        ?>
                                                 <option value="<?= ($data['hujan_max']+$data['hujan_min'])/2?>" selected><?php echo $data['kategori']; ?> (<?= $data['hujan_max'] ?> - <?=$data['hujan_min'];?>)</option>
                                        <?php
                                      }

                                    ?>

                                        
                                        <option value="<?= ($data['hujan_max']+$data['hujan_min'])/2;?>"><?php echo $data['kategori']; ?> (<?= $data['hujan_max'] ?> - <?=$data['hujan_min'];?>)</option>
                                    <?php
                                    } 
                                    ?>
                                      
                                   </select>
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-microscope text-primary mb-3 sr-icon-4"></i>
                              <h3 class="mb-3">Ph tanah</h3>
                              <p class="text-muted mb-0">
                                  <select class="form-control form-control-lg" name="tanah">
                                    <?php
                                    while ($data_h=mysqli_fetch_array($tanah)) {
                                        if (($data_h['ph_max']+$data_h['ph_min'])/2 == 7.05) { ?>
                                          <option value="<?= ($data_h['ph_max']+$data_h['ph_min'])/2;?>" selected><?php echo $data_h['kategori']; ?> - <?= ($data_h['ph_max']+$data_h['ph_min'])/2;?></option>
                                        <?php } else { ?>
                                        <option value="<?= ($data_h['ph_max']+$data_h['ph_min'])/2;?>"><?php echo $data_h['kategori']; ?> - <?= ($data_h['ph_max']+$data_h['ph_min'])/2;?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                      
                                   </select>
                              </p>
                            </div>
                          </div>
                          
                         </div>  <!--  raw -->
                         
                      </div>     <!-- container -->
                          
                          <div class="row">
                               <div class="col-lg-12 text-center" style="margin-top:3rem">
                                    <button type="submit" name="submit" class="btn btn-light btn-xl sr-button" >SUBMIT</button>
                               </div>     
                          </div>
                                    
                          </form>
                        
                    </section>
                    <form action="hasil.php" method="post">
                    

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


          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#setuju').modal('show');
              });
          </script>

<?php
include_once 'footer.php';
?>
  </body>

</html>