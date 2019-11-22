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
                        <a class="border-dsb" href="lowongan.php">
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
            <div class="block-header">
            </div>

                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2 class="word2">Form Edit Lowongan <br>PT. Rannu Digital Solution</h2>
                        </div>
                        <div class="body">

                <?php
                    include 'koneksi.php';

                        $edit       = $_GET['edit'];
                        $query      = "select * from lowongan where id='$edit' ";
                        $execute    = mysqli_query($koneksi, $query);
                        $data       = mysqli_fetch_assoc($execute);
                        
                        if(isset($_POST['submit'])) {
                            $nama_lowongan  = $_POST['nama_lowongan'];
                            $deskripsi1  = $_POST['deskripsi1'];
                            $deskripsi2  = $_POST['deskripsi2'];
                            $deskripsi3  = $_POST['deskripsi3'];
                            $error = array();

                            $query  = "update lowongan set nama_lowongan='$nama_lowongan', deskripsi1='$deskripsi1', deskripsi2='$deskripsi2', deskripsi3='$deskripsi3' where id = '$edit' ";

                                $execute = mysqli_query($koneksi, $query);

                                if ($execute){
                                        echo "<script>alert('Berhasil Mengedit Lowongan !')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url= lowongan.php'>";
                                    }else{
                                        echo "<script>alert('Gagal Mengedit Lowongan !')</script>";
                                        echo "<meta http-equiv='refresh' content='1 url= lowongan.php'>";
                                    }
                                }
                        ?>

                        <form method="post" action="">
                            <table class="login" border=0 align="center" cellpadding=5 cellspacing=0>
                                <tr>
                                    <td colspan=3 style="color: red; font-size: 13px; padding-left: 90px;"><?php echo isset($error['lowongan_terdaftar']) ? $error['lowongan_terdaftar'] : '';?></font></td>
                                </tr>
                                <tr>
                                    <td>Masukkan Nama :</td> 
                                    <td><input  class="input" type="text" name="nama_lowongan" value="<?php echo $data['nama_lowongan'] ?>"></td> 
                                </tr>   
                                <tr>
                                    <td>Syarat Ke 1 :</td> 
                                    <td><textarea class="input-lowongan" rows="3" cols="70" name="deskripsi1" ><?php echo $data['deskripsi1'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Syarat Ke 2 :</td> 
                                    <td><textarea class="input-lowongan" rows="3" cols="70" name="deskripsi2" ><?php echo $data['deskripsi2'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Syarat Ke 3 :</td> 
                                    <td><textarea class="input-lowongan" rows="3" cols="70" name="deskripsi3" ><?php echo $data['deskripsi3'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
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
