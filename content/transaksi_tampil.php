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
                            <th>Jenis Transaksi</th>
<!--                            <th>Setor</th>-->
<!--                            <th>Tarik</th>-->
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tampil = "SElECT * FROM view_transaksi";
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
                                <td><?php
                                    if ($data['kode_tr']=="1"){echo "Setor";}
                                    elseif ($data['kode_tr']=="2"){echo "Tarik";}
                                    ?></td>
                                <td><?= "Rp. ". number_format($data['nominal'],0,",", ".") . ",-"; ?></td>
<!--                                <td>--><?php //= "Rp. ". number_format($data['setor'],0,",", ".") . ",-"; ?><!--</td>-->
<!--                                <td>--><?php //= "Rp. ". number_format($data['tarik'],0,",", ".") . ",-"; ?><!--</td>-->
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


