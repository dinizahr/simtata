
<section class="content-header">
    <h1>Tambah Nasabah</h1>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- gene l form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!--  <h3 class="box-title">Quick Example</h3>-->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?hal=nasabah_insert" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="no_rekening">No. Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="no_rekening" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Nasabah</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jk" id="jk" value="L" required>Laki-laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jk" id="jk" value="P">Perempuan
                                </label>

                            </div>

                            <div class="form-group">
                                <label for="id_jenjang">Jenjang</label>
                                <select class="form-control" name="id_jenjang" id="id_jenjang" required>
                                    <option value=""> - Pilih Jenjang - </option>
                                    <?php
                                    $query_jenjang=mysqli_query($koneksi,"SELECT * FROM jenjang");
                                    while ($j=mysqli_fetch_array($query_jenjang)){
                                        echo "<option value='$j[id_jenjang]'> $j[nama_jenjang]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="saldo">Saldo Awal</label>
                                <input type="number" class="form-control" name="saldo" id="saldo" placeholder="Saldo" required>
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