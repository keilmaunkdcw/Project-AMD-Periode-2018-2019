<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['level']) &&$_SESSION['level']=='1') {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Admin</title>

    

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fontawesome-free-5.9.0-web/css/all.min.css" rel="stylesheet">
    <link href="../fontawesome-free-5.9.0-web/css/fontawesome.min.css" rel="stylesheet">
    <link href="../fontawesome-free-5.9.0-web/css/regular.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashbor.css" rel="stylesheet">
    <!-- <link href="../css/sign.css" rel="stylesheet"> -->
  </head>

  <body>
    <!-- Navbar -->
    <?php 
    	include"themes/navigasi.php";

     ?>
    <!-- end navbar -->

    <div class="container-fluid">
      <div class="row">
        <!-- sidebar secion -->
        	<?php
        	include "./themes/sidebar.php";
        	?>
    	<!-- end sidebar section -->

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <!-- start content -->
          	<?php
        	$page = (isset($_GET['page']) ? $_GET['page']:'');
        	if ($page == 'kontak-kami') {
        		include "kontak.php";
        	}
        	elseif ($page=='user') {
        		include 'user.php';
        	}
        	elseif ($page == 'edit-user') {
        		include "edit_user.php";
        	}
            elseif ($page == 'edit-kamar') {
                include "edit-kamar.php";
            }
        	elseif ($page == 'hapus-user') {
        		include "hapus-user.php";
        	}
            elseif ($page == 'hapus-kamar') {
                include "hapus-kamar.php";
            }
        	elseif ($page == 'kamar') {
        		include "./admin-kamar.php";
        	}
            elseif ($page == 'tambah-user') {
                include "./tambah-user.php";
            }
            elseif ($page == 'tambah-kamar') {
                include "./regiskamar.php";
            }
            elseif ($page == 'booking') {
                 include "./adminbooking.php";
             }
              elseif ($page == 'konfirmasi_pembayaran') {
                include "./halaman_konfirmasi_pembayaran.php";
            } 
            elseif ($page == 'tambah-kontak') {
                "./tambah_kontak.php";
            }
        	else{
				include "dashboard.php";
        	}

          	?>
          <!-- end content -->
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    
  </body>
</html>



<?php	
}
else{
	echo '<script> alert ("anda tidak di perbolehkan log in");
			window.location = "./login.php";</script>';
}
  

 ?>