<?php
include "koneksi-user.php";
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
header ("location: ../login.php");
}

?>
 
<?php

mysql_connect("localhost","root","") or die ("");
mysql_select_db("rekrutment") or die ("");


$perintah1="select nama from peserta_rekrutment where id_lowongan = 1";
$hasil1=mysql_query($perintah1) or die(mysql_error());
$backend = mysql_num_rows($hasil1);

$perintah2="select nama from peserta_rekrutment where id_lowongan = 2";
$hasil2=mysql_query($perintah2) or die(mysql_error());
$frontend = mysql_num_rows($hasil2);

$perintah3="select nama from peserta_rekrutment where id_lowongan = 3";
$hasil3=mysql_query($perintah3) or die(mysql_error());
$android = mysql_num_rows($hasil3);

$perintah4="select nama from peserta_rekrutment where id_lowongan = 4";
$hasil4=mysql_query($perintah4) or die(mysql_error());
$ios = mysql_num_rows($hasil4);

$perintah5="select nama from peserta_rekrutment";
$hasil5=mysql_query($perintah5) or die(mysql_error());
$totalpeserta = mysql_num_rows($hasil5);

?>

<?php 
include "koneksi.php";
$no = 1;

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Selamat Datang | di Rekrutmen PT. Rannu Digital Solution</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/popup.css" rel="stylesheet">
    <link href="css/daftarpeserta.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <!-- Datatables  -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Rekrutmen PT. Rannu Digital Solution</a>
            </div>
            <div class="navbar-header2">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars2"></a>
                <a class="navbar-brand"  href="logout.php">Logout</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $_SESSION['user'];?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                    
                <ul class="list">
                    <li class="header">DASHBOARD USER</li>
                    <li class="tombol-dbs1" >
                            <a href="index.php">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a class="border-dsb" href="daftarpeserta.php">
                            <i class="material-icons">people</i>
                            <span>Peserta Rekrutmen</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="datadiri.php">
                            <i class="material-icons">assignment</i>
                            <span>Lihat Data Diri</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="lowongan.php">
                            <i class="material-icons">work</i>
                            <span>Lowongan</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">PT. Rannu Digital Solution</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->

                        <div class="row clearfix"></div>

                        <div class="row clearfix">
                            <!-- Task Info -->
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="card">
                                    <div class="header">
                                        <h2>Daftar Peserta Keseluruhan</h2>
                                    </div>
                                    <div class="body">

                                     <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-red">
                                        <div class="icon">
                                            <img src="icon/backend.png" class="icon-pekerjaan">
                                        </div>
                                        <div class="content">
                                            <div class="text">Backend Developer</div>
                                            <div class="number"><?php echo $backend; ?></div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-red ">
                                        <div class="icon">
                                            <img src="icon/frontend.png" class="icon-pekerjaan">
                                        </div>
                                        <div class="content">
                                            <div class="text">Frontend Developer</div>
                                            <div class="number"><?php echo $frontend; ?></div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-red ">
                                        <div class="icon">
                                            <img src="icon/android.png" class="icon-pekerjaan">
                                        </div>
                                        <div class="content">
                                            <div class="text">Android Developer</div>
                                            <div class="number"><?php echo $android; ?></div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-red ">
                                        <div class="icon">
                                            <img src="icon/ios.png" class="icon-pekerjaan">
                                        </div>
                                        <div class="content">
                                            <div class="text">iOS Developer</div>
                                            <div class="number"><?php echo $ios; ?></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-total">
                                <div class="bg-red">
                                        <div class="bg-icon-total">
                                            <img src="icon/people.jpg" class="icon-total">
                                        </div>
                                        <div class="content">
                                            <div class="text2">Jumlah Peserta Keseluruhan</div>
                                            <div class="number2"><?php echo $totalpeserta; ?></div>
                                        </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>


    </section>

</body>

</html>
