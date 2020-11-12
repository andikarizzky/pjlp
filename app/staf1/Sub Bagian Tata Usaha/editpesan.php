<?php  
include "../../../fungsi/koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT jamManual, jamManual2, tglManual, NIP, Keterangan, catatan, gambar, tgl_permintaan, id_permintaan FROM permintaan WHERE id_permintaan = $id AND id_permintaan = $id ");
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
                            <a href="#">Form</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Edit Laporan</a>
                        </li>
                    </ul>
                </div>
                <section class="content">
                    <?php
    //        menampilkan pesan jika ada pesan
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan']) {
                        echo '<div class="pesan">'.$_SESSION['pesan'].'</div>';
                    }
    //        mengatur session pesan menjadi kosong
                    $_SESSION['pesan'] = '';
                    ?>

                    <?php
    //        menampilkan pesan jika ada pesan
                    if (isset($_SESSION['pesan2']) && $_SESSION['pesan2']) {
                        echo '<div class="pesan2">'.$_SESSION['pesan2'].'</div>';
                    }
    //        mengatur session pesan menjadi kosong
                    $_SESSION['pesan2'] = '';
                    ?>

                    <?php
    //        menampilkan pesan jika ada pesan
                    if (isset($_SESSION['pesan3']) && $_SESSION['pesan3']) {
                        echo '<div class="pesan3">'.$_SESSION['pesan3'].'</div>';
                    }
    //        mengatur session pesan menjadi kosong
                    $_SESSION['pesan3'] = '';
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Laporan</div>
                                </div>
                                <form method="post" action="edit_proses.php" class="form-horizontal" enctype="multipart/form-data" id="bs-validate-demo" novalidate >
                                    <div class="box-body">
                                        <input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Upload Foto </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <div class="input-file input-file-image">
                                                    <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                                    <input value="<?= $row2['gambar']; ?>" type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg">
                                                    <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Pilih foto disini</label>
                                                </div>
                                                <small class="text-success">Lewati Bila Tidak Perlu<span class="required-label">*</span> </small>
                                            </div>
                                        </div>
                                        <div class="separator-solid"></div>
                                        <div class="form-group form-show-validation row">
                                            <label for="catatan" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Catatan</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input required type="text" class="form-control" value="<?= $row2['catatan']; ?>" name="catatan">
                                                <div class="invalid-feedback">
                                                 Masih Kosong
                                             </div>
                                         </div>
                                     </div>                               
                                     <div class="form-group form-show-validation row">
                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Keterangan</label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input required type="text" class="form-control" id="Keterangan" value="<?= $row2['Keterangan']; ?>" name="Keterangan">
                                            <div class="invalid-feedback">
                                             Masih Kosong
                                         </div>
                                     </div>
                                 </div>
                                 <div class="separator-solid"></div> 
                                 <div class="form-group form-show-validation row">
                                    <label for="jamManual" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Dari jam</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                                        <input id="time" type="text" value="<?= $row2['jamManual']; ?>" class="form-control" name="jamManual" required>
                                        <div class="invalid-feedback">
                                           Masih Kosong
                                       </div>                 
                                   </div>
                               </div>
                               <div class="form-group form-show-validation row">
                                <label for="jamManual" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Sampai jam</label>
                                <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                                    <input id="time2" type="text" value="<?= $row2['jamManual2']; ?>" class="form-control" name="jamManual2" required>
                                    <div class="invalid-feedback">
                                       Masih Kosong
                                   </div>                 
                               </div>
                           </div>  
                           <div class="separator-solid"></div>   
                       </div class="form-group">
                       <ol class="activity-feed">
                        <h3>Note<span class="required-label">*</span></h3>
                        <li class="feed-item feed-item-warning">
                            <span class="text"> Pilih dan edit form yang ingin di ubah</span>
                        </li>
                        <li class="feed-item feed-item-success">
                            <span class="text">Abaikan form yang sudah terisi bila tidak ingin di ubah</span>
                        </li>
                        <li class="feed-item feed-item-danger">
                            <span class="text">Upload foto kembali bila sebelumnya di upload</span>
                        </li>
                    </ol>
                    <div>
                        <div class="separator-solid"></div>                              
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Update" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">
                            &nbsp;
                            <a data-toggle="tooltip"  data-original-title="Kembali" href="?p=detilpesanTolak&tgl=<?= $row2['tglManual']; ?>">
                             <button type="button" class="btn btn-border btn-warning">
                                 <span class="btn-label">
                                     <i class="fas fa-reply text-warning"></i>
                                 </span>    
                             </button>                               
                         </a>   
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
</div>
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
<script>
    $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
    setTimeout(function(){$(".pesan").fadeOut('slow');}, 5000);
</script>
<script>
    $(document).ready(function(){setTimeout(function(){$(".pesan2").fadeIn('slow');}, 500);});
    setTimeout(function(){$(".pesan2").fadeOut('slow');}, 5000);
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#txtfuturedate").datepicker(
            {dateFormat:"dd-mm-yy",
            maxDate: 0
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#time').bootstrapMaterialDatePicker
        ({
            date: false,
            shortTime: false,
            format: 'HH:mm'
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#time2').bootstrapMaterialDatePicker
        ({
            date: false,
            shortTime: false,
            format: 'HH:mm'
        });
    });
</script>
</body>