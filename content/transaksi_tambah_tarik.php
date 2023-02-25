<?php

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM data_nasabah WHERE id_nasabah='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<section class="content-header">
    <h1>Transaksi Penarikan</h1>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- gene                    l form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!--                        <h3 class="box-title">Quick Example</h3>-->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?hal=transaksi_insert_tarik" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal"required>
                        </div>
                        <div class="form-group">
                            <label for="id_nasabah">Nama Nasabah</label>
                            <input type="hidden" name="id_nasabah" value="<?= $data['id_nasabah'] ?>">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" required readonly>

                        </div>
                        <!--                         <div class="form-group">
                                                    <label for="kode_tr">Jenis Transaksi</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="kode_tr" id="kode_tr" value="1" required>Setor
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="kode_tr" id="kode_tr" value="2">Tarik
                                                        </label>
                                                    </div> -->
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan nominal uang" required>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a class="btn btn-danger" href="?hal=nasabah_tampil">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
</section>

