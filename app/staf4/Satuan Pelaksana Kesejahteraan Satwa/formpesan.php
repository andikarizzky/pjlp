<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
$error = "";
?>
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
                        <a href="#">Form Laporan</a>
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
                <?php 
                if(isset($_GET['pesan'])){
                    if($_GET['pesan']=="berhasil"){
                        echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
                        </div>';
                    }else if($_GET['pesan'] == "berhasilhapus"){
                       echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-warning" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-info"></span> <p class="text-warning">Berhasil DiHapus</p>
                       </div>';   
                   }
               }
               ?>
               <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card"> 
                        <div class="card-header">
                            <div class="card-title">Form Laporan</div>
                        </div>                
                        <div class="card-body">
                            <form method="post" id="bs-validate-demo" novalidate  action="add-proses.php" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" readonly value="<?= $_SESSION['username']; ?>" class="form-control" name="NIP">
                                <input type="hidden" readonly value="<?= $_SESSION['NamaPegawai']; ?>" class="form-control" name="Pegawai">
                                <input type="hidden" readonly value="<?= $_SESSION['level']; ?>" class="form-control" name="Akses">
                                <div class="form-group form-show-validation row">
                                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Upload Foto </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview img-circle" width="100" height="100" src="../../../assets/images/empty-image.jpg" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg">
                                            <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Pilih foto disini</label>
                                        </div>
                                        <small class="text-warning">Lewati Bila Tidak Perlu<span class="required-label">*</span> </small>
                                    </div>
                                </div>
                                <ol class="activity-feed">
                                    <h3>Note<span class="required-label">*</span></h3>
                                    <li class="feed-item feed-item-warning">
                                        <span class="text"> Foto harus berukran minimum 5 mb </span>
                                    </li>
                                    <li class="feed-item feed-item-danger">
                                        <span class="text">Foto harus berformat png, jpeg, dan jpg</span>
                                    </li>
                                </ol>
                                <div class="separator-solid"></div>
                                <div class="form-group form-show-validation row">
                                    <label for="catatan" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Uraian Tugas</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <textarea required class="form-control" id="catatan" name="catatan" rows="5"></textarea>
                                        <div class="invalid-feedback">
                                           Masih Kosong
                                       </div>
                                   </div>
                               </div>  
                               <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Keterangan</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <textarea required class="form-control" id="Keterangan" name="Keterangan" rows="5"></textarea>
                                    <div class="invalid-feedback">
                                       Masih Kosong
                                   </div>
                               </div>
                           </div>                    
                           <div class="separator-solid"></div>
                           <?php $time = new DateTime(); 
                           $time->setTimezone(new DateTimeZone('Asia/Jakarta'));
                           ?>
                           <input readonly type="hidden" value="<?php echo $time->format('H:i:s');  ?>">
                           <div class="form-group form-show-validation row">
                            <label for="jamManual" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Dari jam</label>
                            <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                                <input id="time" type="text"  class="form-control" name="jamManual" required>
                                <div class="invalid-feedback">
                                   Masih Kosong
                               </div>                 
                           </div>
                       </div>
                       <div class="form-group form-show-validation row">
                        <label for="jamManual" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Sampai jam</label>
                        <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                            <input id="time2" type="text"  class="form-control" name="jamManual2" required>
                            <div class="invalid-feedback">
                               Masih Kosong
                           </div>                 
                       </div>
                   </div>
                   <div class="form-group form-show-validation row">
                    <label for="tglManual" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2">Pilih tanggal</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                       <input id="txtfuturedate" readonly name="tglManual" class="form-control datepicker" required />
                       <div class="invalid-feedback">
                           Masih Kosong
                       </div>
                   </div>
               </div>  
               <div class="separator-solid"></div>
               <div class="form-group">
                <input type="submit" id="simpan" name="simpan" class="btn btn-primary " value="Simpan" > 
                &nbsp;
                <input type="reset" class="btn btn-danger" value="Batal">
                &nbsp;
            </div>
        </div>
    </form>
</div>
</div>
<div class="col-sm-6 col-xs-12">
    <div class="box box-info">
        <div class="card">           
            <div class="card-header">
                <div class="card-title">Periksa Laporan Sebelum di Submit</div>
            </div>                
            <div class="card-body">
                <table  id="basic-datatables" class="table table-responsive display table table-striped table-hover table-head-bg-info">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Uraian Tugas</th>
                            <th>Keterangan</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <tr>
                            <?php 
                            $sql = "SELECT * FROM permintaan WHERE Akses='Satuan Pelaksana Kesejahteraan Satwa' AND Submit!='berhasil' ";
                            $queryTampil = mysqli_query($koneksi, $sql);
                            $no = 1;
                            if(mysqli_num_rows($queryTampil) > 0) {
                                while($row = mysqli_fetch_assoc ($queryTampil)):
                                   ?>
                                   <td align="left"><?php echo $no; ?></td>
                                   <td align="left"><img src="../../staf4/gambar/<?php echo $row['gambar'];?>" height="50" width="100" alt='Tidak Ada Foto'>
                                   </td>
                                   <td align="left"><?php echo $row['catatan'] ?></td>
                                   <td align="left"><?php echo $row['Keterangan'] ?></td>
                                   <td align="left"> <?= $row['jamManual']; ?> - <?= $row['jamManual2']; ?> </td>
                                   <td align="left"><?php
                                   $tanggal = $row["tglManual"];
                                   $tanggal2 = date_create($tanggal);
                                   $tgl = date_format($tanggal2, 'Y-m-d');
                                   echo tanggal_indo($tgl);
                                   ?>   </td>
                                   <td align="left">
                                    <a href="#del<?php echo $row['id_permintaan']; ?>" data-toggle="modal">
                                       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fas fa-eraser"></i>
                                    </button></a>
                                    <?php include('button2.php'); ?>    
                                </td>
                            </tr>
                        </tbody>
                        <?php $no++; endwhile; } else { echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Tidak ada Laporan!</strong>
                        </div>'; } ?>
                    </table>    
                    <div class="form-group">
                        <a class="btn btn-success" href="pesan.php" >Submit</a>
                        &nbsp;                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
</footer>
</section>
</div>
</div>
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
<script type='text/javascript'>
    $(document).ready(function(){
        $("#txtfuturedate").datepicker(
            {dateFormat:"dd-mm-yy",
            maxDate: 0
        });
    });
</script>