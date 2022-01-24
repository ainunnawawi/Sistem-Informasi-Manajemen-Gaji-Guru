<?php
include "../koneksi.php";
$username		= $_POST['USERNAME'];
$password 	   	= md5($_POST['PASS']);
$id_guru		= $_POST['ID_GURU'];
$id_level   	= $_POST['ID_LEVEL'];



$query = mysqli_query($koneksi,"INSERT INTO user (ID_USER,  USERNAME, PASS, ID_GURU, ID_LEVEL)
VALUES ('', '$username', '$password', '$id_guru', '$id_level')");
if ($query){
	echo "<script>alert('Data User Berhasil dimasukan!'); window.location = 'user_tampil.php'</script>";	
} else {
	echo "<script>alert('Data User Gagal dimasukan! (guru sudah mempunyai akun atau username sudah ada)'); window.location=history.go(-1)</script>";	
}
?>