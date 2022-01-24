<?php
include "koneksi.php";
$username = $_POST['user'];
$password = md5($_POST['pass']);

//$query = mysqli_query("SELECT COUNT(username) AS jumlah FROM tb_user WHERE username='$username' AND password='".md5( $password )."'");
$query = mysqli_query($koneksi,"select USERNAME, PASS, ID_LEVEL, ID_GURU from user where USERNAME ='$username' and PASS ='$password'");

$cek = mysqli_num_rows($query);

if ($cek == 1){
	$data = mysqli_fetch_assoc($query);
	if($data['ID_LEVEL']==1){
		// buat session login dan username
		session_start();
		$_SESSION['username']   = $username;
		$_SESSION['password']   = $password;
		$_SESSION['id_level']	= 1;
		$username = $_SESSION['username'];	
		// alihkan ke halaman dashboard admin
		header('location:admin/index.php');	

	// cek jika user login sebagai pegawai
	}else if($data['ID_LEVEL']==2){
		// buat session login dan username
		session_start();
		$_SESSION['username']   = $username;
		$_SESSION['password']   = $password;
		$_SESSION['id_level']	= 2;
		$_SESSION['id_guru']	= $data['ID_GURU'];
		$username = $_SESSION['username'];
		// alihkan ke halaman dashboard pegawai
		header("location:guru/index.php");
	}else {
		//header('location:index.html');
		echo "<script>alert('Username atau Password Salah!'); window.location = 'index.html'</script>";
	}
} else {
	//header('location:index.html');
	echo "<script>alert('Username atau Password Salah!'); window.location = 'index.html'</script>";
}
?>