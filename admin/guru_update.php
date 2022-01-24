<?php
include "../koneksi.php";
$id_guru       = $_POST['ID_GURU'];
$nama_guru     = $_POST['NAMA_GURU'];
$nuptk         = $_POST['NUPTK'];
$tempat_lahir  = $_POST['TEMPAT_LAHIR'];
$tanggal_lahir = $_POST['TANGGAL_LAHIR'];
$jenis_kelamin = $_POST['JENIS_KELAMIN'];
$jenjang       = $_POST['JENJANG'];
$prodi         = $_POST['PRODI'];
$gaji_p        = $_POST['GAJI_P'];

$query = mysqli_query($koneksi,"UPDATE guru SET NAMA_GURU='$nama_guru',NUPTK='$nuptk', 
TEMPAT_LAHIR='$tempat_lahir', TANGGAL_LAHIR='$tanggal_lahir', JENIS_KELAMIN='$jenis_kelamin', JENJANG='$jenjang', 
PRODI='$prodi', GAJI_P='$gaji_p' WHERE ID_GURU='$id_guru'");
if ($query){
    //header('location:index.php');	
    echo "<script>alert('Data Guru Berhasil diubah!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Guru Gagal diubah!'); window.location=history.go(-1)</script>";
}
?>