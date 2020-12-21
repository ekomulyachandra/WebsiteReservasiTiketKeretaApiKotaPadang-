<?php
include ('koneksi.php');
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO kota(namakota) values(
		'$_POST[nama]')");
	if ($simpan)
			header('location:index.php?p=kota');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM kota WHERE id='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=kota');
}

if ($_GET['proses']=='ubah'){
	if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE kota SET 
		namakota='$_POST[nama]'
 WHERE id='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=kota');
}
}
?>