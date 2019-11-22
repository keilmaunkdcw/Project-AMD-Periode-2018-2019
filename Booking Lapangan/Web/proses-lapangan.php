<?php

include("auth.php");
include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $lapangan = $_POST['lapangan'];
    $harga = $_POST['harga'];

      // menyiapkan query
    $sql = "INSERT INTO tlapangan (lapangan, harga) 
            VALUES (:lapangan, :harga)";
    $stmt = $db->prepare($sql);

    // eksekusi query untuk menyimpan ke database
    

    $params = array(
    ":lapangan" => $lapangan,
    ":harga" => $harga,

    );

    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka lapangan sudah ditambah
     if( $saved ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script type='text/javascript'>
            window.alert('Berhasil Input data'); 
            window.location =('lapangan.php')</script>";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "<script type='text/javascript'>
            window.alert('Gagal Input Data'); 
            window.location =('tambah-lapangan.php')</script>";
    }
}
?>