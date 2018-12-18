

<?php 
session_start();
include 'konek.php';
error_reporting(0);
if ($_SESSION["user"] == null){
    
                            //var_dump($_GET); 
                        
                            $_SESSION["ref"] = 'dashboard.php';
                            echo "<script>
                                alert('anda belum login!');
                                window.location.href = 'signin.php';
                            </script>";
                        }else {
                        
                        

                    
                        $lat  =    $_GET["lat"];
                        $long =   $_GET["long"];
                        $suhu =   $_GET["suhu"];
                        $hujan =  $_GET["hujan"];
                        $tanah =  $_GET["tanah"];
                        $tinggi = $_GET["tinggi"];
                        
                    
                        //   $lat = $_SESSION["latitude"];
                        //   $long = $_SESSION["longtitude"];
                        //   $suhu = $_SESSION["suhu"];
                        //   $hujan = $_SESSION["hujan"];
                        //   $tanah = $_SESSION["tanah"];
                        //   $tinggi = $_SESSION["tinggi"];
                        $id_user = $_SESSION["id_user"];

                    
                    $time_tmp=$dbkonek->query("select now() as waktu");
                        
                    while ($rs=mysqli_fetch_array($time_tmp)) {
                        $time=$rs['waktu'];
                    }

                    //    $cek = mysqli_query($dbkonek, "SELECT right (id_history, 1) as last FROM history ORDER BY id_history DESC LIMIT 1");
                    //    $tmp_id = 0;
                    //    while ($id = mysqli_fetch_array($cek)) {
                    //       $tmp_id = $id["last"];
                    //    }

                    $tmp_id =uniqid();
                    $new_id = "H" . strval($tmp_id);

                    if ($_SESSION['url']!= null ) {
                     $query =$dbkonek->query("INSERT INTO history VALUES ('$new_id', '$id_user', '$hujan', '$suhu', '$tanah', '$tinggi', '$lat', '$long','$time')");
                    }
                        
                    if($query){
                        header("location:dashboard.php");
                    }


                }
                    ?>

    