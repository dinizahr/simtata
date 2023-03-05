<?php
// var_dump($_POST);
include "library/config.php";

//menampung nilai variable $_POST
$tanggal = $_POST['tanggal'];
$id_nasabah = $_POST['id_nasabah'];
$nominal= $_POST['nominal'];
$kode_tr=1;

//menampikan data_nasabah yang ber id.....
$cek_saldo="SElECT saldo from data_nasabah where id_nasabah='$id_nasabah'";
$query_cek_saldo=mysqli_fetch_row(mysqli_query($koneksi,$cek_saldo));
$saldo_awal= $query_cek_saldo[0];

//menambahkan ke table transaksi
$query_transaksi="INSERT INTO transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
nominal='$nominal'";
$query1=mysqli_query($koneksi,$query_transaksi);


//analogi transaksi setor
$query_saldo="UPDATE data_nasabah SET saldo=$saldo_awal + $nominal WHERE id_nasabah=$id_nasabah";
$query2=mysqli_query($koneksi,$query_saldo);

//aksi jika query sukses maupun gagal
if ($query1 && $query2){
    //mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Alhamdulillah, transaksi penyetoran berhasil');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else {
//mod : menambah action alert jika query berhasil
    echo "<script>
window.alert('Maaf, transaksi penyetoran gagal');
    window.location.href='?hal=nasabah_tampil';
    </script>";
}
?>