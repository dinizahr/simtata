<?php
include "library/config.php";

//mengambil data nasabah dari database
$query = mysqli_query($koneksi,
    "SELECT * FROM view_transaksi WHERE id_transaksi='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>
<!---->
<script>
    onload(window.print());
</script>
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title text-center">
                        Slip Transaksi
                    </h3>
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
</div>

