<?php
if (!defined('INDEX')) die("");

$halaman=[
    "dashboard",
    // menu nasabah
    "nasabah_tampil",
    "nasabah_tambah",
    "nasabah_insert",
    "nasabah_edit",
    "nasabah_delete",
    "nasabah_update",
    "print",
    "profil",
    "setor",
    "tarik",
    "transaksi_delete",
    "transaksi_edit",
    "transaksi_insert",
    "transaksi_tambah",
    "transaksi_tampil",
    "transaksi_update",
    "jenjang"
];
if(isset($_GET['hal'])) $hal = $_GET['hal'];
else $hal = "dashboard";

foreach($halaman as $h){
    if($hal == $h){
        include "content/$h.php";
        break;
    }
}
?>



