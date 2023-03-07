<section class="content-header">
    <center><h1>History Transaksi</h1></center>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <form class="pull-right" action="?hal=cetak_rekap_bulanan" method="post">
<table>
    <tr>
        <td> Bulan:</td>
        <td>
        <select class="form-control" name="bulan" id="bulan" required>
            <option value=""> Pilih Bulan </option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        </td>
        <td> Tahun: </td>
        <td>
        <select class="form-control" name="tahun" id="tahun" required>
            <option value=""> Pilih Tahun </option>
            <option value="2023">2023</option>
        </select>
        </td>
        <td>
        <button class="btn btn-primary">Cetak</button>
        </td>
    </tr>
</table>
</form>
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
                            <th>Nominal</th>
                        </tr>
                        </thead>
                        <tbody>

<!-- memilih data dari table view_nasabah-->
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