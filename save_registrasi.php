<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
     <!-- Modal -->
        <div class="modal fade" id="salah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header  bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel">Selamat Anda sudah terdaftar di GO_TANI !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Account anda sudah bisa di gunakan sekarang, silahkan login untuk memulai 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="location.href = 'signin.php';" data-dismiss="modal">Login</button>
                <button type="button" class="btn btn-secondary"  onclick="location.href = 'index.php';" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        </div>

        
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

    <?php

include_once'konek.php';
 
        if(isset($_POST['submit'])){

                $cek=$dbkonek->query("SELECT right (id_user,1) as last FROM user ORDER BY id_user DESC LIMIT 1");

                while ($id=mysqli_fetch_array($cek)) {
                   $tmp_id= $id['last'];
                    
                }
                $tmp_id2=$tmp_id+1;
                $new_id="U".strval($tmp_id2);
                            $advance=[
                                        'cost'=>11,
                                    ];

                            $user=$_POST['username'];
                            $mail=$_POST['mail'];
                            $pass_or=$_POST['password'];
                            $pass= password_hash($pass_or,PASSWORD_DEFAULT,$advance);

                            $insert=$dbkonek->query("insert into user values
                                                        ('$new_id','$user','$pass','$mail')

                                                    ");
                        
                        if($insert){

                             echo "<script type='text/javascript'>
                                $(document).ready(function(){
                                $('#salah').modal('show');
                                });
                                </script>
                                ";
                        }else{
                            echo"gagal simpan ke database";
                            var_dump($user,$pass , $mail, $new_id);
                        }
                        
                        
        }
                                
                         
                    
    
           
	?>

</body>
</html>