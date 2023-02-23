<?php

include "library/config.php";
//menampung nilai variable $_POST
$no_rekening = "SMT".$_POST['no_rekening'];
$nama = $_POST['nama'];
$id_jenjang = $_POST['id_jenjang'];
$saldo = $_POST['saldo'];
$jk = $_POST['jk'];

//memasukkan data ke dalam database
$q="INSERT INTO data_nasabah SET
no_rekening='$no_rekening',
nama='$nama',
id_jenjang='$id_jenjang',
saldo='$saldo',
jk='$jk'";

$query=mysqli_query($koneksi,$q);

//aksi jika query sukses maupun gagal
if ($query){
    //mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil ditambah');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else {
//mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Data gagal ditambah');
    window.location.href='?hal=nasabah_tampil';
    </script>";
}
?>