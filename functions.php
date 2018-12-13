<?php 

include_once 'konek.php';

// $host='localhost';
// $username='root';
// $password='';
// $db='go_tani';

// $dbkonek= mysqli_connect("$host","$username","$password","$db");

function addHistory($data) {
   global $dbkonek;

   $lat = $data["latitude"];
   $long = $data["longtitude"];
   $suhu = $data["suhu"];
   $hujan = $data["hujan"];
   $tanah = $data["tanah"];
   $tinggi = $data["tinggi"];
   $id_user = $data["id_user"];

   $cek = mysqli_query($dbkonek, "SELECT right (id_history, 1) as last FROM history ORDER BY id_history DESC LIMIT 1");
   while ($id = mysqli_fetch_array($cek)) {
      $tmp_id = $id["last"];
   }

   $tmp_id += 1;
   $new_id = "H" . srtval($tmp_id);

   $query = "INSERT INTO `history`(`id_history`, `id_user`, `hujan`, `suhu`, `tanah`, `tinggi`, `lat`, `lng`, `time`) VALUES ('$new_id', '$id_user', '$hujan', '$suhu', '$tanah', '$tinggi', '$lat', '$long', 'date(DATE_ATOM, time())')";

   mysqli_query($dbkonek, $query);

   return mysqli_affected_rows($dbkonek);
}

?>