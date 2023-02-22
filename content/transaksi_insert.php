<?php
var_dump($_POST);
include "library/config.php";
//menampung nilai variable $_POST
$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$id_jenjang = $_POST['id_jenjang'];
$setor = $_POST['setor'];
$tarik = $_POST['tarik'];

//memasukkan data ke dalam database
$q="INSERT INTO transaksi SET
tanggal='$tanggal',
nama='$nama',
jk='$jk',
id_jenjang= $id_jenjang ,
setor= $setor ,
tarik= $tarik ";

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