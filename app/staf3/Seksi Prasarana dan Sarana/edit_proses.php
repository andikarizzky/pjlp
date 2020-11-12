<?php  
session_start();
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$Keterangan = $_POST['Keterangan'];
	$image_name = $_FILES['uploadImg']['name'];
	$image_type = $_FILES['uploadImg']['type'];
	$image_size = $_FILES['uploadImg']['size'];
	$image_tmp  = $_FILES['uploadImg']['tmp_name'];
	$catatan = $_POST['catatan'];
	$jamManual = $_POST['jamManual'];
	$jamManual2 = $_POST['jamManual2'];	
	$query = ("UPDATE permintaan SET status=0, komentar=' ', Keterangan ='$Keterangan', gambar ='$image_name', catatan ='$catatan', jamManual ='$jamManual', jamManual2 ='$jamManual2' WHERE id_permintaan='$id' ");
	if($image_name==null && $image_tmp==null){
		$hasil = mysqli_query($koneksi, $query);
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
		</div>';	
		echo '<script>window.location="index.php?p=datapesananTolak"</script>';
	} elseif($image_size>5000000){
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-4 alert alert-danger" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="icon" class="fas fa-info"></span> <p class="text-danger">Maksimal ukuran foto 5MB</p></div>';
		header("location:index.php?p=editpesan&id=$id");
	}
	elseif($image_type=="image/jpeg" or $image_type=="image/png" or
		$image_type=="image/jpg")
	{	
		$dirUpload = "../../staf3/gambar/";
		$terupload = move_uploaded_file($image_tmp, $dirUpload.$image_name); 
		$hasil = mysqli_query($koneksi, $query);
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
		</div>';
		echo '<script>window.location="index.php?p=datapesananTolak"</script>';
	}
	else{
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-4 alert alert-danger" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="icon" class="fas fa-info"></span> <p class="text-danger">File Tidak Sesuai</p></div>';
		header("location:index.php?p=editpesan&id=$id");
	} 
}
?>