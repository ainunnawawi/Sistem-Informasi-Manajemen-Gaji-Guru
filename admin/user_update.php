<?php
include "../koneksi.php";
$id_user        = $_POST['ID_USER'];
$username       = $_POST['USERNAME'];
$id_level       = $_POST['ID_LEVEL'];


$query = mysqli_query($koneksi,"UPDATE user SET USERNAME='$username', ID_LEVEL='$id_level' WHERE ID_USER='$id_user'");
if ($query){
    //header('location:index.php');	
    echo "<script>alert('Data User Berhasil diubah!'); window.location = 'user_tampil.php'</script>";	
} else {
    echo "<script>alert('Data User Gagal diubah / Username sudah ada!'); window.location=history.go(-1)</script>";
}
