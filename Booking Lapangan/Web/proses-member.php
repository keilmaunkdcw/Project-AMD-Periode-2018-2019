<?php

include("auth.php");
include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

      // menyiapkan query
	$sql = "INSERT INTO admin (email, username, password) 
    VALUES (:email, :username, :password)";
    $stmt = $db->prepare($sql);

    // eksekusi query untuk menyimpan ke database
    

    $params = array(
    	":email" => $email,
        ":username" => $username,
        ":password" => $password,

    );

    $saved = $stmt->execute($params);
    // jika query simpan berhasil, maka lapangan sudah ditambah
     if( $saved ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "<script type='text/javascript'>
            window.alert('Berhasil Input data'); 
            window.location =('member.php')</script>";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "<script type='text/javascript'>
            window.alert('Gagal Input Data'); 
            window.location =('tambah-lapangan.php')</script>";
    }
}
?>