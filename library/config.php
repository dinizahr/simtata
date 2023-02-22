<?php
//konfigurasi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "app_tabungan";

//mencoba koneksi ke database
$koneksi = mysqli_connect($host,$user,$pass,$db);

if (mysqli_connect_errno()) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
}
//    echo " Koneksi Berhasil Gaiss.. &#127881";
?>
