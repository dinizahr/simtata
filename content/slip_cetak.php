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
<!--    <a href="" class="btn btn-sm btn-warning tombol-kembali" onclick="window.print()" >Cetak Ulang</a>-->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-default">
                <div class="box-header">
                    <h3 class=" text-center">Slip Transaksi :
                        <?php
                            if ($data['kode_tr']=="1"){echo "Penyetoran";}
                            elseif ($data['kode_tr']=="2"){echo "Penarikan";}
                            ?></h3>
                    <p class=" text-center"> <b>SIMTATA | SMK BP Subulul Huda</b></p>
                </div>
                                <div class="box-body">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <td width="150em">Tanggal</td>
                                            <td  width="50em" class="text-center">:</td>
                                            <td><?=$data['tanggal']?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Rekening</td>
                                            <td class="text-center">:</td>
                                            <td><?=$data['no_rekening']?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Nasabah</td>
                                            <td class="text-center">:</td>
                                            <td> <?=$data['nama']?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomina Transaksi</td>
                                            <td class="text-center">:</td>
                                            <td><?= "Rp. ". number_format($data['nominal'],0,",", ".") . ",-"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Saldo Akhir</td>
                                            <td class="text-center">:</td>
                                            <td><?= "Rp. ". number_format($data['saldo'],0,",", ".") . ",-"; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <tr class="text-center">
                                            <td>
                                                <br><br><u><small>Teller</small></u><br><br><br>(......................................)
                                            </td>
                                            <td>
                                                <br><br><u><small>Nasabah</small></u><br><br><br>(......................................)
                                            </td>
                                        </tr>

                                    </table>
                                    <hr>

                                </div>
            </div>

        </div>
    </div>
</section>