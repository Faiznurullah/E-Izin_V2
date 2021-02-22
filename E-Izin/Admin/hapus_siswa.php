<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM siswa WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: siswa.php?hapus=sukses');
}
else{
		header('location: siswa.php?hapus=gagal');
}

?>
