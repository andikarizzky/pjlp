<?php 
$page = isset($_GET['p']) ? $_GET['p'] : "";
if ($page == 'formpesan') {
    include_once "formpesan.php";
} else if ($page=="") {
    include_once "main.php";
} else if ($page=="datapesanan") {
    include_once "datapesanan.php";
}  else if ($page=="editpesan") {
    include_once "editpesan.php";
} else if ($page=="hapus") {
    include_once "hapuspesan.php";
} else if($page == "cetakpesanan"){
    include_once "cetakpesan.php";
} else if($page == "detil"){
    include_once "detilpesan.php";
} else if($page == "detilTunggu"){
    include_once "detilpesanTunggu.php";
} else if($page == "datapesananTunggu"){
    include_once "datapesananTunggu.php";
} else if ($page=="myProfile") {
    include_once "myProfile.php";                
} else if($page == "datapesananTolak"){
    include_once "datapesananTolak.php";
} else if ($page=="detilpesanTolak") {
    include_once "detilpesanTolak.php";                
} else if ($page=="detilpesanSetuju") {
    include_once "detilpesanSetuju.php";                
}
?>