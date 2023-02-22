<?php
include "library/config.php";

//mengambil data siswa dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM data_nasabah WHERE id_nasabah='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print</title>
</head>
<body>
<h1>Print</h1>
<hr>
<form action="?hal=print" method="post">
    <ul>
        <li>
            <input type="hidden" name="no_rekening" value="<?= $data['no_rekening'] ?>">
            <label for="no_rekening">No. Rekening: </label>
            <input type="text" name="no_rekening" id="no_rekening" value="<?= $data['no_rekening'] ?>" required>
        </li><br>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
        </li><br>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
                        <th>Saldo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil = "SElECT * FROM data_nasabah";
                    $query = mysqli_query($koneksi,$tampil);
                    $no=0;
                    while ($data = mysqli_fetch_array($query)) {
                        //        var_dump($data);
                        $no++;
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $data['id_jenjang']; ?></td>
                            <td><?= $data['saldo']; ?></td>
                        </tr>

<!--<script>-->
<!--window.print();-->
<!--</script>-->
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>

    </ul>

</form>
</body>
</html>