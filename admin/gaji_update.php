<?php
include "../koneksi.php";
$id_gaji            = $_POST['ID_GAJI'];
$gaji_perjam	    = $_POST['GAJI_PERJAM'];
$total_jam 	   	    = $_POST['TOTAL_JAM'];
$total_tunjangan    = $_POST['TOTAL_TUNJANGAN'];
$cicilan   			= $_POST['CICILAN'];
$baksos  		 	= $_POST['BAKSOS'];
$arisan   			= $_POST['ARISAN'];
$total_gaji		    = $_POST['TOTAL_GAJI'];
$tanggal	   	    = $_POST['TANGGAL'];

$query = mysqli_query($koneksi,"UPDATE gaji SET GAJI_PERJAM='$gaji_perjam',TOTAL_JAM='$total_jam', 
TOTAL_TUNJANGAN='$total_tunjangan', CICILAN='$cicilan', BAKSOS='$baksos', ARISAN='$arisan', TOTAL_GAJI='$total_gaji', TANGGAL='$tanggal' WHERE ID_GAJI='$id_gaji'");
if ($query){
    //header('location:index.php');	
    echo "<script>alert('Data Gaji Guru Berhasil diubah!'); window.location = 'gaji_tampil.php'</script>";	
} else {
	echo "<script>alert('Data Gaji Guru Gagal diubah!'); window.location=history.go(-1)</script>";
}
?>