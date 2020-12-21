<?php
include ('koneksi.php');
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO petugas(nama,jekel,notelp,alamat,jabatan) values(
		'$_POST[nama]',
		'$_POST[jekel]',
		'$_POST[notelp]',
		'$_POST[alamat]',
		'$_POST[jabatan]'
		)");
	if ($simpan)
			header('location:index.php?p=petugas');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM petugas WHERE id='$_GET[kode]'");
	if ($hapus)
	header('location:index.php?p=petugas');
}

if ($_GET['proses']=='ubah'){
	if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"UPDATE petugas SET 
		nama='$_POST[nama]',
		jekel='$_POST[jekel]',
		notelp='$_POST[notelp]',
		alamat='$_POST[alamat]',
		jabatan='$_POST[jabatan]' WHERE id='$_GET[kode]'");
	if ($simpan)
			header('location:index.php?p=jabatan');
}
}
?>