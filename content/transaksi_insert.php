<?php

//menampung nilai variable $_POST
$tanggal = $_POST['tanggal'];
$id_nasabah = $_POST['id_nasabah'];
$nominal= $_POST['nominal'];
$kode_tr=$_POST['kode_tr'];

//mengambil nilai saldo awal dari tabel data_nasabh
$query_saldo_awal="SELECT saldo FROM  data_nasabah WHERE id_nasabah=$id_nasabah";
$saldo_awal= mysqli_fetch_row(mysqli_query($koneksi,$cek_saldo));

var_dump($saldo_awal);

//perintah untuk menampilkan saldo dari nasabah tampil
// $cek_saldo="SElECT saldo from data_nasabah where id_nasabah='$id_nasabah'";
// $query_cek_saldo=mysqli_fetch_row(mysqli_query($koneksi,$cek_saldo));
// $saldo_awal= $query_cek_saldo[0];

// //perintah untuk menambahkan table pada table transaksi
// $query_transaksi="INSERT INTO transaksi SET
// tanggal='$tanggal',
// id_nasabah='$id_nasabah',
// kode_tr='$kode_tr',
// nominal='$nominal'";
// $query1=mysqli_query($koneksi,$query_transaksi);

// //analogika saldo antara setor dan tarik
// if ($kode_tr==1) {
//     $query_saldo="UPDATE data_nasabah SET saldo=$saldo_awal + $nominal WHERE id_nasabah=$id_nasabah";
// }elseif ($kode_tr==2) {
//     $query_saldo="UPDATE data_nasabah SET saldo=$saldo_awal - $nominal WHERE id_nasabah=$id_nasabah";
// }


// $query2=mysqli_query($koneksi,$query_saldo);

// //aksi jika query sukses maupun gagal
// if ($query1 && $query2){
//     //mod : menambah action alert jika query berhasil
//     echo "<script>
//     window.alert('Transaksi berhasil ditambah');
//     window.location.href='?hal=nasabah_tampil';
//     </script>";
// } else {
// //mod : menambah action alert jika query berhasil
//     echo "<script>
// window.alert('Transaksi gagal ditambah');
//     window.location.href='?hal=nasabah_tampil';
//     </script>";
// }
// ?>