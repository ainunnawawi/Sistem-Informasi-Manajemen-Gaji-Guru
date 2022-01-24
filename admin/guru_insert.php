<?php
include "../koneksi.php";
$nama_guru      = $_POST['NAMA_GURU'];
$nuptk          = $_POST['NUPTK'];
$tempat_lahir   = $_POST['TEMPAT_LAHIR'];
$tanggal_lahir  = $_POST['TANGGAL_LAHIR'];
$jenis_kelamin  = $_POST['JENIS_KELAMIN'];
$jenjang 	    = $_POST['JENJANG'];
$prodi	        = $_POST['PRODI'];
$gaji_p   	    = $_POST['GAJI_P'];

$query = mysqli_query($koneksi, "INSERT INTO guru 
(ID_GURU, NAMA_GURU, NUPTK, TEMPAT_LAHIR, TANGGAL_LAHIR, JENIS_KELAMIN, JENJANG, PRODI, GAJI_P) VALUES 
('', '$nama_guru', '$nuptk', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$jenjang', '$prodi', '$gaji_p')");
if ($query){
	echo "<script>alert('Data Guru Berhasil dimasukan!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Guru Gagal dimasukan!'); window.location=history.go(-1)</script>";	
}
?>