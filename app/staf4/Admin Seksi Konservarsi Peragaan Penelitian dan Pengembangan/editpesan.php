<?php  
include "../../../fungsi/koneksi.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT NIP, id_permintaan FROM permintaan WHERE id_permintaan = $id ");
  if (mysqli_num_rows($query)) {
     $row2=mysqli_fetch_assoc($query);
 }
}
?>
<body>
  <div class="main-panel">
     <div class="content">
        <div class="page-inner">
           <div class="page-header">
              <h4 class="page-title">Forms</h4>
              <ul class="breadcrumbs">
                 <li class="nav-home">
                    <a href="#">
                       <i class="flaticon-home"></i>
                   </a>
               </li>
               <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Forms</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Form</a>
            </li>
        </ul>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Permintaan</div>
                    </div>
                    <form method="post"  action="edit_proses.php" class="form-horizontal">
                        <div class="box-body">
                           <input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">
                           <input type="hidden" name="tgl_permintaan" value="<?= $row2['tgl_permintaan']; ?>">                    	
                           <div class="form-group form-show-validation row">
                            <label for="nama_brg" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="<?= $row2['NIP']; ?>" readonly name="NIP">
                            </div>
                        </div>                               
                        <div class="form-group form-show-validation row">
                            <label for="stok" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Akses</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input id="Akses" type="text" class="form-control" name="Akses" required>                                
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="Keterangan" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Keterangan</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input id="Keterangan" type="text" required="isikan dulu" class="form-control" name="Keterangan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Update" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">
                            <a class="btn btn-border btn-success"  href="index.php?p=detil&NIP=<?= $row2['NIP'];?>">
                               <i class="flaticon-back"></i>
                               Kembali
                           </a>  				                                           
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
</section>
</body>