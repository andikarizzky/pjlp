<?php
session_start();
include "../../../fungsi/koneksi.php";if(isset($_POST['bulk_delete_submit'])){
	$idArr = $_POST['checked_id'];
	foreach($idArr as $id){
		mysqli_query($koneksi,"UPDATE permintaan SET status=1 WHERE id_permintaan=".$id);
	}
	$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
	</div>';	
	header("Location:index.php?p=datapesanan2Tunggu");
}