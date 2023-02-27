<?php
session_start();
ob_start();
include "library/config.php";
//var_dump($_SESSION);
if (empty($_SESSION['username']) or
    empty($_SESSION['password']))
{
    echo "<script>
    window.location.href='landing/landing.php';
    </script>";
} else {
    define('INDEX', true);
}

?>



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="landing/assets/img/favicon.png" />
<html>
<?php include "parts/head.php" ?>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    <?php include "parts/header/header.php" ?>

    <!--    --><?php //include "content/dashboard.php"?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php include "konten.php" ?>
    </div>
    <!-- /.content-wrapper -->

    <?php include "parts/sidebar-left1.php" ?>

    <?php // include "parts/sidebar-right.php" ?>

    <?php include "parts/footer.php" ?>

</div>

<!-- ./wrapper -->

<?php include "parts/js-files.php" ?>


</body>
</html

