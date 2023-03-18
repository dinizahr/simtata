
<?php
include_once "library/config.php";

//menampung nilai variable $_POST
$id_nasabah = $_POST['id_nasabah'];
$id_jenjang = $_POST['id_jenjang'];

//memasukkan data ke dalam database
$q="UPDATE data_nasabah SET
id_jenjang='$id_jenjang'
WHERE id_nasabah='$id_nasabah'
";
$query=mysqli_query($koneksi,$q);

if ($query){
// mod : menambah alert jika query berhasil
    echo "<script>
    window.alert('Data nasabah berhasil diperbarui');
    window.location.href='?hal=nasabah_tampil';
    </script>";
} else {
// mod : menambah alert jika query gagal
    echo "<script>
    window.alert('Data nasabh gagal diperbarui');
    window.location.href='?hal=nasabah_tampil';
    </script>";
}
?>