<?php

session_start();
include 'konek.php';
if ($_SESSION["user"] == null){
    
                            //var_dump($_GET); 
                        
                            $_SESSION["ref"] = 'dashboard.php';
                            echo "<script>
                                alert('anda belum login!');
                                window.location.href = 'signin.php';
                            </script>";
                        }else {
 $id_his=$_GET['@xq%'];

            if($id_his!= null){

                $del=$dbkonek->query("DELETE FROM  history  WHERE id_history='$id_his'");

                if ($del) {
                    header("location:dashboard.php");
                }else {
                    echo"gagal hapus <br>";
                    echo $id_his;
            }
        }

}
?>