<?php
if (!defined( 'INDEX')) die("");
$jml_nasabah = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM data_nasabah"));
?>
<?php
if (!defined( 'INDEX')) die("");
$jml_transaksi = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi"));
?>




<section class="content-header">
    <h1>Dashboard</h1>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">NASABAH</span>
                    <span class="info-box-number"><?= $jml_nasabah?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-navy"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TRANSAKSI</span>
                    <span class="info-box-number"><?= $jml_transaksi?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
    </div>
    <!-- /.row -->
</section>