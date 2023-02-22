<section class="content-header">
    <h1>Tambah Transakasi</h1>
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
                <form action="?hal=transaksi_insert" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal"required>
                        </div>
                        <div class="form-group">
                            <label for="nama_transaksi">Nama Transaksi</label>
                            <input type="text" class="form-control" name="nama_transaksi" id="nama_transaksi" placeholder="nama_nasabah"required>
                        </div>
                        <div class="form-group">
                            <label for="setor">Setor</label>
                            <input type="text" class="form-control" name="setor" id="setor" placeholder="setor">
                        </div>
                        <div class="form-group">
                            <label for="tarik">Tarik</label>
                            <input type="text" class="form-control" name="tarik" id="tarik" placeholder="tarik">
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="saldo">Saldo</label>-->
<!--                            <input type="text" class="form-control" name="saldo" id="saldo" placeholder="saldo">-->
<!--                        </div>-->
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a class="btn btn-danger" href="?hal=transaksi_tampil">Batal</a>
                        </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
    </selection>