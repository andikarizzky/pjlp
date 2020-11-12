 <?php 
$page = isset($_GET['p']) ? $_GET['p'] : "";
if ($page == 'material') {
    include_once "material.php";
} else if ($page=="") {
    include_once "main.php";
} else if ($page=="datapesanan") {
    include_once "datapesanan.php";
} else if ($page=="editpesan") {
    include_once "editpesan.php";
} else if ($page=="tidaksetuju") {
    include_once "tidaksetuju.php";
} else if ($page=="datapesanan2Tunggu") {
    include_once "datapesanan2Tunggu.php";
} else if ($page=="detil2Tunggu") {
    include_once "detilpesan2Tunggu.php";
} else if ($page=="disetujui") {
    include_once "disetujui.php";
} else if ($page=="cetakpesan") {
    include_once "cetakpesan.php";
} else if($page == "detil"){
    include_once "detilpesan.php";
} else if ($page=="user") {
    include_once "user.php";
} else if ($page=="hapususer") {
    include_once "hapususer.php";
} else if ($page=="edituser") {
    include_once "edituser.php";
} else if ($page=="tambahuser") {
    include_once "tambahuser.php";                
} else if ($page=="myProfile") {
    include_once "myProfile.php";                
} else if ($page=="modal") {
    include_once "modal.php";                
} else if ($page=="userAdmin") {
    include_once "userAdmin.php";                
} else if ($page=="userStaff") {
    include_once "userStaff.php";                
} else if ($page=="datapesanan2") {
    include_once "datapesanan2.php";                
} else if($page == "detil2"){
    include_once "detilpesan2.php";
} else if($page == "detil3Tunggu"){
    include_once "detilpesan3Tunggu.php";
} else if($page == "detil3"){
    include_once "detilpesan3.php";
} else if($page == "disetujui2"){
    include_once "disetujui2.php";
} else if($page == "disetujui3"){
    include_once "disetujui3.php";
} else if($page == "disetujui0"){
    include_once "Disetujui0.php";
} else if($page == "edituserPerorangan"){
    include_once "edituserPerorangan.php";
} else if($page == "datapesanan2Tolak"){
    include_once "datapesanan2Tolak.php";
} else if($page == "detilpesan2Tolak"){
    include_once "detilpesan2Tolak.php";
} else if($page == "detilpesan3Tolak"){
    include_once "detilpesan3Tolak.php";
} else if($page == "modalTolak"){
    include_once "modalTolak.php";
} else if($page == "detilpesan3Setuju"){
    include_once "detilpesan3Setuju.php";
}
?>