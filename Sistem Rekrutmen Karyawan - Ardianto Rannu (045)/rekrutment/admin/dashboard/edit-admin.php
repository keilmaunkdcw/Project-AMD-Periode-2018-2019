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
    <link href="css/input.css" rel="stylesheet">
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
                        <a href="index.php">
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
                        <a class="border-dsb" href="admin.php">
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
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>

                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2 class="word2">Form Edit Admin <br>PT. Rannu Digital Solution</h2>
                        </div>
                        <div class="body">

                <?php
                    include 'koneksi.php';

                        $edit       = $_GET['edit'];
                        $query      = "select * from admin where id='$edit' ";
                        $execute    = mysqli_query($koneksi, $query);
                        $data       = mysqli_fetch_assoc($execute);
                        
                        if(isset($_POST['submit'])) {
                            $nama_admin = $_POST['nama_admin'];
                            $password = $_POST['password'];
                            $tgl_lahir  = $_POST['tgl_lahir'];
                            $error = array();
                            $query  = "update admin set nama_admin='$nama_admin', password='$password', tgl_lahir='$tgl_lahir' where id = '$edit' ";

                            $cekdulu= "select * from admin where nama_admin ='$_POST[nama_admin]'"; /* Mengecek apakah data nama_admin sudah ada di database */

                            $prosescek= mysql_query($cekdulu);

                        if (mysql_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
                                $error['admin_terdaftar'] = 'Nama Admin Sudah Terdaftar !';
                            } 
                        else if (empty($nama_admin)){
                            $error['nama_admin'] = 'Nama Admin Belum Diisi !';
                            }
                        else if (empty($password)){
                            $error['password'] = 'Password Belum Diisi !';
                            }
                        else if (empty($tgl_lahir)){
                            $error['tgl_lahir'] = 'Tanggal Lahir Belum Diisi !';
                            }
                            else{
                                $execute = mysqli_query($koneksi, $query);

                                if ($execute){
                                        echo "<script>alert('Berhasil Mengedit Data !')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url= admin.php'>";
                                    }else{
                                        echo "<script>alert('Gagal Mengedit Data !')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url= admin.php'>";
                                    }
                                }
                            }
                    ?>


                        <form method="post" action="">
                            <table class="login" border=0 align="center" cellpadding=5 cellspacing=0>
                                <tr>
                                    <td colspan=3 style="color: red; font-size: 13px; padding-left: 90px;"><?php echo isset($error['admin_terdaftar']) ? $error['admin_terdaftar'] : '';?></font></td>
                                </tr>
                                <tr>
                                <td style="padding-top: 7px;">Nama Lengkap</td>
                                <td>: </td>
                                <td><input class="input" type="text" name="nama_admin" value="<?php echo $data['nama_admin'] ?>"></td>
                                </tr>
                                <tr>
                                <td colspan=3 style="color: red; font-size: 13px; padding-left: 75px;"><?php echo isset($error['nama_admin']) ? $error['nama_admin'] : '';?></font></td>
                                </tr>

                                <tr>
                                <td style="padding-top: 7px;">Password</td>
                                <td>: </td>
                                <td><input class="input" type="password" name="password" value="<?php echo $data['password'] ?>"></td>
                                </tr>
                                <tr>
                                <td colspan=3 style="color: red; font-size: 13px; padding-left: 75px;"><?php echo isset($error['password']) ? $error['password'] : '';?></font></td>
                                </tr>

                                <tr>
                                <td>Tanggal Lahir</td>
                                <td> : </td>
                                <td><input class="input" type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>"></td>
                                </tr>
                                <tr>
                                <td colspan=3 style="color: red; font-size: 13px; padding-left: 75px;"><?php echo isset($error['tgl_lahir']) ? $error['tgl_lahir'] : '';?></font></td>
                                </tr>

                                <tr>
                                <td colspan=2></td>
                                <td><input class="tombol" type="submit" name="submit" value="Edit"></td>
                                </tr>
                                </table>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
</body>

</html>
