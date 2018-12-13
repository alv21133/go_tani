
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
            <div class="modal-header  bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Maaf Username & Password  Salah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Silahkan coba lagi
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="location.href = 'signin.php';" data-dismiss="modal">Tutup</button>
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
error_reporting(0);
 
   if(isset($_POST['submit'])){



        $user=$_POST['username'];
        $pass=$_POST['pass'];

        $query=$dbkonek->query("select * from user where username='$user' limit 1");
        while ($result=mysqli_fetch_array($query)) {
            $db_p=$result['password'];
            $db_u=$result['username'];
        }
        if(password_verify($pass,$db_p)){

            $_SESSION["user"]="$user";
            $_SESSION["pass"]="$pass";
            
            echo"login sukses;";
            header("location:index.php");
        }else{
                
            echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#salah').modal('show');
                });
                </script>
                ";
        }
    
    }
           
	?>

</body>
</html>