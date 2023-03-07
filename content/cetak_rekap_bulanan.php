<?php
    $bulan=$_POST['bulan'];
    $tahun=$_POST['tahun'];

?>

<section class="content-header">
<span>
                        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                        <a href="?hal=transaksi_tampil" class="btn btn-warning">Kembali</a>
                    </span>
    <!-- <center><h1>History Transaksi</h1></center> -->
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <center><h3>History Transaksi</h3></center>
                <p class= "text-center">Bulan : <?php
                
                switch($bulan){
                    case 1 :
                    echo "Januari";
                    break;
                    case 2 :
                    echo "Februari";
                    break;       
                     case 3 :
                    echo "Maret";
                    break;        
                    case 4 :
                    echo "April";
                    break;        
                    case 5 :
                    echo "Mei";
                    break;       
                     case 6 :
                    echo "Juni";
                    break;        
                    case 7 :
                    echo "Juli";
                    break;       
                     case 8 :
                    echo "Agustus";
                    break;        
                    case 9 :
                    echo "September";
                    break;       
                     case 10 :
                    echo "Oktober";
                    break;        
                    case 11 :
                    echo "November";
                    break;       
                     case 12 :
                    echo "Desember";
                    break;       
                     case 1 :
                    echo "Januari";
                    break;      
                        }
                
                ?> | Tahun : <?=$tahun;?> </p>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
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
 
                        $tampil = "SELECT * FROM  view_transaksi WHERE month(tanggal)=$bulan AND YEAR(tanggal)=$tahun";
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
                    <table class="table">
                                        <tr class="text-center">
                                            <td>
                                                <br><br><u><small>Accounting</small></u><br><br><br>(......................................)
                                            </td>
                                            <td>
                                                <br><br><u><small>Directur</small></u><br><br><br>(......................................)
                                            </td>
                                        </tr>

                                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>