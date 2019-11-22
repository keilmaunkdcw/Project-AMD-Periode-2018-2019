<?php
    include 'config.php';

    if(isset($_GET["id"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `tlapangan` WHERE id=:id");
        $query->bindParam(":id", $_GET["id"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        echo "<script type='text/javascript'>
            window.alert('Data Berhasil Dihapus'); 
            window.location =('lapangan.php')</script>";
    }
?>