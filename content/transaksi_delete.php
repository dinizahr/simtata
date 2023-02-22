<?php
include "library/config.php";

//menghapus data sesuai id_nasabah yang dipilih
$q = "DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'";
$query = mysqli_query($koneksi,$q);

if ($query){
// mod : menambah alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil dihapus');
    window.location.href='?hal=transaksi_tampil';
    </script>";
} else {
// mod : menambah alert jika query gagal
    echo "<script>
    window.alert('Data gagal dihapus');
    window.location.href='?hal=transaksi_tampil';
    </script>";
}
?>
<?php
