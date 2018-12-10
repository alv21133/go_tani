<?php
$host='192.168.100.6';
$username='root';
$password='';
$db='go_tani';

$dbkonek=mysqli_connect("$host","$username","$password","$db");

var_dump($_POST);

if (isset($_POST["signin"])) {
	// ambil username dan password
	$username = $_POST["username"];
	$password = $_POST["pass"];

	$query = "SELECT * FROM user WHERE username = $username";
	$result = mysqli_query($dbkonek, $query);

	$num = mysqli_num_rows($result);
	//cek apakah ada yang cocok
	if ($num) {
		$row = mysqli_fetch_assoc($result);
		
		if ($row["password"] == $password) {
			header("Location: dashboard.php");
			exit;
		}
	} else {
		echo "<script>
				alert('username tidak ditemukan');
		</script>";
		var_dump($result);
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util-login.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body>
<form action="" method="POST">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/img-01.jpg');">
			<div class="wrap-login100 p-b-30">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-t-20 p-b-45">
						Sign In<br>
					</span>
               
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="signin">
							Sign In
						</button>
					</div>
               
					<div class="text-center w-full p-t-25">
						<p class="txt1">Not a Member? </p><a href="#" class="txt1">Sign Up Now</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</form>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>