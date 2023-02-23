<?php
include "library/config.php";

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM data_nasabah WHERE id_nasabah='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Nasabah</title>
</head>
<body>
<h1>Edit Data Nasabah</h1>
<hr>
<form action="?hal=nasabah_update" method="post">
    <ul>
        <li>
            <input type="hidden" name="no_rekening" value="<?= $data['no_rekening'] ?>">
            <label for="no_rekening">No. Rekening : </label>
            <input type="text" name="no_rekening" id="no_rekening" value="<?= $data['no_rekening'] ?>" required>
        </li><br>
        <li>
            <input type="hidden" name="id_nasabah" value="<?= $data['id_nasabah'] ?>">
            <label for="nama">Nama Nasabah : </label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
        </li><br>
        <li>
            <input type="hidden" name="id_jenjang" value="<?= $data['id_jenjang'] ?>">
            <label for="id_jenjang">Jenjang :</label>
            <input type="text" name="id_jenjang" id="id_jenjang" value="<?= $data['id_jenjang'] ?>" required>
        </li><br>
        <li>
            <input type="hidden" name="saldo" value="<?= $data['saldo'] ?>">
            <label for="saldo">Saldo : </label>
            <input type="text" name="saldo" id="saldo" value="<?= $data['saldo'] ?>" required>
        </li><br>
    </ul>
    <!--Tombol simpan-->
    <button class=" btn btn-success" type="submit"> Simpan </button>
    <!--Tombol batal-->
    <a class="btn btn-danger" href="?hal=nasabah_tampil">Batal</a>

</form>
</body>
</html>




