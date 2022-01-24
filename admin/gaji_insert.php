<?php
include "../koneksi.php";
$id_guru			= $_POST['ID_GURU'];
$gaji_perjam		= $_POST['GAJI_PERJAM'];
$total_jam 	   		= $_POST['TOTAL_JAM'];
$total_tunjangan   	= $_POST['TOTAL_TUNJANGAN'];
$cicilan   			= $_POST['CICILAN'];
$baksos  		 	= $_POST['BAKSOS'];
$arisan   			= $_POST['ARISAN'];
$total_gaji			= $_POST['TOTAL_GAJI'];
$tanggal	   		= $_POST['TANGGAL'];


$query = mysqli_query($koneksi,"INSERT INTO gaji (ID_GAJI, ID_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL)
VALUES ('', '$id_guru', '$gaji_perjam', '$total_jam', '$total_tunjangan', '$cicilan', '$baksos', '$arisan', '$total_gaji', '$tanggal')");
if ($query){
	echo "<script>alert('Data Gaji Guru Berhasil dimasukan!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gaji Guru Gagal dimasukan!'); window.location=history.go(-1)</script>";	
}
?>