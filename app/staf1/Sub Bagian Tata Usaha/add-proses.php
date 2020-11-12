<?php  
session_start();
include "../../../fungsi/koneksi.php";
include "../../../fungsi/guidv4.php";

if(isset($_POST['simpan'])) {
	$id = guidv4();
	$NIP = $_POST['NIP'];
	$Pegawai = $_POST['Pegawai'];
	$Akses = $_POST['Akses'];		
	$tgl_pemesanan = date('Y-m-d');
	$Keterangan = $_POST['Keterangan'];
	$tanggal= mktime(date("m"),date("d"),date("Y"));
	date_default_timezone_set('Asia/Jakarta');
	$jam=date("H:i");
	$jamManual = $_POST['jamManual'];
	$jamManual2 = $_POST['jamManual2'];
	$tanggal = $_POST["tglManual"];
	$tanggal2 = date_create($tanggal);
	$tanggaltiga = date_format($tanggal2, 'Y-m-d');
	$catatan = $_POST['catatan'];
	$image_name = $_FILES['uploadImg']['name'];
	$image_type = $_FILES['uploadImg']['type'];
	$image_size = $_FILES['uploadImg']['size'];
	$image_tmp  = $_FILES['uploadImg']['tmp_name'];
	$query=("INSERT INTO permintaan(id_permintaan,NIP,Pegawai,Akses,tgl_permintaan,Keterangan,jam,jamManual,jamManual2,tglManual,catatan,gambar) VALUES('$id','$NIP','$Pegawai','$Akses','$tgl_pemesanan','$Keterangan','$jam','$jamManual','$jamManual2','$tanggaltiga','$catatan','$image_name')");
	if($image_name==null && $image_tmp==null){
		$hasil = mysqli_query($koneksi, $query);
		echo '<script>window.location="index.php?p=formpesan"</script>';
		
	} elseif($image_size>5000000){
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-4 alert alert-danger" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="icon" class="fas fa-info"></span> <p class="text-danger">Maksimal ukuran foto 5MB</p></div>';
		echo '<script>window.location="index.php?p=formpesan"</script>';
	}
	elseif($image_type=="image/jpeg" or $image_type=="image/png" or
		$image_type=="image/jpg")
	{	
		$dirUpload = "../../staf1/gambar/";
		$terupload = move_uploaded_file($image_tmp, $dirUpload.$image_name); 
		$hasil = mysqli_query($koneksi, $query);
		echo '<script>window.location="index.php?p=formpesan"</script>';
	}
	else{
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-4 alert alert-danger" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="icon" class="fas fa-info"></span> <p class="text-danger">File Tidak Sesuai</p></div>';
		echo '<script>window.location="index.php?p=formpesan"</script>';
	} 
}
?>