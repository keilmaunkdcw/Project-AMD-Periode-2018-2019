<?php
include "koneksi-lowongan.php";
$no = 1;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Rekrutmen - PT. Rannu Digital Solution </title>
	<link rel="stylesheet" type="text/css" href="css/index.css" >
	<link rel="stylesheet" type="text/css" href="css/menu.css" >
	<link rel="stylesheet" type="text/css" href="css/header.css" >
	<link rel="stylesheet" type="text/css" href="css/tombol-login.css" >
	<link rel="stylesheet" type="text/css" href="css/footer.css" >
	<link rel="stylesheet" type="text/css" href="css/body.css" >
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/lowongan.css" >
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">	
</head>
<body>
<div class="wrapper" >
		<div id="header">
			
			<div class="tulisan">
				<div class="logoperusahaan">
					<div class="logoperusahaan">
					<img class="logoperusahaan" src="icon/logo.png">
				</div>
			</div>
				<div class="tulisan1">Selamat Datang di Rekrutmen</div>	
				<div class="tulisan2">PT. Rannu Digital Solution</div>	
				<div class="tulisan3">- Solve Your IT Problem -</div>	
			</div>

<div class="logo">
		<div class="call">
			<div class="email">
				<div class="logoemail">
					<img class="logoemail" onclick="#" src="icon/logo-email.png">
				</div>
				<div class="tulisanemail">Email Kami :<br>rannuds@gmail.com</div>
			</div>


			<div class="bordertengah" style="width: 0px; height: 45px; border: 1px #F5F5F5 solid;"></div>

			<div class="contact">
				<div class="logophone">
					<img class="logophone" onclick="#" src="icon/logo-phone.png">
				</div>
				<div class="tulisancontact">Call Center<br>1500220</div>
			</div>
		</div>
		</div>
	</div>
	

		<div class="navbar">
			<div class="backgroundmenu">
				<div class="daftarmenu">
					<li><i class="material-icons">home</i><a href="index.php">Beranda</a></li>
					<li><i class="material-icons">info</i><a href="tentangkami.php">Tentang Kami</a></li>
					<li><i class="material-icons">info</i><a href="tatacararekrutmen.php">Tata Cara Rekrutmen</a></li>
					<li class="daftarmenu2"><i class="material-icons">work</i><a href="lowongan.php">Lihat Lowongan</a></li>
				</div>

		
				<div class="daftarlogin">
					<li><a href="daftar.php">Daftar</a></li>
					<li><a href="login.php">Login</a></li>
				</div>
			
			</div>
		</div>
	</div>


	<div class="body">
		<h2 class="word14">Lowongan</h2>
		<h3 class="word15">Calon peserta hanya boleh memilih satu posisi saja</h3>
		<hr>

							<table class="table-lowongan" cellspacing="0">

                                <?php
                                    $query      = "select * from lowongan";
                                    $execute    = mysqli_query($koneksi, $query);

                                    while($data = mysqli_fetch_assoc($execute)) {
                                ?>

                                <tr>
                                    <th class="judul-lowongan" colspan="3"> <?php echo $data['nama_lowongan'];?> </th>
                                </tr>
                                <tr> 
                                    <td class="deskripsi" colspan="3"> <?php echo $data['deskripsi1'];?> <br> <?php echo $data['deskripsi2'];?> <br> <?php echo $data['deskripsi3'];?></td>
                                </tr>
                                <tr>
                                	<td>
                                		<h4> Silahkan Login untuk melamar Pekerjaan ! </h4>
                                	</td>
                                </tr>

                                <?php } ?>
                            </table>

	</div>


	<footer class="footer">
		<div class="box1">Social Media<br>Follow Us :
			<div class="icon">
				<a href="https://id-id.facebook.com" target="_blank">
					<img class="icon-sosmed1"  src="icon/fb.png"></a>
					<div class="akun-sosmed">PT. Rannu Digital Solution</div>

				<a href="https://www.instagram.com/?hl=id" target="_blank">
					<img class="icon-sosmed2" src="icon/instagram.png"></a>
					<div class="akun-sosmed">PT. Rannu Digital Solution</div>

				<a href="https://twitter.com/login?lang=id" target="_blank">
					<img class="icon-sosmed3" src="icon/twitter.png"></a>
					<div class="akun-sosmed">@Rannu_Digital_Solution</div>

				<a href="https://web.telegram.org/#/login" target="_blank">
					<img class="icon-sosmed4" src="icon/telegram.png"></a>
					<div class="akun-sosmed">PT. Rannu DS Group</div>
			</div>
		</div>
		<div class="box2">Official Partner <br> By:
			<div class="partner">
				<a href="https://www.tokopedia.com" target="_blank"><img class="icon-partner" src="icon/tokopedia.jpg"></a>
				<a href="https://www.gojek.com" target="_blank"><img class="icon-partner" src="icon/gojek.jpg"></a>
				<a href="https://www.telkomsel.com" target="_blank"><img class="icon-partner" src="icon/telkomsel.jpg"></a>
				<a href="https://www.garuda-indonesia.com" target="_blank"><img class="icon-partner" src="icon/garuda.jpg"></a>
				<a href="https://www.pubg.com" target="_blank"><img class="icon-partner" src="icon/pubg.jpg"></a>
			</div>
		</div>
		<div class="box3">Head Office<br><p>Jl. Biring Romang Lorong 2, Kota Makassar, Sulawesi Selatan</p>
			<div class="alamat">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.8830267819303!2d119.50427541431736!3d-5.120634196283785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefca195b24deb%3A0xda659c8adb601fec!2sLorong+2+Jl.+Biring+Romang%2C+Kapasa%2C+Kec.+Tamalanrea%2C+Kota+Makassar%2C+Sulawesi+Selatan!5e0!3m2!1sid!2sid!4v1561292068154!5m2!1sid!2sid" width="460" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		
	</footer>
		
		
		
</body>
</html>