<?php
include "koneksi-user.php";
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
header ("location: ../login.php");
}

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
    <link href="css/slide.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <link href="css/lowongan.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

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
                        <a href="daftarpeserta.php">
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
                        <a class="border-dsb" href="lowongan.php">
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
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>

        <div class="row clearfix">
                        <!-- Task Info -->
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="card">
                                <div class="header">
                                    <h2>Daftar Lowongan</h2>
                                </div>
                                <div class="body">

                               <div class="lowongan">
                            <table class="table-lowongan" cellspacing="0">

                                <?php
                                    $query      = "select * from lowongan";
                                    $execute    = mysqli_query($koneksi, $query);

                                    while($data = mysqli_fetch_assoc($execute)) {
                                ?>

                                <tr >
                                    <th class="judul-lowongan" colspan="3"> <?php echo $data['nama_lowongan'];?> </th>
                                </tr>
                                <tr>
                                    <td class="syarat" colspan="3"><u>Persyaratan</u></td>
                                </tr>
                                <tr >
                                    <td class="deskripsi" colspan="3"> <?php echo $data['deskripsi1'];?> <br> <?php echo $data['deskripsi2'];?> <br> <?php echo $data['deskripsi3'];?></td>
                                </tr>
                                <tr >
                                    <td class="tombol-lamar" colspan="3">
                                        <a style="text-decoration: none;" class="tombol" href="lamar-lowongan.php?<?php echo 'lamar=' .$data['id'] ?>">Lamar Pekerjaan</a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</body>

</html>
