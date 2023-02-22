<?php
include "library/config.php";

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM transaksi WHERE id_transaksi='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History Edit</title>
</head>
<body>
<h1>Edit Transaksi</h1>
<hr>
<form action="transaksi_update.php" method="post">
    <ul>
        <li>
            <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">
            <label for="no_rekening">No.Rekening : </label>
            <input type="text" name="no_rekening" id="nama" value="<?= $data['nama'] ?>" required>
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
    <button type="submit"> Simpan </button>
    <!--Tombol batal-->
    <a href="transaksi_tampil.php"><button type="button"> Batal </button></a>

</form>
</body>
</html>
