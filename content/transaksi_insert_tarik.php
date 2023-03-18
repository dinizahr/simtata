<?php

//menampung nilai variable $_POST
$tanggal = $_POST['tanggal'];
$saldo_awal = $_POST['saldo_awal'];
$id_nasabah = $_POST['id_nasabah'];
$nominal= $_POST['nominal'];
$kode_tr=2;

//mengambil nilai saldo awal dari tabel data_nasabh
// $query_saldo_awal="SELECT saldo FROM  data_nasabah WHERE id_nasabah=$id_nasabah";
// $data_saldo_awal= mysqli_fetch_row(mysqli_query($koneksi,$query_saldo_awal));
// $saldo_awal= intval($data_saldo_awal[0]);

//  var_dump($saldo_awal);


if($saldo_awal - $nominal < 10000){
    echo "<script>
    window.alert('Maaf , Penarikan gagal!\\nSisa saldo minimal adalah Rp. 10.000,-');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else{

//menampikan data_nasabah yang ber id.....
    $cek_saldo="SElECT saldo from data_nasabah where id_nasabah='$id_nasabah'";
    $query_cek_saldo=mysqli_fetch_row(mysqli_query($koneksi,$cek_saldo));
    $saldo_awal= $query_cek_saldo[0];

//menentukan saldo_akhir
$saldo_akhir= $saldo_awal - $nominal;

//menambahkan ke table transaksi
    $query_transaksi="INSERT INTO transaksi SET
tanggal='$tanggal',
id_nasabah='$id_nasabah',
kode_tr='$kode_tr',
nominal='$nominal',
saldo_awal=$saldo_awal,
saldo_akhir=$saldo_akhir";
    $query1=mysqli_query($koneksi,$query_transaksi);


//analogi transaksi tarik
    $query_saldo="UPDATE data_nasabah SET saldo=$saldo_akhir WHERE id_nasabah=$id_nasabah";
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
}


?>