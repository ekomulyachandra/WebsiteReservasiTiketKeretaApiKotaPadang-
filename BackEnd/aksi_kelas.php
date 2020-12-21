<?php
$koneksi=mysqli_connect("localhost","root","","keretaapi");
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {
	$simpan=mysqli_query($koneksi,"INSERT INTO kelas(namakelas,harga) values(
		'$_POST[namakelas]',
		'$_POST[harga]'
		)");
	if ($simpan)
			header('location:index.php?p=kelas');
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
?>