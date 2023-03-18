 
<?php
include "library/config.php";

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM data_nasabah WHERE id_nasabah='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<section class="content-header">
    <h1>Edit Data Nasabah</h1>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- gene l form elements -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <!--  <h3 class="box-title">Quick Example</h3>-->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?hal=nasabah_update" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id_nasabah" value="<?= $data['id_nasabah'] ?>">
                            <label for="no_rekening">No. Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="no_rekening" value="<?= $data['no_rekening'] ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_nasabah">Nama Nasabah</label>
                            <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" placeholder="Nama Nasabah" value="<?= $data['nama'] ?>" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="id_jenjang">Jenjang</label>
                            <select class="form-control" name="id_jenjang" id="id_jenjang" required>
                                <option value=""> - Pilih Jenjang - </option>
                                <?php
                                $query_jenjang=mysqli_query($koneksi,"SELECT * FROM jenjang");
                                while ($j=mysqli_fetch_array($query_jenjang)){
                                    echo "<option value='$j[id_jenjang]'";
                                    if ($j['id_jenjang'] == $data['id_jenjang'])
                                        echo "selected";

                                    echo "> $j[nama_jenjang] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="text" class="form-control" name="saldo" id="saldo" placeholder="Saldo" value="<?= $data['saldo'] ?>" required readonly>
                        </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            <a class="btn btn-sm btn-primary" href="?hal=nasabah_tampil">Batal</a>
                        </div>
                    </div>
                </form>

                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
</section>