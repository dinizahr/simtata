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
<form action="nasabah_update.php" method="post">
    <ul>
        <li>
            <input type="hidden" name="id_nasabah" value="<?= $data['id_nasabah'] ?>">
            <label for="nama">Nama Nasabah : </label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
        </li><br>
        <li>
            <label for="jk">Jenis Kelamin : </label>
            <input type="radio" name="jk" id="jk" value="L" required
                <?php
                //fungsi untuk mengaktifkan opsi laki-laki
                if($data['jk']=="L"){echo "checked";}
                ?>
            > Laki-laki
            <input type="radio" name="jk" id="jk" value="P"
                <?php
                ////fungsi untuk mengaktifkan opsi perempuan
                if ($data['jk']=="P"){echo "checked";}
                ?>
            > Perempuan
        </li><br>
        <li>
            <label for="jenjang">Jenjang : </label>
            <select name="jenjang" id="jenjang" required>
                <option value=""> - Pilih jenjang - </option>
                <option value="pelajar"
                    <?php if ($data['jenjang']=="pelajar"){echo "selected";}?>
                > Pelajar </option>
                <option value="mahasiswa"
                    <?php if ($data['jenjang']=="mahasiswa"){echo "selected";}?>
                > Mahasiswa </option>
                <option value="Masyarakat"
                    <?php if ($data['jenjang']=="masyarakat"){echo "selected";}?>
                > Masyarakat </option>
            </select>
        </li><br>
    </ul>
    <!--Tombol simpan-->
    <button class="btn-success" type="submit"> Simpan </button>
    <!--Tombol batal-->
    <a class="btn btn-danger" href="?hal=nasabah_tampil">Batal</a>

</form>
</body>
</html>
