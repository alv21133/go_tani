<?php
include_once'konek.php';



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
        <form action="simpan_gambar.php" method="POST"  enctype="multipart/form-data">
   
            <select  name="tanaman">
                <?php 
                    $query=$dbkonek->query("select nama from tanaman");
                    while ($data=mysqli_fetch_array($query)) {
     
               ?>
               
                <option value=" "><?php echo $data['nama']; ?></option>
                <?php
                }
                 ?>

            </select>


            <br>
            <br>
            <br>
            <br>
            <input type="file" name="poto"></input><br>
            <br>
            <input type="submit" name="submit" value="submit"></input>

    </form>
</body>
</html>