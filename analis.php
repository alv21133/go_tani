<?php
include_once("konek.php");



if (isset($_POST['submit'])) {
	
$tanah = $_POST['tanah'];
$hujan = $_POST['hujan'];
$suhu = $_POST['suhu'];
$ketinggian = $_POST['ketinggian'];
	
$result_tanaman = mysqli_query($dbkonek, "SELECT * FROM tanaman");
$result_tinggi = mysqli_query($dbkonek, "SELECT	* FROM ketinggian");
$result_suhu = mysqli_query($dbkonek, "SELECT * FROM suhu");
$result_tanah = mysqli_query($dbkonek, "SELECT * FROM tanah");
$result_curah_hujan = mysqli_query($dbkonek, "SELECT * FROM curah_hujan");


while ($row = mysqli_fetch_assoc($result_tanaman)) {
	$rows_tanaman[] = $row;
}

while ($row_tinggi = mysqli_fetch_assoc($result_tinggi)) {
	$rows_tinggi[] = $row_tinggi;
}

while ($row_suhu = mysqli_fetch_assoc($result_suhu)) {
	$rows_suhu[] = $row_suhu;
}

while ($row_tanah = mysqli_fetch_assoc($result_tanah)) {
	$rows_tanah[] = $row_tanah;
}

while ($row_curah_hujan = mysqli_fetch_assoc($result_curah_hujan)) {
	$rows_curah_hujan[] = $row_curah_hujan;
}



	if ($ketinggian > $rows_tinggi[0]["min_tinggi"] && $ketinggian < $rows_tinggi[0]["max_tinggi"]) {
		$param_tinggi = "K01";
	} elseif ($ketinggian > $rows_tinggi[2]["min_tinggi"] && $ketinggian < $rows_tinggi[2]["max_tinggi"]) {
		$param_tinggi = "K03";
	} elseif ($ketinggian > $rows_tinggi[1]["min_tinggi"] && $ketinggian < $rows_tinggi[1]["max_tinggi"]) {
		$param_tinggi = "K02";
	} elseif ($ketinggian > $rows_tinggi[3]["min_tinggi"] && $ketinggian < $rows_tinggi[3]["max_tinggi"]) {
		$param_tinggi = "K04";
	}

	if ($suhu > $rows_suhu[0]["min_suhu"] && $suhu < $rows_suhu[0]["max_suhu"]) {
		$param_suhu = "s01";
	} elseif ($suhu > $rows_suhu[1]["min_suhu"] && $suhu < $rows_suhu[1]["max_suhu"]) {
		$param_suhu = "s02";
	} elseif ($suhu > $rows_suhu[2]["min_suhu"] && $suhu < $rows_suhu[2]["max_suhu"]) {
		$param_suhu = "s03";
	} elseif ($suhu > $rows_suhu[3]["min_suhu"] && $suhu < $rows_suhu[3]["max_suhu"]) {
		$param_suhu = "s04";
	} 

	if ($tanah > $rows_tanah[0]["ph_min"] && $tanah < $rows_tanah[0]["ph_max"]) {
		$param_tanah = "t01";
	} elseif ($tanah > $rows_tanah[1]["ph_min"] && $tanah < $rows_tanah[1]["ph_max"]) {
		$param_tanah = "t02";
	} elseif ($tanah > $rows_tanah[2]["ph_min"] && $tanah < $rows_tanah[2]["ph_max"]) {
		$param_tanah = "t03";
	} elseif ($tanah > $rows_tanah[3]["ph_min"] && $tanah < $rows_tanah[3]["ph_max"]) {
		$param_tanah = "t04";
	} elseif ($tanah > $rows_tanah[4]["ph_min"] && $tanah < $rows_tanah[4]["ph_max"]) {
		$param_tanah = "t05";
	} elseif ($tanah > $rows_tanah[5]["ph_min"] && $tanah < $rows_tanah[5]["ph_max"]) {
		$param_tanah = "t06";
	} 


	if ($hujan > $rows_curah_hujan[0]["hujan_min"] && $hujan < $rows_curah_hujan[0]["hujan_max"]) {
		$param_hujan = "H001";
	} elseif ($hujan > $rows_curah_hujan[1]["hujan_min"] && $hujan < $rows_curah_hujan[1]["hujan_max"]) {
		$param_hujan = "H002";
	} elseif ($hujan > $rows_curah_hujan[2]["hujan_min"] && $hujan < $rows_curah_hujan[2]["hujan_max"]) {
		$param_hujan = "H003";
	} elseif ($hujan > $rows_curah_hujan[3]["hujan_min"] && $hujan < $rows_curah_hujan[3]["hujan_max"]) {
		$param_hujan = "H004";
	} elseif ($hujan > $rows_curah_hujan[4]["hujan_min"] && $hujan < $rows_curah_hujan[4]["hujan_max"]) {
		$param_hujan = "H005";
	}

echo $param_hujan;
echo $param_tanah;
echo $param_suhu;
echo $param_tinggi;


$result = mysqli_query($dbkonek, "SELECT * FROM tanaman WHERE 
						ketinggian = '$param_tinggi' AND
						jenis_tanah = '$param_tanah' AND
						curah_hujan = '$param_hujan' AND
						suhu = '$param_suhu'

						") ;
$hasil =$dbkonek->query("SELECT * FROM tanaman WHERE 
						ketinggian = '$param_tinggi' AND
						jenis_tanah = '$param_tanah' AND
						curah_hujan = '$param_hujan' AND
						suhu = '$param_suhu'

						") ;

var_dump($result);
while ($row_result = mysqli_fetch_assoc($result)) {
	$rows_result[] = $row_result;
}

foreach ($rows_result as $r) {
	var_dump($r);
}

}



?>

<!DOCTYPE html>
<html>
<head>
	<title> GO_TANI</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.grid.min.css">
</head>
<body>
	<div class="table-responsive-sm">
		  <table class="table table-hover">
		  	 <thead>
					<tr>
						<th scope="col">id</th>
						<th scope="col">no</th>
						 <th scope="col">Tanaman</th>
						 <th scope="col">Waktu Panen</th>
						 <th scope="col">Harga Pasar</th>
					 </tr>
				</thead>
						  <tbody>
		  		<?php

		  			while ($data=mysqli_fetch_array($hasil)) {
		  				$q++;
		  				?>
						    
						    <tr>
						    	<td><?php echo $q ?></td>
						       <td><?php echo $data['id_tanaman'] ?></td>
						      <td><?php echo $data['nama'] ?></td>
						      <td><?php echo $data['waktu_panen'] ?></td>
						      <td><?php echo $data['harga'] ?></td>
						      
						    </tr>
				 <?php
					}
				 ?>
						     </tbody>
						  </table>
					
	</div>

</body>
</html>