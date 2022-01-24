<?php
include "../koneksi.php";
$id_user    = $_POST['ID_USER'];
$pass       = md5($_POST['PASS']);
$pass1      = md5($_POST['PASS1']);

if ($pass==$pass1){
    $query = mysqli_query($koneksi,"UPDATE user SET PASS='$pass' WHERE ID_USER='$id_user'");	
    echo "<script>alert('Password Berhasil diubah!'); window.location = 'user_tampil.php'</script>";	
} else {
    echo "<script>alert('Password Gagal diubah!'); window.location=history.go(-1)</script>";
}
