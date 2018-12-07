<?php
include_once("konek.php");
	
function analisis ($data) {

	if (empty($data['latitude']) || empty($data['longtitude'])) {
		echo "<script>
			alert('Inputan tidak lengkap');
			window.location.assign('input.php');
		</script>";
	}
	global $dbkonek;
	$tanah = $data['tanah'];
	$hujan = $data['hujan'];
	$lat = $data['latitude'];
	$long = $data['longtitude'];

	 
	$curl2 = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl2, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://maps.googleapis.com/maps/api/elevation/json?locations='."$lat".','."$long".'&key=AIzaSyDS36n8mVUcxPAMUcTSptdG8k_vZ-TcdjQ',
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp2 = curl_exec($curl2);
	// Close request to clear up some resources
	curl_close($curl2);

	$resultJson2 = json_decode($resp2, true);
	// print_r($resultJson2);
	
	$ketinggian = $resultJson2['results'][0]['elevation']/10;

	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?lat=". "$lat" . "&lon=". "$long" ."&APPID=659e5a7c59b5d4ecc49ab63b97b05727",
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);

	$resultJson = json_decode($resp, true);
	// print_r($resultJson);

	$suhu = round($resultJson['main']['temp'])-273;
		
	$result_tinggi = mysqli_query($dbkonek, "SELECT	* FROM ketinggian");
	$result_suhu = mysqli_query($dbkonek, "SELECT * FROM suhu");
	$result_tanah = mysqli_query($dbkonek, "SELECT * FROM tanah");
	$result_curah_hujan = mysqli_query($dbkonek, "SELECT * FROM curah_hujan");

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

	$rows['hujan'] = $param_hujan;
	$rows['suhu'] = $param_suhu;
	$rows['tanah'] = $param_tanah;
	$rows['tinggi'] = $param_tinggi;
	
	
	return $rows;
	
	}
?>