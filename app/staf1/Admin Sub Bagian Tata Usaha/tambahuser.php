<?php  
include "../../../fungsi/koneksi.php";
$error = "";
?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Form</h4>
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
                        <a href="#">Tambah Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <?php 
                if(isset($_GET['pesan'])){
                    if($_GET['pesan']=="berhasil"){
                        echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
                        </div>';
                    }else if($_GET['pesan'] == "berhasilhapus"){
                       echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-warning" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-info"></span> <p class="text-warning">Berhasil DiHapus</p>
                       </div>';   
                   }
               }
               ?>
               <div class="col-md-6 col-lg-12">
                <div class="box box-primary">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Data Pengguna</div>
                        </div>
                        <div class="card-body">
                            <form method="post" id="bs-validate-demo" novalidate action="tambahuProses.php" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group form-show-validation row">
                                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" required >
                                            <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Image</label>
                                            <div class="invalid-feedback">
                                              Masih Kosong
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pegawai</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <input required type="text" class="form-control" name="NipPegawai">
                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pegawai</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <input required type="text" class="form-control" name="NamaPegawai">
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat & Tanggal Lahir</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <input required type="text" name="tmp" class="form-control">
                                </div>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                   <input required type="date" name="tgl" class="form-control">
                               </div>                            
                           </div>
                           <div class="form-group form-show-validation row">
                            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jenis Kelamin</label>
                            <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                                <div class="custom-control custom-radio">
                                    <input required type="radio" id="male" name="jenisKelamin" class="custom-control-input" value="Laki-laki">
                                    <label class="custom-control-label" for="male">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input required type="radio" id="female" name="jenisKelamin" class="custom-control-input" value="Perempuan">
                                    <label class="custom-control-label" for="female">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label id="tes" for="agama" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agama</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <select  name="Agama"  class="form-control">
                                    <option >Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>   
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">No Telepon</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="number" required type="text" class="form-control" name="NoHp">
                            </div>
                        </div>   
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Alamat</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <textarea required class="form-control" id="Alamat" name="Alamat" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">E-Mail</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input required type="text"  class="form-control" name="Email">
                            </div>
                        </div> 
                        <div class="separator-solid"></div>
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pengawas</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input  required type="text"  class="form-control" name="NipAtasanSatu">
                            </div>
                        </div>   
                        <div class="form-group form-show-validation row">
                            <label for="AtasanSatu" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pengawas</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input  required type="text"  class="form-control" name="AtasanSatu">
                            </div>
                        </div>
                        <!--<div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Atasan Dua</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text"  class="form-control" name="NipAtasanDua">
                            </div>
                        </div>-->  
                        <!--<div class="form-group form-show-validation row">
                            <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Atasan Dua</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text"  class="form-control" name="AtasanDua">
                            </div>
                        </div>-->
                        <div class="form-group form-show-validation row">
                            <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat Tugas</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input type="text"  class="form-control" name="penempatan">
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input  required type="text"  class="form-control" name="username">
                            </div>
                        </div>   
                        <div class="form-group form-show-validation row">
                            <label for="paswword"class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <input required type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label id="tes"for="nama_brg" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Akses</label>
                            <div class="col-lg-4 col-md-9 col-sm-8">
                                <select  name="level" class="form-control">
                                    <option>==&nbsp; Pilih Akses Admin &nbsp;==</option>
                                    <option value="Admin Sub Bagian Tata Usaha">Admin Sub Bagian Tata Usaha</option>
                                    <option value="Admin Seksi Pelayanan dan Informasi">Admin Seksi Pelayanan dan Informasi</option>
                                    <option value="Admin Seksi Prasarana dan Sarana">Admin Seksi Prasarana dan Sarana</option>
                                    <option value="Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan">Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan</option>
                                    <option >===&nbsp; Pilih Akses Pengguna &nbsp;===</option>
                                    <option value="Sub Bagian Tata Usaha">Sub Bagian Tata Usaha</option>
                                    <option value="Seksi Pelayanan dan Informasi">Seksi Pelayanan dan Informasi</option>
                                    <option value="Seksi Prasarana dan Sarana">Seksi Prasarana dan Sarana</option>
                                    <option value="Seksi Konservarsi Peragaan Penelitian dan Pengembangan">Seksi Konservarsi Peragaan Penelitian dan Pengembangan</option>
                                </select>
                            </div>
                        </div>    
                        <div class="card-action">
                            <div class="form-group">
                                <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan"> 
                                &nbsp;
                                <input type="reset" class="btn btn-danger" value="Batal">
                                &nbsp;
                        <!--    <a data-toggle="tooltip"  data-original-title="Kembali" href="index.php?p=userAdmin">
                             <button type="button" class="btn btn-round btn-border btn-warning">
                             <span class="btn-label">
                             <i class="fas fa-reply"></i>
                             </span>    
                             </button> 
                         </a>    -->    
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>
</div>
</div>
</div>
</div>
<footer class="footer">
    <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
</footer>
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