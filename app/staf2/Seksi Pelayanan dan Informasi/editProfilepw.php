<?php  
session_start();
include "../../../fungsi/koneksi.php";
if(isset($_POST['updatePW'])) {
    $id = $_POST['id'];
    $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE id_user ='$id' ");   
    if ($query) {
       $_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
       </div>';	
       header("location:index.php?p=myProfile&id=$id");
   } else {
    echo 'error' . mysqli_error($koneksi);
}
}
?>