<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Hotel E&Y</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php?page=beranda">Beranda</a>
        <a class="p-2 text-dark" href="index.php?page=fasilitas">Fasilitas</a>
        <a class="p-2 text-dark" href="index.php?page=kamar2">Kamar</a>
        <a class="p-2 text-dark" href="index.php?page=hubungi-kami">Kontak</a>
        <a class="p-2 text-dark" href="index.php?page=form-booking">Booking</a>        
      </nav>
      <?php
      if (isset($_SESSION['email_member']) && isset($_SESSION['level_member'])) {
      ?>
<div class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['nama']?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?page=history-booking">History Booking</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./logout.php">Logout</a>
            </div>
          </li>
        </ul>  
        </div>
      <?php
      }else{
?>
<a class="btn btn-outline-primary" href="index.php?page=registrasi">Daftar</a>
      <a class="btn btn-outline-primary" href="index.php?page=login">Login</a>
<?php
      }
      ?>
    </div>