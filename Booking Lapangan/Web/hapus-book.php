<?php
    include 'config.php';

    if(isset($_GET["id"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `booking` WHERE idbooking=:id");
        $query->bindParam(":id", $_GET["id"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        echo "<script type='text/javascript'>
            window.alert('Data Berhasil Dihapus'); 
            window.location =('booking.php')</script>";
    }
?>