<?php
session_start();
$koneksi=mysqli_connect("localhost","root","","keretaapi");
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$namapelanggan=$_SESSION['user'];
	$simpan=mysqli_query($koneksi,"INSERT INTO pembelian(faktur,id_kereta,nama_pelanggan,jumlah,totalbayar) values(
		'$_POST[faktur]',
		'$_POST[id_kereta]',
		'$namapelanggan',
		'$_POST[jumlah]',
		'$_POST[totalbayar]'
		)");
	if ($simpan)
			header('location:index.php');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM kelas WHERE id='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=kelas');
}

if ($_GET['proses']=='ubah'){
	if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE kelas SET namakelas='$_POST[namakelas]',harga='$_POST[harga]' WHERE id='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=kelas');
}
}
if ($_GET['proses']=='check'){
	$hapus=mysqli_query($koneksi,"update pembelian set status='Sudah Dibayar' WHERE faktur='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=reservasi');
}
?>