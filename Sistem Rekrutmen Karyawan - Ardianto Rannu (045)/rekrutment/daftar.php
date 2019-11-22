
<!DOCTYPE html>
<html>
<head>
	<title>Rekrutmen - PT. Rannu Digital Solution </title>
	<link rel="stylesheet" type="text/css" href="css/index.css" >
	<link rel="stylesheet" type="text/css" href="css/menu.css" >
	<link rel="stylesheet" type="text/css" href="css/header.css" >
	<link rel="stylesheet" type="text/css" href="css/footer.css" >
	<link rel="stylesheet" type="text/css" href="css/body.css" >
	<link rel="stylesheet" type="text/css" href="css/daftarakun.css" >
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

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

	<div class="navbar">
			<div class="backgroundmenu">
				<div class="daftarmenu">
					<li><i class="material-icons">home</i><a href="index.php">Beranda</a></li>
					<li><i class="material-icons">info</i><a href="tentangkami.php">Tentang Kami</a></li>
					<li><i class="material-icons">info</i><a href="tatacararekrutmen.php">Tata Cara Rekrutmen</a></li>
					<li><i class="material-icons">work</i><a href="lowongan.php">Lihat Lowongan</a></li>
				</div>
			</div>
		</div>

	<div class="body">

	<div class="tulisanlogin"><p class="tulisanlogin2">Silahkan isi form pendaftaran akun !</p></div>

	<?php
		include "koneksi.php";

		if($_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$error = array();

			if(empty($username)){
				$error['username'] = 'Username belum diisi !';
			}else 
			if (empty($password)){
				$error['password'] = 'Password belum diisi !';
			}else{
				$daftar = mysql_query("INSERT INTO user (username,password) values ('$username','$password')");
				if ($daftar){
					$error['berhasil'] = 'Selamat, Anda Berhasil Mendaftar Akun !';
				}else{
					$error['gagal'] = 'Gagal Mendaftar !';
					}
			}
		}
	?>

	<form method="post" action="">
		<table class="daftar" border=0 align="center" cellpadding=5 cellspacing=0>
			<tr>
				<td colspan=3><center><font size=5>Pendaftaran Akun</font></center></td>
			</tr>
			<tr>
			<td colspan=3 style="color: blue; font-size: 12px; padding-left: 92px;"><?php echo isset($error['berhasil']) ? $error['berhasil'] : '';?></font></td>
			</tr>
			<tr>
			<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['gagal']) ? $error['gagal'] : '';?></font></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="inputdaftar" type="text" name="username" autofocus onkeypress="return tolakSpasi(event)"></td>
			</tr>
			<tr>
			<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['username']) ? $error['username'] : '';?></font></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="inputdaftar" type="password" id="pw1" name="password" onkeypress="return tolakSpasi(event)"></td>
			</tr>
			<tr>
			<td colspan=3 style="color: red; font-size: 13px; padding-left: 92px;"><?php echo isset($error['password']) ? $error['password'] : '';?></font></td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>:</td>
				<td><input class="inputdaftar" type="password" id="pw2" onkeypress="return tolakSpasi(event)"></td>
			</tr>
			<tr>
				<td colspan=2></td>
				<td><input class="tomboldaftar" type="submit" name="submit" value="Daftar"></td>
			</tr>
			<tr>
				<td class="notice" colspan=3>Jika sudah memiliki akun silahkan login <a href="login.php">disini</a></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
    </script>

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