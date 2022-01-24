<?php
include "../koneksi.php";
$id_tunjangan       = $_POST['ID_TUNJANGAN'];
$id_guru     = $_POST['ID_GURU'];
$id_jabatan         = $_POST['ID_JABATAN'];

$query = mysqli_query($koneksi,"UPDATE tbl_tunjangan SET ID_GURU='$id_guru', 
ID_JABATAN='$id_jabatan' WHERE ID_TUNJANGAN='$id_tunjangan'");
if ($query){
    //header('location:index.php');	
    echo "<script>alert('Data Tunjangan Jabatan Guru Berhasil diubah!'); window.location = 'tunjangan_tampil.php'</script>";	
} else {
	echo "<script>alert('Data Tunjangan Jabatan Guru Gagal diubah!'); window.location=history.go(-1)</script>";
}
?>