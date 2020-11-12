<?php  
include "../../../fungsi/fungsi.php";
include "../../../fungsi/koneksi.php";
if (isset($_GET['id']) && isset($_GET['tgl'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "SELECT NIP, komentar, tgl_permintaan, tglManual, id_permintaan FROM permintaan WHERE id_permintaan = $id ");
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
              <h4 class="page-title">Admin Komentar</h4>
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
                <a href="#">Laporan Tunggu</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pilih Tanggal Laporan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Detail Laporan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Admin Komentar</a>
            </li>
        </ul>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title">Admin Komentar</div>
                    </div>
                    <form method="post" id="bs-validate-demo" novalidate action="edit_modalTolak.php" class="form-horizontal">
                        <div class="box-body">
                           <input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">                   	
                           <div class="form-group form-show-validation row">
                            <label for="nama_brg" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tanggal Laporan</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text" class="form-control" value="<?= tanggal_indo($row2['tglManual']); ?>" readonly name="NIP">
                            </div>
                        </div>                               

                        <div class="form-group form-show-validation row">
                            <label for="komentar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tulis Komentar</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input id="komentar" type="text" required="isikan dulu" class="form-control" value="<?= $row2['komentar']; ?>" name="komentar" required>                            
                            </div>
                        </div>
                        <div class="separator-solid"></div>                        
                        <ol class="activity-feed">
                            <h3>Note<span class="required-label">*</span></h3>
                            <li class="feed-item feed-item-warning">
                                <span class="text"> Masukan Komentar Baru </span>
                            </li>
                        </ol>

                        <div class="separator-solid"></div>

                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Update" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">		
                            &nbsp;
    
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
</section>
</div>

</div>
<footer class="footer">

    <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
</footer>
<script>
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        var form = document.getElementById('bs-validate-demo');
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    }, false);
  })();
</script>
</body>