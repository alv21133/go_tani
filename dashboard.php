<?php 

session_start();
include 'konek.php';
// include 'functions.php';

// error_reporting(0);


if ($_SESSION["user"] == null){
    
//                             //var_dump($_GET); 
                        
                            $_SESSION["ref"] = 'dashboard.php';
                            echo "<script>
                                alert('anda belum login!');
                                window.location.href = 'signin.php';
                            </script>";
                        }else {
                        
                        

                    
//                         $lat  =    $_GET["lat"];
//                         $long =   $_GET["long"];
//                         $suhu =   $_GET["suhu"];
//                         $hujan =  $_GET["hujan"];
//                         $tanah =  $_GET["tanah"];
//                         $tinggi = $_GET["tinggi"];
                        
                    
//                         //   $lat = $_SESSION["latitude"];
//                         //   $long = $_SESSION["longtitude"];
//                         //   $suhu = $_SESSION["suhu"];
//                         //   $hujan = $_SESSION["hujan"];
//                         //   $tanah = $_SESSION["tanah"];
//                         //   $tinggi = $_SESSION["tinggi"];
//                         $id_user = $_SESSION["id_user"];

                    
//                     $time_tmp=$dbkonek->query("select now() as waktu");
                        
//                     while ($rs=mysqli_fetch_array($time_tmp)) {
//                         $time=$rs['waktu'];
//                     }

//                     //    $cek = mysqli_query($dbkonek, "SELECT right (id_history, 1) as last FROM history ORDER BY id_history DESC LIMIT 1");
//                     //    $tmp_id = 0;
//                     //    while ($id = mysqli_fetch_array($cek)) {
//                     //       $tmp_id = $id["last"];
//                     //    }

//                     $tmp_id =uniqid();
//                     $new_id = "H" . strval($tmp_id);

//                     if ($_SESSION['url']!= null ) {
//                      $query =$dbkonek->query("INSERT INTO history VALUES ('$new_id', '$id_user', '$hujan', '$suhu', '$tanah', '$tinggi', '$lat', '$long','$time')");
//                     }
                        

//                     ?>

                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>Dashboard</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                    
                        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
                        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                        
                    </head>
                    <body>
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
                        

                    <div class="container emp-profile" style="margin-top:4rem;">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                <img src="user.jpg" alt=""/>
                                                <?php
                                                $user_n=$_SESSION['user'];
                                                $get=$dbkonek->query("select * from user where username='$user_n'");
                                                    while ($data=mysqli_fetch_array($get)) {

                                                        $new_id_user=$data['id_user'];

                                                        ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                        <h1>
                                                            <?php 
                                                                echo $data['username'];
                                                            ?>
                                                        </h1>
                                                        <h6>
                                                            <?php 
                                                                echo $data['email'];
                                                    }
                                                            ?>
                                                        </h6>

                                                        <?php
                                                        

                                                        $get=$dbkonek->query("select * from history where id_user='$new_id_user'");
                                                                                                                        
                                                        $all_id=mysqli_num_rows($get);
                                                                                            
                                                            ?>
                                                            
                                                        <h3 class="proile-rating">JUMLAH RIWAYAT  ANDA : <span><?php echo $all_id ?></span></h3>
                                                            
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Riwayat Hasil Analisa :</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                                    <form action=" " method="POST">
                                                        <input type="submit" class="profile-edit-btn" name="keluar" value="Keluar"></input>
                                                     </form>
                                                     <?php

                                                        if(isset($_POST['keluar'])){

                                                            session_destroy();
                                                        
                                                            echo"<script>window.location.href='signin.php'</script>";
                                                            
                                                        }

                                                     ?>
                                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                                <ul class="list-group list-group-flush">
                                                                    <ul class="list-group">
                                                                        <?php
                                                                             while ($dat=mysqli_fetch_array($get)) {
                                                                           ?>
                                                                        <li class="list-group-item">
                                                                        <div class="card text-center">
                                                                                        <div class="card-header bg-dark text-white">
                                                                                           Hasil Analisa
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <h5 class="card-title">Lokasi Analisa :</h5>
                                                                                            <p class="card-text"><?php echo "Latitude : ".round($dat['lat'],3), " Lotitude : ".round($dat['lng'],4) ?></p>
                                                                                            <a href="restore_analisis.php?req=<?php echo $dat['id_history']?> " class="btn btn-info ">BUKA</a>
                                                                                            <a href="hapus_history.php?@xq%=<?php echo $dat['id_history'] ?>" onclick="return confirm('History Akan di Hapus..?');" return class="btn btn-primary ">HAPUS</a>
                                                                                        </div>
                                                                                        <div class="card-footer text-black fab fa-twitter ">
                                                                                            <?php
                                                                                                echo "Dilakukan Pada Tanggal : ".date("d-m-Y", strtotime($dat['time']));
                                                                                            ?>
                                                                                        </div>
                                                                                </div>
                                                                            </li> 
                                                                        <?php
                                                                                 }

                                                                                 ?>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                </div>                                       
                                </form>
                                
                            </div>
                            </div>
                            </div>
                            </div>
                        
                    <?php

                    include_once'footer.php';
                    ?>



                        
                        
                    </body>
<?php
}
?>
                    </html>

