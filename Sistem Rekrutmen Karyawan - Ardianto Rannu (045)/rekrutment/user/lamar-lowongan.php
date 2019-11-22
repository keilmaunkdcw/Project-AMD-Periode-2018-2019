<?php 
include "koneksi-user.php";
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
header ("location: ../login.php");

}

?> 

<?php

include 'koneksi.php';

$_SESSION['lamar'] = $_GET['lamar'];

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


    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/slide.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <link href="css/form-pendaftaran.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
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
                <h2 class="word2">Formulir Pendaftaran Rekrutmen <br>PT. Rannu Digital Solution</h2>
                <h2 style="color: blue; text-align: center; font-size: 14px; margin-top: 10px;">Mohon untuk mengisi formulir dibawah ini dengan data yang valid !</h2>
            </div> 
            <div class="body">


    <!--  File PHP harus berada diatas sebelum form html dan berada didalam section form  -->

<?php     
    if($_POST){

    include "koneksi-user.php";
    include "koneksi.php";

    // Ambil Data yang Dikirim dari Form
    $_SESSION['nama'] = $_POST['nama']; /*   Mendefinisikan nilai variabel $_POST['nama'] ke $_SESSION['nama']   */
    $nama     = $_SESSION['nama'];   /*   Mendefinisikan nilai variabel $_SESSION['nama'] ke $nama   */

    $_SESSION['tgllahir'] = $_POST['tgllahir'];
    $tgllahir = $_SESSION['tgllahir'];

    $jkel = isset($_POST['jkel']) ? $_POST['jkel'] : ''; /*  digunakan opertor ternary untuk mengatasi notice undefined index */

    $_SESSION['email'] = $_POST['email'];
    $email    = $_SESSION['email'];

    $_SESSION['nik'] = $_POST['nik'];
    $nik      = $_SESSION['nik'];

    $_SESSION['nohp'] = $_POST['nohp'];
    $nohp     = $_SESSION['nohp'];

    $_SESSION['alamat'] = $_POST['alamat'];
    $alamat   = $_SESSION['alamat'];

    $_SESSION['agama'] = $_POST['agama'];
    $agama    = $_SESSION['agama'];

    $id_lowongan   = $_POST['id_lowongan'];
    $id_username   = $_POST['id_username'];
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $path = "images/".$nama_file;


        $cekdataemail="select * from peserta_rekrutment where email='$email'";
        $dataemail=mysql_query($cekdataemail) or die(mysql_error());
        if(mysql_num_rows($dataemail)>0)
            { 
              echo "<script>alert('Email Sudah Terdaftar !');history.go(-1) </script>";
            } else {

        $cekdatanik="select * from peserta_rekrutment where nik='$nik'";
        $datanik=mysql_query($cekdatanik) or die(mysql_error());
        if(mysql_num_rows($datanik)>0)
            { 
              echo "<script>alert('NIK Sudah Terdaftar !');history.go(-1) </script>";
            } else {

        $cekdatanohp="select * from peserta_rekrutment where nohp='$nohp'";
        $datanohp=mysql_query($cekdatanohp) or die(mysql_error());
        if(mysql_num_rows($datanohp)>0)
            { 
              echo "<script>alert('No. Handphone Sudah Terdaftar !');history.go(-1) </script>";
            } else {


            $cekdatausername="select * from peserta_rekrutment where id_username='$id_username'";
            $datausername=mysql_query($cekdatausername) or die(mysql_error());
            if(mysql_num_rows($datausername)>0)
            { 
              echo "<script>alert('1 Username Hanya Bisa sekali mendaftar !');history.go(-1) </script>";
            }

             else { 

                $error = array();
                if (empty($_SESSION['nama'])){
                $error['nama'] = '*Nama Belum Diisi !';
                }else

                if (empty($_SESSION['tgllahir'])){
                $error['tgllahir'] = '*Tanggal Lahir Belum Diisi !';
                }else

                if (empty($jkel)){
                $error['jkel'] = '*Jenis Kelamin belum dipilih !';
                }else

                if (empty($_SESSION['email'])){
                $error['email'] = '*Email Belum Diisi !';
                }else

                if (filter_var($email, FILTER_VALIDATE_EMAIL)==""){   /* validasi Email menggunakan function bawaan PHP */
                echo "<p style='color: red; text-align: center;'>";
                echo "*Format Email salah !";
                echo "</p>"; 
                }else

                if (empty($_SESSION['nik'])){
                $error['nik'] = '*NIK Belum Diisi !';
                }else

                if (strlen($nik)>16){
                echo "<p style='color: red; text-align: center;'>";
                echo "Jumlah digit NIK Maksimal 16 digit !";
                echo "</p>"; 
                }else

                if (empty($_SESSION['nohp'])){
                $error['nohp'] = 'No.Handphone Belum Diisi !';
                }else

                if (strlen($nohp)<11 || strlen($nohp)>12){
                echo "<p style='color: red; text-align: center;'>";
                echo "Jumlah digit No.Handphone harus diantara 11 - 12 digit !";
                echo "</p>"; 
                }else

                if (empty($_SESSION['alamat'])){
                $error['alamat'] = '*Alamat Belum Diisi !';
                }else

                if ($agama == 'empty'){
                $error['agama'] = '*Agama Belum Dipilih !';
                }else

                if (empty($tmp_file)){
                echo "<p style='color: red; text-align: center;'>";
                echo "Foto Belum Diupload !";
                echo "</p>"; 
                }

                else{

                    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
                    if($ukuran_file <= 1000000){ 
                        if(move_uploaded_file($tmp_file, $path)){

                    // Cek apakah gambar berhasil diupload atau tidak  // Proses simpan ke Database  

                        $query = "INSERT INTO peserta_rekrutment (nama,tgllahir,jkel,email,nik,nohp,alamat,agama,id_lowongan,id_username,gambar,ukuran,tipe) values ('$nama','$tgllahir','$jkel','$email','$nik','$nohp','$alamat','$agama','$id_lowongan','$id_username','$nama_file','$ukuran_file','$tipe_file') ";

                        $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query  

                        if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
                                    echo "<script>alert('Selamat, Anda Berhasil Mendaftar Lowongan !')</script>";
                                    echo "<meta http-equiv='refresh' content='1 url= lowongan.php'>"; // Redirect ke halaman index.php  
                                }else{    // Jika Gagal, Lakukan :  
                                    echo "<p style='color: red; text-align: center;'>";
                                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database."; 
                                    echo "</p>"; }
                                }else{  // Jika gambar gagal diupload, Lakukan :  
                                    echo "<p style='color: red; text-align: center;'>";
                                    echo "Maaf, Gambar gagal untuk diupload."; 
                                    echo "</p>"; }
                                }else{
                                        // Jika ukuran file lebih dari 1MB, lakukan :
                                    echo "<p style='color: red; text-align: center;'>";
                                    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
                                    echo "</p>"; }
                                }else{
                                        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
                                    echo "<p style='color: red; text-align: center;'>";
                                    echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
                                    echo "</p>"; }
                            }
                        }
                    } 
                }
            }
        }
    ?>

    <!--  File PHP harus berada diatas sebelum form html dan berada didalam section form  -->


    <form method="post" action="" enctype="multipart/form-data">  
        <div class="form-rekrutmen">

            <div class="formulir">     

                <label>Nama Lengkap</label>
                <input type="text" id="nama" name="nama" autofocus value="<?php echo isset($_SESSION['nama'])?$_SESSION['nama']:'';?>" class="input">
                <div style="color:red; font-size: 12px;"><?php echo isset($error['nama']) ? $error['nama'] : '';?></div>

                <label>Tanggal Lahir</label>
                <input type="date" id="tgllahir" name="tgllahir" value="<?php echo isset($_SESSION['tgllahir'])?$_SESSION['tgllahir']:'';?>" class="input">
                <div style="color:red; font-size: 12px;"  ><?php echo isset($error['tgllahir']) ? $error['tgllahir'] : '';?></div>
                                
                <label>Jenis Kelamin</label>
                <div class="input-radio">
                    <input type="radio" name="jkel" value="Laki-Laki"><p class="jkl">Laki-Laki</p>
                    <input type="radio" name="jkel" value="Perempuan"><p class="jkl">Perempuan</p>
                </div>
                <div style="color:red; font-size: 12px;"  ><?php echo isset($error['jkel']) ? $error['jkel'] : '';?></div>
                
                <label>Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($_SESSION['email'])?$_SESSION['email']:'';?>" class="input">
                <div style="color:red; font-size: 12px;"><?php echo isset($error['email']) ? $error['email'] : '';?></div>

                <label>NIK</label>
                <input type="text" id="nik" name="nik" value="<?php echo isset($_SESSION['nik'])?$_SESSION['nik']:'';?>" class="input"      onkeypress="return hanyaAngka(event)">
                <div style="color:red; font-size: 12px;"><?php echo isset($error['nik']) ? $error['nik'] : '';?></div>
            </div>


            <div class="formulir">     

                <label>No. Handphone</label>
                <input type="text" id="nohp" name="nohp" value="<?php echo isset($_SESSION['nohp'])?$_SESSION['nohp']:'';?>" class="input"   onkeypress="return hanyaAngka(event)">
                <div style="color:red; font-size: 12px;"><?php echo isset($error['nohp']) ? $error['nohp'] : '';?></div>
                                
                <label>Alamat</label>
                <textarea rows="6" cols="50" id="alamat" name="alamat" class="input"><?php echo isset($_SESSION['alamat'])?$_SESSION['alamat']:'';?></textarea> 
                <div style="color:red; font-size: 12px;"><?php echo isset($error['alamat']) ? $error['alamat'] : '';?></div>
                                
                <label>Agama</label>
                <select name="agama" class="input">
                    <option hidden value="empty">Pilih Agama</option>

                    <option name="agama" value="Islam" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Islam')?'selected':''; ?> >Islam</option>

                    <option name="agama" value="Kristen Protestan" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Kristen Protestan')?'selected':''; ?> >Kristen Protestan</option>

                    <option name="agama" value="Khatolik" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Khatolik')?'selected':''; ?> >Khatolik</option>

                    <option name="agama" value="Buddha" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Buddha')?'selected':''; ?>  >Buddha</option>

                    <option name="agama" value="Hindu" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Hindu')?'selected':''; ?> >Hindu</option>

                    <option name="agama" value="Konghucu" <?php echo(isset($_SESSION['agama']) && $_SESSION['agama']=='Konghucu')?'selected':''; ?> >Konghucu</option>
                </select>
                <div style="color:red; font-size: 12px;"><?php echo isset($error['agama']) ? $error['agama'] : '';?></div>

                <label></label>
                <input type="text" name="id_lowongan" value="<?php echo $_SESSION['lamar']?>" hidden>

                <label></label>
                <input type="text" name="id_username" value="<?php echo $_SESSION['user'];?>" hidden>
            </div>

            <div class="formulir">     
                <label>Upload Foto Anda (Max 1MB)</label>
                <input type="file" name="gambar">
            </div>
                                   
            <div>
                <input type="submit" value="Simpan" class="submit">  
            </div>
        </div>
    </form>
                        
    </div>
    </div>
    </div>
    </div>
    </div>
</section>      




</body>

</html>
