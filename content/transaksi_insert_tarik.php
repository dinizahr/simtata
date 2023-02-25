<?php
// var_dump($_POST);
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
$kode_tr=2;

// kode lama
// if ($kode_tr=="1"){
//     $q="INSERT INTO transaksi SET
// tanggal='$tanggal',
// id_nasabah='$id_nasabah',
// kode_tr='$kode_tr',
// setor='$nominal'";
// } elseif ($kode_tr=="2"){
//     $q="INSERT INTO transaksi SET
// tanggal='$tanggal',
// id_nasabah='$id_nasabah',
// kode_tr='$kode_tr',
// tarik='$nominal'";
// }
$cek_saldo="SElECT saldo from data_nasabah where id_nasabah='$id_nasabah'";
$query_cek_saldo=mysqli_fetch_row(mysqli_query($koneksi,$cek_saldo));
$saldo_awal= $query_cek_saldo[0];



$query_transaksi="INSERT INTO transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
nominal='$nominal'";
$query1=mysqli_query($koneksi,$query_transaksi);



$query_saldo="UPDATE data_nasabah SET saldo=$saldo_awal - $nominal WHERE id_nasabah=$id_nasabah";
$query2=mysqli_query($koneksi,$query_saldo);

//aksi jika query sukses maupun gagal
if ($query1 && $query2){
    //mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Alhamdulillah, transaksi penarikan berhasil');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else {
//mod : menambah action alert jika query berhasil
    echo "<script>
window.alert('Maaf, transaksi penarikan gagal');
    window.location.href='?hal=nasabah_tampil';
    </script>";
}

?>