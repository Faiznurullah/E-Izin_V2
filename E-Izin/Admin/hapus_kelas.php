<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM kelas WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: kelas.php?hapus=sukses');
}
else{
		header('location: kelas.php?hapus=gagal');
}

?>
