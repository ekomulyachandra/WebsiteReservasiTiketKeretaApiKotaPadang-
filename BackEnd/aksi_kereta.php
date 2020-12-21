<?php
include ('koneksi.php');
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO kereta(nama,tanggalberangkat,tanggaltiba,jamberangkat,jamtiba,dari,ke,id_kelas,stok) values(
		'$_POST[nama]',
		'$_POST[tanggalberangkat]',
		'$_POST[tanggaltiba]',
		'$_POST[jamberangkat]',
		'$_POST[jamtiba]',
		'$_POST[dari]',
		'$_POST[ke]',
		'$_POST[id_kelas]',
		'$_POST[stok]'
		)");
	if ($simpan)
			header('location:index.php?p=kereta');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM kereta WHERE id='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=kereta');
}

if ($_GET['proses']=='ubah'){
	if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE kereta SET 
		nama='$_POST[nama]',
		tanggalberangkat='$_POST[tanggalberangkat]',
		tanggaltiba='$_POST[tanggaltiba]',
		jamberangkat='$_POST[jamberangkat]',
		jamtiba='$_POST[jamtiba]',
		dari='$_POST[dari]',
		ke='$_POST[ke]',
		id_kelas='$_POST[id_kelas]',
		stok='$_POST[stok]'
		
		WHERE id='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=kereta');
}
}
?>