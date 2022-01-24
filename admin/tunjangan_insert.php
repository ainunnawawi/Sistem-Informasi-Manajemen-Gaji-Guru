<?php
include "../koneksi.php";
$id_guru      = $_POST['ID_GURU'];
$id_jabatan   = $_POST['ID_JABATAN'];

$query = mysqli_query($koneksi, "INSERT INTO tbl_tunjangan 
(ID_TUNJANGAN, ID_GURU, ID_JABATAN) VALUES 
('', '$id_guru', '$id_jabatan')");
if ($query){
	echo "<script>alert('Data Tunjangan Jabatan Berhasil dimasukan!'); window.location = 'tunjangan_tampil.php'</script>";	
} else {
	echo "<script>alert('Data Tunjangan Jabatan Gagal dimasukan!'); window.location=history.go(-1)</script>";	
}
?>