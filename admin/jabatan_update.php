<?php
include "../koneksi.php";
$id_jabatan       = $_POST['ID_JABATAN'];
$nama_jabatan     = $_POST['NAMA_JABATAN'];
$tunjangan         = $_POST['TUNJANGAN'];

$query = mysqli_query($koneksi,"UPDATE jabatan SET NAMA_JABATAN='$nama_jabatan', 
TUNJANGAN='$tunjangan' WHERE ID_JABATAN='$id_jabatan'");
if ($query){
    //header('location:index.php');	
    echo "<script>alert('Data Tunjangan Jabatan Berhasil diubah!'); window.location = 'jabatan_tampil.php'</script>";	
} else {
	echo "<script>alert('Data Tunjangan Jabatan Gagal diubah!'); window.location=history.go(-1)</script>";
}
?>