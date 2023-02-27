<?php
if (!defined('INDEX')) die("");
//daftar yang ada didalam content
$halaman=[
    "dashboard",
    // menu nasabah
    "nasabah_tampil",
    "nasabah_tambah",
    "nasabah_insert",
    "nasabah_edit",
    "nasabah_delete",
    "nasabah_update",
    "profil",
    "transaksi_delete",
    "transaksi_edit",
    "transaksi_insert",
    "transaksi_insert_setor",
    "transaksi_insert_tarik",
    "transaksi_tambah",
    "transaksi_tambah_setor",
    "transaksi_tambah_tarik",
    "transaksi_tampil",
    "transaksi_update",
    "daftar_cetak",
    "slip_cetak"
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



