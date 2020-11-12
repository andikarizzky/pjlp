<?php  
session_start();		
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])){
	$NIP = $_POST['NIP'];
	$id = $_POST['id'];
	$komentar = $_POST['komentar'];
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status=2, komentar ='$komentar' WHERE id_permintaan='$id' ");
	if($query) {
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
		</div>';
		header("Location:index.php?p=datapesanan2Tolak");
	} else {
		echo 'gagal';
	}
}
?>