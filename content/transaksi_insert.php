<?php
var_dump($_POST);
include "library/config.php";
//menampung nilai variable $_POST

//$nama = $_POST['nama'];
//$jk = $_POST['jk'];
//$id_jenjang = $_POST['id_jenjang'];
//$setor = $_POST['setor'];
//$tarik = $_POST['tarik'];

$tanggal = $_POST['tanggal'];
$id_nasabah = $_POST['id_nasabah'];
$nominal= $_POST['nominal'];
$kode_tr=$_POST['kode_tr'];

if ($kode_tr=="1"){
    $q="INSERT INTO transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
setor='$nominal'";
} elseif ($kode_tr=="2"){
    $q="INSERT INTO transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
tarik='$nominal'";
}

$query=mysqli_query($koneksi,$q);

//aksi jika query sukses maupun gagal
if ($query){
    //mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil ditambah');
    window.location.href='?hal=transaksi_tampil';
    </script>";
} else {
//mod : menambah action alert jika query berhasil
    echo "<script>
window.alert('Data gagal ditambah');
    window.location.href='?hal=transaksi_tampil';
    </script>";
}
?>