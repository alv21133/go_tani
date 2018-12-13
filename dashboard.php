<?php 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
     <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>


<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        NAMA USER
                                    </h5>
                                    <h6>
                                        EMAIL USER
                                    </h6>
                                    <p class="proile-rating">JUMLAH RIWAYAT : <span>8</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-9">
                                            <ul class="list-group list-group-flush">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <a class="text-white btn-floating btn-fb btn-sm"><i class="fab fa-facebook"></i></a> Cras justo odio
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a class="btn-floating btn-tw btn-sm"><i class="fab fa-twitter"></i></a>Dapibus ac facilisis in
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a class="text-white btn-floating btn-li btn-sm"><i class="fab fa-linkedin"></i></a>Morbi leo risus
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a class="text-white btn-floating btn-slack btn-sm"><i class="fab fa-slack"></i></a>Porta ac consectetur
                                                    ac
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a class="text-white btn-floating btn-yt btn-sm"><i class="fab fa-youtube"></i></a>Vestibulum at eros
                                                    </li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                            </div>                                       
            </form>           
        </div>


</body>
</html>