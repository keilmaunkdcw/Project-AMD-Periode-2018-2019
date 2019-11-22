<!-- Navigation -->
<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <!-- <a class="navbar-brand" href="#"><img src="#"></a> -->
  <div class="container">
    <a class="nav-linknew" href="index.php">Beranda</a>
    <a class="nav-linknew" href="keranjang.php">Keranjang</a>
    <a class="nav-linknew" href="checkout.php">Checkout</a>
    <a class="nav-linknew" href="cekpembayaran.php">Cek Pembayaran</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <form action="pencarian.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Disini" aria-label="Search">
          <button class="btn  btn-outline-light my-2 my-sm-0">Cari</button>
        </form>
      </li>
      <?php if (isset($_SESSION['pelanggan'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" >Logout</a>
        </li>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="daftar.php" >Daftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" >Login</a>
      </li>
    <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
