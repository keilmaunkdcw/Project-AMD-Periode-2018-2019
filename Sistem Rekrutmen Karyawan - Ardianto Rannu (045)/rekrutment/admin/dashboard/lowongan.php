<?php
include "koneksi-admin.php";
session_start();
if (!isset($_SESSION['nama_admin']) && !isset($_SESSION['password'])){
header ("location: ../index.php");
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
    <link href="css/menu.css" rel="stylesheet">

    <!-- Datatables  -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

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


            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2 class="word2">Daftar Lowongan <br>PT. Rannu Digital Solution</h2>
                        </div>
                        <div class="body">
                        <a style="text-decoration: none; " class="tambah1" href="pendaftaran-lowongan.php">+Tambah Lowongan</a>

                        <table class="dataTables" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lowongan</th>
                            <th>Syarat 1</th>
                            <th>Syarat 2</th>
                            <th>Syarat 3</th>
                            <th>Dibuat Pada Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
        
                    <tbody>
                            
                            <?php
                                    $query      = "select * from lowongan";
                                    $execute    = mysqli_query($koneksi, $query);

                                    while($data = mysqli_fetch_assoc($execute)) {
                                ?>

                                <tr>
                                    <td> <?php echo $no++;?> </td>
                                    <td> <?php echo $data['nama_lowongan'];?> </td>
                                    <td> <?php echo $data['deskripsi1'];?> </td>
                                    <td> <?php echo $data['deskripsi2'];?> </td>
                                    <td> <?php echo $data['deskripsi3'];?> </td>
                                    <td> <?php echo $data['created_at'];?> </td>
                                    

                                   <td>
                                    <a href="edit-lowongan.php?<?php echo 'edit=' .$data['id'] ?>"><i class="material-icons">edit</i></a>
                                    <a href="hapus-lowongan.php?<?php echo 'hapus=' .$data['id'] ?>"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                    </tbody>
                </table>

                            <script src="js/jquery-1.12.0.min.js"></script>
                            <script src="js/jquery.dataTables.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                $('.dataTables').DataTable({
                                    "aLengthMenu": [[5, 10, 20, 50],[ 5, 10, 20, 50]], // mengatur jumlah entri
                                });
                            } );
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
