<?php
include "../koneksi.php";
$nama_jabatan      = $_POST['NAMA_JABATAN'];
$tunjangan          = $_POST['TUNJANGAN'];

$query = mysqli_query($koneksi, "INSERT INTO jabatan 
(ID_JABATAN, NAMA_JABATAN, TUNJANGAN) VALUES 
('', '$nama_jabatan', '$tunjangan')");
if ($query){
	echo "<script>alert('Data Tunjangan Jabatan Berhasil dimasukan!'); window.location = 'jabatan_tampil.php'</script>";	
} else {
	echo "<script>alert('Data Tunjangan Jabatan Gagal dimasukan!'); window.location=history.go(-1)</script>";	
}
?>