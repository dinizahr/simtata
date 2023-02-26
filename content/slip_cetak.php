<?php
//include "library/config.php";
//
////mengambil data nasabah dari database
//$query = mysqli_query($koneksi,
//    "SELECT * FROM view_transaksi WHERE id_transaksi='$_GET[id]'");
//$data = mysqli_fetch_array($query);
//?>
<!--<script>-->
<!--    onload(window.print());-->
<!--</script>-->
<!--<div class="content">-->
<!--    <div class="row">-->
<!--        <div class="col-md-8">-->
<!--            <div class="box box-default">-->
<!--                <div class="box-header">-->
<!--                    <h3 class="box-title text-center">-->
<!--                        Slip Transaksi-->
<!--                    </h3>-->
<!--                </div>-->
<!--                <div class="box-body">-->
<!--                    <p>Tanggal: --><?php //=$data['tanggal']?><!--</p>-->
<!--                    <p>No. Rekening: --><?php //=$data['no_rekening']?><!--</p>-->
<!--                    <p>Nama Nasabah: --><?php //=$data['nama']?><!--</p>-->
<!--                    <p>Nominal: --><?php //= "Rp. ". number_format($data['nominal'],0,",", ".") . ",-"; ?><!--</p><br>-->
<!--                    <p class="pull-right">Paraf Nasabah:</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<?php
include "library/config.php";

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM view_transaksi WHERE id_transaksi='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>

<?php

function tanggal_indonesia($tanggal){

    $bulan = array (
        1 =>   	'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $var = explode('-', $tanggal);

    return $var[2] . ' ' . $bulan[ (int)$var[1] ] . ' ' . $var[0];
    // var 0 = tanggal
    // var 1 = bulan
    // var 2 = tahun
}


?>

<script>
    onload(window.print());
</script>
<section class="content-header">
    <a href="?hal=nasabah_tampil" class="btn btn-sm btn-primary tombol-kembali ">Kembali</a>
    <a href="" class="btn btn-sm btn-warning tombol-kembali" onclick="window.print()" >Cetak Ulang</a>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-default">
                <div class="box-header">
                    <h3 class=" text-center">Slip Transaksi</h3>
                    <p class=" text-center"> <b>SIMTATA | SMK BP Subulul Huda</b></p>
                    <p class=" text-center"> <b>Per Tanggal :
                            <?php
                            echo tanggal_indonesia(date('Y-m-d'));
                            ?>
                        </b></p>
                </div>
                                <div class="box-body">
                                    <p>Tanggal: <?=$data['tanggal']?></p>
                                    <p>No. Rekening: <?=$data['no_rekening']?></p>
                                    <p>Nama Nasabah: <?=$data['nama']?></p>
                                    <p>Nominal: <?= "Rp. ". number_format($data['nominal'],0,",", ".") . ",-"; ?></p><br>
                                    <p class="pull-right">Paraf Nasabah:</p>

                                </div>
            </div>

        </div>
    </div>
</section>

