<?php  
session_start();
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $AtasanSatu = $_POST['AtasanSatu'];
    $AtasanDua = $_POST['AtasanDua'];
    $NamaPegawai = $_POST['NamaPegawai'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tmp = $_POST['tmp'];
    $tgl = $_POST['tgl']; 
    $Agama = $_POST['Agama'];
    $NoHp = $_POST['NoHp'];
    $Alamat = $_POST['Alamat'];
    $Email = $_POST['Email'];
    $NipAtasanSatu = $_POST['NipAtasanSatu'];
    $NipAtasanDua = $_POST['NipAtasanDua'];
    $penempatan = $_POST['penempatan'];
    $query = mysqli_query($koneksi, "UPDATE user SET AtasanSatu='$AtasanSatu', AtasanDua='$AtasanDua', jenisKelamin='$jenisKelamin', NamaPegawai='$NamaPegawai', tempat_lahir='$tmp', tanggal_lahir='$tgl', Agama='$Agama', NoHp='$NoHp', Alamat='$Alamat', Email='$Email', NipAtasanSatu='$NipAtasanSatu', NipAtasanDua='$NipAtasanDua', penempatan='$penempatan' WHERE id_user ='$id' ");
    if ($query) {
        $_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
        </div>';    
        header("location:index.php?p=myProfile&id=$id");
    } else {
        echo 'error' . mysqli_error($koneksi);
    }
}
?>