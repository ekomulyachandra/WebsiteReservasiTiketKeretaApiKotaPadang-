<?php
$koneksi=mysqli_connect("localhost","root","","keretaapi");
session_start();
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO pembelian(faktur,id_kereta,id_pelanggan,nama_pelanggan,email,tgl_berangkat,jumlah,totalbayar,status) values(
		'$_POST[faktur]',
		'$_POST[id_kereta]',
		'$_SESSION[id]',
		'$_POST[nama_pelanggan]',
		'$_POST[email]',
		'$_POST[tgl_berangkat]',
		'$_POST[jumlah]',
		'$_POST[totalbayar]',
		'Belum Dibayar'
		)");
	if ($simpan){
		header("location:kodereservasi.php?kode='$_POST[faktur]'");
		
	}
	}
}
?>