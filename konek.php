<?php
$host='localhost';
$user='root';
$pass='';
$db='go_tani';

$dbkonek= new mysqli("$host","$user","$pass","$db");

if ($dbkonek->connect_error) {
	echo"gagal konek";

}else{
	//echo"conected";
}

?>