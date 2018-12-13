<?php 

include_once 'konek.php';

// $host='localhost';
// $username='root';
// $password='';
// $db='go_tani';

// $dbkonek= mysqli_connect("$host","$username","$password","$db");

function registrasi($data) {

   global $dbkonek;

   $count = mysqli_query($dbkonek, "SELECT count(*) as total FROM user");

   $count = mysqli_fetch_assoc($count);

   var_dump($count);

   $id_user = "U" . ($count["total"] + 1);
   $username = strtolower(stripcslashes($data["username"]));
   $password = strtolower(stripcslashes($data["password"]));
   $email = strtolower(stripcslashes($data["email"]));

   var_dump($id_user);

   $password = password_hash($password, PASSWORD_DEFAULT);

   //$query = "INSERT INTO user VALUES ('$id_user', '$username', '$password', '$email')";
   //$query = "INSERT INTO `user`(`id_user`, `username`, `password`, `email`) VALUES ('$id_user', '$username', '$password', '$email')";
   //var_dump($query);
   // if (mysqli_num_rows($usernasme_check_available) > 0) {
   //    return false;
   // } elseif (mysqli_num_rows($email_check_available) > 0) {
   //    return false;
   // } else {
      // mysqli_query($dbkonek, $query);
      
 var_dump($id_user);
      $insert=$dbkonek->query("insert into user  VALUES ('$id_user','$username', '$password', '$email')");

      if($insert){
         
         echo"sukses";
         return true;

      }else {
         echo"error insert";
      }
                

   //}
}

?>