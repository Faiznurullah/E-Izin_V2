<?php
include '../config/koneksi.php';
$delete = mysqli_query($conn, "DELETE FROM surat WHERE id = '".$_GET['id']."'");

 if($delete){
	header('location: surat.php?hapus=sukses');
}
else{
		header('location: surat.php?hapus=gagal');
}

?>
