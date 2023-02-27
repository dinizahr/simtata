
<section class="content-header">
    <h1>Tambah Transakasi</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <form action="?hal=transaksi_insert" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal"required>
                        </div>
                        <div class="form-group">
                            <label for="id_nasabah">Nama Nasabah</label>
                            <select class="form-control" name="id_nasabah" id="id_nasabah" required>
                                <option value=""> - Pilih Nasabah - </option>
                                <?php
                                $query_nasabah=mysqli_query($koneksi,"SELECT * FROM data_nasabah");
                                while ($j=mysqli_fetch_array($query_nasabah)){
                                    echo "<option value='$j[id_nasabah]'> $j[nama]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
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

                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan nominal uang">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a class="btn btn-danger" href="?hal=transaksi_tampil">Batal</a>
                            </div>
                        </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
</section>