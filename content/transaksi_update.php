<?php
include "library/config.php";

//menampung nilai variable $_POST
$tanggal = $_POST['tanggal'];
$id_nasabah = $_POST['id_nasabah'];
$nominal= $_POST['nominal'];
$kode_tr=$_POST['kode_tr'];

//analogi kode_tr yang dimana kode 1 adalah setor dan kode 2 adalah tarik
if ($kode_tr=="1"){
    $q="UPDATE transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
setor='$nominal'";
} elseif ($kode_tr=="2"){
    $q="UPDATE transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
tarik='$nominal'";
}

if ($query){
// mod : menambah alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil diperbarui');
    window.location.href='?hal=transaksi_tampil';
    </script>";
} else {
// mod : menambah alert jika query gagal
    echo "<script>
    window.alert('Data gagal diperbarui');
    window.location.href='?hal=transaksi_tampil';
    </script>";
}
?>