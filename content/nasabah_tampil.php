<section class="content-header">
    <center><h1>Data Nasabah</h1></center>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!--              <h3 class="box-title">Data Table With Full Features</h3>-->
                    <a class="btn btn-md btn-info" href="?hal=nasabah_tambah"> Tambah Nasabah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Rekening</th>
                            <th>Nama Nasabah</th>
                            <th>Jenjang</th>
                            <th>Saldo</th>
                            <th>Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tampil = "SElECT * FROM view_nasabah";
                        $query = mysqli_query($koneksi,$tampil);
                        $no=0;
                        while ($data = mysqli_fetch_array($query)) {
//                            var_dump($data);
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['no_rekening']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['nama_jenjang']; ?></td>
                                <td><?= "Rp. ". number_format($data['saldo'],0,",", ".") . ",-"; ?></td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="?hal=transaksi_tambah_setor&id=<?= $data['id_nasabah'] ?>"> Setor </a>
                                    <a class="btn btn-sm btn-warning"
<?php

 //Fungsi untuk menon aktifkan tombol tarik 
 // jika saldo lebi kecil atau sama dengan 10000
if ($data['saldo'] <= 10000 ) {
    ?>
onclick="alert('Maaf, saldo tidak bisa ditarik!')"
<?php
}else {?>
href="?hal=transaksi_tambah_tarik&id=<?= $data['id_nasabah'] ?>"
    <?php
}
?> 
> Tarik </a>
                                </td>
                                <td>
                                    <!-- Modifikasi tombol edit dan hapus-->
                                    <a class="btn btn-sm btn-info" href="?hal=nasabah_edit&id=<?= $data['id_nasabah'] ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="?hal=nasabah_delete&id=<?= $data['id_nasabah'] ?>">
                                        <i class="fa fa-eraser"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="?hal=daftar_cetak&id=<?= $data['id_nasabah'] ?>">
                                        <i class="fa fa-print"></i>
                                    </a>
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