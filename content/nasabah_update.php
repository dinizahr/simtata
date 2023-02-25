
<?php
include_once "library/config.php";
//menampung nilai variable $_POST
$id_nasabah = $_POST['id_nasabah'];
$no_rekening = $_POST['no_rekening'];
$nama = $_POST['nama'];
$id_jenjang = $_POST['id_jenjang'];
$saldo = $_POST['saldo'];
$jk = $_POST['jk'];

//memasukkan data ke dalam database
$q="UPDATE data_nasabah SET
no_rekening='$no_rekening',
nama='$nama',
id_jenjang='$id_jenjang',
saldo='$saldo',
jk='$jk'
WHERE id_nasabah='$id_nasabah'
";
$query=mysqli_query($koneksi,$q);

if ($query){
// mod : menambah alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil diperbarui');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else {
// mod : menambah alert jika query gagal
    echo "<script>
    window.alert('Data gagal diperbarui');
    window.location.href='?hal=nasabah_tampil';
    </script>";
}
?>