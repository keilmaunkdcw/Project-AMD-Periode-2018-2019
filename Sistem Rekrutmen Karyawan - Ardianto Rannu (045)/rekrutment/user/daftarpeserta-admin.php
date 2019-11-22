<?php
include "koneksi-admin.php";
session_start();
if (!isset($_SESSION['nama_admin']) && !isset($_SESSION['password'])){
header ("location: ../admin/index.php");
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
    <link href="../admin/dashboard/css/daftarpeserta.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <!-- Datatables  -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <style type="text/css">
 
    </style>
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
                <a class="navbar-brand"  href="../admin/dashboard/logout.php">Logout</a>
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
                        <a href="../admin/dashboard/index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a class="border-dsb" href="daftarpeserta-admin.php">
                            <i class="material-icons">people</i>
                            <span>Peserta Rekrutmen</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="../admin/dashboard/admin.php">
                            <i class="material-icons">account_box</i>
                            <span>Daftar Admin</span>
                        </a>
                    </li>
                        
                    <li class="tombol-dbs1">
                        <a href="../admin/dashboard/user.php">
                            <i class="material-icons">account_box</i>
                            <span>Daftar User</span>
                        </a>
                    </li>
                    <li class="tombol-dbs1">
                        <a href="../admin/dashboard/lowongan.php">
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
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                         <a style="text-decoration: none;"  href="#popup1">
                            <div class="icon">
                                <img src="icon/backend.png" class="icon-pekerjaan">
                            </div>
                            <div class="content">
                                <div class="text">Backend Developer</div>
                                <div class="number"><?php echo $backend; ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div id="popup1">
                    <div class="window1">
                        <a href="#" class="close-button1" title="Close">X</a>
                        <h3>Daftar Peserta Backend Developer</h3>
                        <hr>
                    
                    <div class="peserta">
                        <table class="dataTables" class="display" cellspacing="0" width="95%">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               <?php  
                                    include "koneksi.php";    
                                    $no = 1;
                                    $query = "SELECT * FROM peserta_rekrutment where id_lowongan = 1";
                                    $sql = mysqli_query($koneksi, $query); 
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                    while($data = mysqli_fetch_array($sql)){ 
                                        echo "<tr>";    
                                        echo "<td><img src='images/".$data['gambar']."' width='70' height='90'></td>";  
                                        echo "<td>".$data['nama']."</td>";    
                                        echo "<td>".$data['tgllahir']."</td>";    
                                        echo "<td>".$data['jkel']."</td>";    
                                        echo "<td>".$data['email']."</td>";
                                        echo "<td>".$data['nik']."</td>";  
                                        echo "<td>".$data['nohp']."</td>";  
                                        echo "<td>".$data['alamat']."</td>";      
                                        echo "<td>".$data['agama']."</td>";    
                                        echo "</tr>"; 
                                 $no++;
                                 } 
                                } ?>  
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>



                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red ">
                        <a style="text-decoration: none;"  href="#popup2">
                            <div class="icon">
                                <img src="icon/frontend.png" class="icon-pekerjaan">
                            </div>
                            <div class="content">
                                <div class="text">Frontend Developer</div>
                                <div class="number"><?php echo $frontend; ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div id="popup2">
                    <div class="window2">
                        <a href="#" class="close-button2" title="Close">X</a>
                        <h3>Daftar Peserta Frontend Developer</h3>
                        <hr>
                    
                    <div class="peserta">
                        <table class="dataTables" class="display" cellspacing="0" width="95%">
                            <thead>
                                 <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               <?php  
                                    include "koneksi.php";    
                                    $no = 1;
                                    $query = "SELECT * FROM peserta_rekrutment where id_lowongan = 2";
                                    $sql = mysqli_query($koneksi, $query); 
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                    while($data = mysqli_fetch_array($sql)){ 
                                        echo "<tr>";      
                                        echo "<td><img src='images/".$data['gambar']."' width='70' height='90'></td>";  
                                        echo "<td>".$data['nama']."</td>";    
                                        echo "<td>".$data['tgllahir']."</td>";    
                                        echo "<td>".$data['jkel']."</td>";    
                                        echo "<td>".$data['email']."</td>";
                                        echo "<td>".$data['nik']."</td>";  
                                        echo "<td>".$data['nohp']."</td>";  
                                        echo "<td>".$data['alamat']."</td>";      
                                        echo "<td>".$data['agama']."</td>";    
                                        echo "</tr>"; 
                                 $no++;
                                 } 
                                } ?>  
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red ">
                        <a style="text-decoration: none;"  href="#popup3">
                            <div class="icon">
                                <img src="icon/android.png" class="icon-pekerjaan">
                            </div>
                            <div class="content">
                                <div class="text">Android Developer</div>
                                <div class="number"><?php echo $android; ?></div>
                            </div>
                        </a>
                    </div>
                </div>


                <div id="popup3">
                    <div class="window3">
                        <a href="#" class="close-button3" title="Close">X</a>
                        <h3>Daftar Peserta Android Developer</h3>
                        <hr>
                    <div class="peserta">
                        <table class="dataTables" class="display" cellspacing="0" width="95%">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                               <?php  
                                    include "koneksi.php";    
                                    $no = 1;
                                    $query = "SELECT * FROM peserta_rekrutment where id_lowongan = 3";
                                    $sql = mysqli_query($koneksi, $query); 
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                    while($data = mysqli_fetch_array($sql)){ 
                                        echo "<tr>";      
                                        echo "<td><img src='images/".$data['gambar']."' width='70' height='90'></td>";  
                                        echo "<td>".$data['nama']."</td>";    
                                        echo "<td>".$data['tgllahir']."</td>";    
                                        echo "<td>".$data['jkel']."</td>";    
                                        echo "<td>".$data['email']."</td>";
                                        echo "<td>".$data['nik']."</td>";  
                                        echo "<td>".$data['nohp']."</td>";  
                                        echo "<td>".$data['alamat']."</td>";      
                                        echo "<td>".$data['agama']."</td>";    
                                        echo "</tr>"; 
                                 $no++;
                                 } 
                                } ?>  
                                
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red ">
                        <a style="text-decoration: none;"  href="#popup4">
                            <div class="icon">
                                <img src="icon/ios.png" class="icon-pekerjaan">
                            </div>
                            <div class="content">
                                <div class="text">iOS Developer</div>
                                <div class="number"><?php echo $ios; ?></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    
            <div id="popup4">
                    <div class="window4">
                        <a href="#" class="close-button4" title="Close">X</a>
                        <h3>Daftar Peserta iOS Developer</h3>
                        <hr>
                    
                    <div class="peserta">
                        <table class="dataTables" class="display" cellspacing="0" width="95%">
                            <thead>
                                 <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php  
                                    include "koneksi.php";    
                                    $no = 1;
                                    $query = "SELECT * FROM peserta_rekrutment where id_lowongan = 4";
                                    $sql = mysqli_query($koneksi, $query); 
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                    while($data = mysqli_fetch_array($sql)){ 
                                        echo "<tr>";      
                                        echo "<td><img src='images/".$data['gambar']."' width='70' height='90'></td>";  
                                        echo "<td>".$data['nama']."</td>";    
                                        echo "<td>".$data['tgllahir']."</td>";    
                                        echo "<td>".$data['jkel']."</td>";    
                                        echo "<td>".$data['email']."</td>";
                                        echo "<td>".$data['nik']."</td>";  
                                        echo "<td>".$data['nohp']."</td>";  
                                        echo "<td>".$data['alamat']."</td>";      
                                        echo "<td>".$data['agama']."</td>";    
                                        echo "</tr>"; 
                                 $no++;
                                 } 
                                } ?>  
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>


            <div class="row clearfix"></div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Daftar Peserta Keseluruhan</h2>
                        </div>
                        <div class="body">
                        
                <table class="dataTables" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>NIK</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                        </tr>
                    </thead>
        
                    <tbody>
                            <?php  
                                    include "koneksi.php";    
                                    $no = 1;
                                    $query = "SELECT * FROM peserta_rekrutment";
                                    $sql = mysqli_query($koneksi, $query); 
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                    while($data = mysqli_fetch_array($sql)){ 
                                        echo "<tr>";
                                        echo "<td>".$data['id']."</td>";      
                                        echo "<td><img src='images/".$data['gambar']."' width='50' height='65'></td>";  
                                        echo "<td>".$data['nama']."</td>";    
                                        echo "<td>".$data['tgllahir']."</td>";    
                                        echo "<td>".$data['jkel']."</td>";    
                                        echo "<td>".$data['email']."</td>";
                                        echo "<td>".$data['nik']."</td>";  
                                        echo "<td>".$data['nohp']."</td>";  
                                        echo "<td>".$data['alamat']."</td>";      
                                        echo "<td>".$data['agama']."</td>";    
                                        echo "</tr>"; 
                                 $no++;
                                 } 
                                } ?>  
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
    </section>

    
</body>

</html>
