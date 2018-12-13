
<?php
include 'konek.php';
$id=$_POST[];
if (isset($_POST['submit'])) {
	$namafile=$_FILES['poto']['name'];
	$nametmp=$_FILES['poto']['tmp_name'];
	$folder='tanaman/';
	move_uploaded_file($nametmp,$folder.$namafile);

 $save=$dbkonek->query("UPDATE tanaman set gambar =
 	('$namafile') where ");
 // $image=$dbkonek->query("update kucing set gambar=('$namafile') , harga = ('$_POST[price]') where id_kucing=('$_POST[id_kucing]')");

		if ($save) {
			echo "simpan berhasil ";
			
		}else
		{

			echo "gagal save  => ";
			echo  var_dump($namafile);
		}
}




?>