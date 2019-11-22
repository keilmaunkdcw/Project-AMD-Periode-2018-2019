<!DOCTYPE html>
<html>
<head>
	<title>Rekrutmen - PT. Rannu Digital Solution </title>
	<link rel="stylesheet" type="text/css" href="css/index.css" >
	<link rel="stylesheet" type="text/css" href="css/header.css" >
	<link rel="stylesheet" type="text/css" href="css/footer.css" >
	<link rel="stylesheet" type="text/css" href="css/body.css" >
	<link rel="stylesheet" type="text/css" href="css/login.css" >
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 

	<script>
		function tolakSpasi(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode == 32 )
 
		    return false;
		  return true;
		}
	</script>

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
</div>

	<div class="body">

	<div class="tulisanlogin"><p class="tulisanlogin2">Untuk masuk ke menu Admin, Silahkan Login Terlebih Dahulu !</p></div>

	<?php
		include "koneksi.php";

			if($_POST){
				$nama_admin = $_POST['nama_admin'];
				$password = $_POST['password'];
				$error=array();

				if (empty($nama_admin)){
				$error['nama_admin'] = 'Nama Admin Belum Diisi !';
				}else 
				if (empty($password)){
				$error['password'] = 'Password Belum Diisi !';
				}else{

				session_start();

				$login_admin = mysql_query("select * from admin where nama_admin='$nama_admin' and password='$password'");
				
				if (mysql_num_rows($login_admin) > 0){
				$_SESSION['nama_admin'] = $nama_admin;
				$_SESSION['password'] = $password;
				header("location: dashboard/index.php");
				}else{
				$error['namaandpass'] = 'Nama atau Password Salah !';
				}
				}
			}
	?>

	<form method="post" action="">
		<table class="login" border=0 align="center" cellpadding=5 cellspacing=0>
			<tr>
				<td colspan=3><center><font size=5>LOGIN</font></center></td>
			</tr>
			<tr>
				<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['namaandpass']) ? $error['namaandpass'] : '';?></font></td>
			</tr>
			<tr>
			<td style="padding-top: 7px;">Nama Admin</td>
			<td>: </td>
			<td><input class="inputlogin" type="text" name="nama_admin" autofocus onkeypress="return tolakSpasi(event)"></td>
			</tr>
			<tr>
			<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['nama_admin']) ? $error['nama_admin'] : '';?></font></td>
			</tr>
			<tr>
			<td>Password</td>
			<td> : </td>
			<td><input class="inputlogin" type="password" name="password"></td>
			</tr>
			<tr>
			<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['password']) ? $error['password'] : '';?></font></td>
			</tr>

			<tr>
			<td colspan=2></td>
			<td><input class="tombollogin" type="submit" name="submit" value="Login"></td>
			</tr>
			</table>
			</form>

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