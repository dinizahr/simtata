<section class="content-header">
    <center><h1>History Transaksi</h1></center>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!--              <h3 class="box-title">Data Table With Full Features</h3>-->
                    <a class="btn btn-md btn-info" href="?hal=transaksi_tambah"> Tambah Transaksi</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Nasabah</th>
                            <th>Setor</th>
                            <th>Tarik</th>
                            <th>Saldo</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tampil = "SElECT * FROM transaksi";
                        $query = mysqli_query($koneksi,$tampil);
                        $no=0;
                        while ($data = mysqli_fetch_array($query)) {
                            //        var_dump($data);
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['tanggal']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['setor']; ?></td>
                                <td><?= $data['tarik']; ?></td>
                                <td><?= $data['saldo']; ?></td>
                                <td>
                                    <!-- Modifikasi tombol edit dan hapus-->
                                    <a class="btn btn-sm btn-warning" href="?hal=transaksi_edit&id=<?= $data['id_transaksi'] ?>"> Edit </a>
                                    <a class="btn btn-sm btn-danger" href="?hal=transaksi_delete&id=<?= $data['id_transaksi'] ?>"> Hapus </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>


