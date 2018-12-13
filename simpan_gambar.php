
<?php
include 'konek.php';
if (isset($_POST['kirim'])) {
	$namafile=$_FILES['poto']['name'];
	$nametmp=$_FILES['poto']['tmp_name'];
	$folder='gambar/';
	move_uploaded_file($nametmp,$folder.$namafile);

 $save=$dbkonek->query(" INSERT INTO data (AGEN_CODE, AGENT_NAME, gambar)values
 	('$_POST[id_kucing]','$_POST[nama]','$namafile')");
 // $image=$dbkonek->query("update kucing set gambar=('$namafile') , harga = ('$_POST[price]') where id_kucing=('$_POST[id_kucing]')");

		if ($save) {
			echo "simpan berhasil ";
			header("location: http://127.0.0.1:4949/Job/aa_php/"); 
		}else
		{

			echo "gagal save  => ";
			echo  var_dump($namafile);
		}
}




?>