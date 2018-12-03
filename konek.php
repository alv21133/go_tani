<?php
$host='localhost';
$username='root';
$password='';
$db='go_tani';

$dbkonek=new mysqli ("$host","$username","$password","$db");

if ($dbkonek->connect_error) {
	echo "koneksi gagal";	# code...
}else
{
	echo " Database cenected ";
}

?>