<?php
$koneksi=mysqli_connect("localhost","root","","keretaapi");
if ($_GET['proses']=='tambah'){
if (isset($_POST['submit'])) {

			$simpan=mysqli_query($koneksi,"INSERT INTO pelanggan(nama,email,password,alamat,kota,tgl_lahir,nohp) values(
				'$_POST[nama]',
				'$_POST[email]',
				md5('$_POST[password]'),
				'$_POST[alamat]',
				'$_POST[kota]',
				'$_POST[tgl_lahir]',
				'$_POST[nohp]',
				)");
				if ($simpan){
				header('location:index.php?p=pelanggan');
}
}

if ($_GET['proses']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id='$_GET[kode]'");
	if ($hapus){
		header('location:index.php?p=pelanggan');
	}
}


if ($_GET['proses']=='ubah'){
	if (isset($_POST['btnSubmit'])) {
			$simpan=mysqli_query($koneksi,"UPDATE pelanggan SET 
			nama='$_POST[nama]',
			email='$_POST[email]',
			password=md5('$_POST[password]'),
			alamat='$_POST[alamat]',
			kota='$_POST[kota]',
			tgl_lahir='$_POST[tgl_lahir]',
			nohp='$_POST[nohp]' ,
			WHERE id='$_GET[kode]'");
		if ($simpan){
			header('location:index.php?p=pelanggan');
		}
	}	
}
if ($_GET['proses']=='register'){
if (isset($_POST['submit'])) {
			$simpan=mysqli_query($koneksi,"INSERT INTO pelanggan(nama,email,password,alamat,kota,tgl_lahir,nohp,photo) values(
				'$_POST[nama]',
				'$_POST[email]',
				md5('$_POST[password]'),
				'$_POST[alamat]',
				'$_POST[kota]',
				'$_POST[tgl_lahir]',
				'$_POST[nohp]',
				'$nama_file'
				)");
				if ($simpan){
				move_uploaded_file($tmp_file, $path);
				header('location:login.php');
				}
}
}
?>