<section class="content-header">
    <center><h1>Cetak Slip Transaksi</h1></center>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
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
                            <th>Saldo Awal</th>
                            <th>Nominal Transaksi</th>
                            <th>Saldo  Akhir</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
<!- mengambil data dari table transaksi-->
                        <?php
                        $tampil = "SELECT * FROM transaksi 
JOIN data_nasabah 
USING (id_nasabah)
WHERE id_nasabah='$_GET[id]'";
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
                                 <td><?= "Rp. ". number_format($data['saldo_awal'],0,",", ".") . ",-"; ?></td>
                                <td><?= "Rp. ". number_format($data['nominal'],0,",", ".") . ",-"; ?></td>
                                <td><?= "Rp. ". number_format($data['saldo_akhir'],0,",", ".") . ",-"; ?></td>
                                <td><a class="btn btn-sm btn-primary" href="?hal=slip_cetak&id=<?= $data['id_transaksi'] ?>">Cetak</a></td>
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