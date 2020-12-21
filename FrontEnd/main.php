<?php
$p=isset($_GET['p']) ? $_GET['p'] : 'home';
if($p=='search') include('search.php');
if($p=='kereta') include('kereta.php');
if($p=='pelanggan') include('pelanggan.php');
if($p=='pemesanan') include('pemesanan.php');
if($p=='user') include('user.php');
if($p=='petugas') include('petugas.php');
if($p=='pembelian') include('pembelian.php');
if($p=='about')include('about.php');
if($p=='kota')include('kota.php');
?>