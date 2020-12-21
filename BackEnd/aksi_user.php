<?php
include ('koneksi.php');
if ($_GET['aksi']=='tambah'){
if (isset($_POST['btnSubmit'])) {
	$nama_file = $_FILES['photo']['name'];
	$tmp_file =$_FILES['photo']['tmp_name'];
	$path="images/".$nama_file;
	$tipe_file =$_FILES['photo']['type'];
	if(!empty($nama_file)){
		if($tipe_file =="image/jpeg" or $tipe_file == "image/png"){
			$simpan=mysqli_query($koneksi,"INSERT INTO user (username,password,level,photo) values('$_POST[username]',md5('$_POST[password]'),'$_POST[level]','$nama_file')");
			if ($simpan){
				move_uploaded_file($tmp_file, $path);
				header('location:index.php?p=user');
			}
		}
		else{
			echo "<script>window.alert('File di upload harus berekstensi JPEG')</script>";
		}
	}else{
			$nama_file="default.jpg";
			$simpan=mysqli_query($koneksi,"INSERT INTO user (username,password,level,photo) values('$_POST[username]',md5('$_POST[password]'),'$_POST[level]','$nama_file')");
			if ($simpan){
				header('location:index.php?p=user');
			}
	}
}
}

if ($_GET['aksi']=='hapus'){
	$hapus=mysqli_query($koneksi,"DELETE FROM user WHERE username='$_GET[kode]'");
	$File="images/".$_GET[foto];
	if ($hapus) {
		unlink($File);
		header('location:index.php?p=user');
	}
}

if ($_GET['aksi']=='ubah'){
	if (isset($_POST['btnSubmit'])) {
			$nama_file = $_FILES['photo']['name'];
			$tmp_file =$_FILES['photo']['tmp_name'];
			$path="images/".$nama_file;
			$tipe_file =$_FILES['photo']['type'];
		if (!empty($nama_file)){
			$simpan=mysqli_query($koneksi,"UPDATE user SET 
			username='$_POST[username]',
			password=md5('$_POST[password]'),
			level='$_POST[level]',
			photo='$nama_file'
		WHERE username='$_GET[kode]'");
		if ($simpan){
			move_uploaded_file($tmp_file, $path);
			header('location:index.php?p=user');
		}
			
		}
		else {
			$simpan=mysqli_query($koneksi,"UPDATE user SET 
			username='$_POST[username]',
			password=md5('$_POST[password]'),
			level='$_POST[level]',
			photo='default.jpg'
			WHERE username='$_GET[kode]'");
			if ($simpan){
			header('location:index.php?p=user');
		}
		}
	}	
}
?>