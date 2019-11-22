<?php

include "koneksi-admin.php";
session_start();
if (!isset($_SESSION['nama_admin']) && !isset($_SESSION['password'])){
header ("location: ../index.php");
}
 
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
    <link href="css/slide.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
   
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $_SESSION['nama_admin'];?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
               <ul class="list">
                    <li class="header">DASHBOARD ADMIN</li>
                    <li class="tombol-dbs1">
                        <a class="border-dsb" href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="../../user/daftarpeserta-admin.php">
                            <i class="material-icons">people</i>
                            <span>Peserta Rekrutmen</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="admin.php">
                            <i class="material-icons">account_box</i>
                            <span>Daftar Admin</span>
                        </a>
                    </li>
                        
                    <li class="tombol-dbs1">
                        <a href="user.php">
                            <i class="material-icons">account_box</i>
                            <span>Daftar User</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="lowongan.php">
                            <i class="material-icons">work</i>
                            <span>Daftar Lowongan</span>
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
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                        <div class="body">
                                <img class="gambar1" src="img/perusahaan8.png">
                                <h2 class="word1">Mari Ngoding Bersama Kami !</h2>
                                <div class=slider>
                                    <div class=isi-slider>
                                        <img src="img/gambar1.jpg" alt="Gambar 1">
                                        <img src="img/gambar2.jpg" alt="Gambar 2">
                                        <img src="img/gambar3.jpg" alt="Gambar 3">
                                        <img src="img/gambar4.jpg" alt="Gambar 4">

                                    </div>
                                </div>
                                <h2 class="word2">Rekrutmen dan Seleksi<br>Calon Karyawan PT. Rannu Digital Solution.<br> Makassar, Sulawesi Selatan</h2><br>
                                <h2 class="word3">Registrasi Online : 01 Januari 2019 - 33 januari 2222 Pukul 23.59 WITA</h2><br>
                                <h2 class="word4">Perhatian ! PT. Rannu Digital Solution tidak memungut biaya apapun dan tidak bekerja sama dengan biro perjalanan manapun selama seleksi</h2><br>
                        
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

</body>

</html>
