<?php  
include "../../../fungsi/koneksi.php";
    //mengambil id untuk edit user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id ");
    if (mysqli_num_rows($query)) {
        while($row2 = mysqli_fetch_assoc($query)):
            ?>
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
                                    <a href="#">Edit</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Data Pengguna</a>
                                </li>
                            </ul>
                        </div>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="box box-primary">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Edit Data Pengguna</div>
                                            </div>
                                            <div class="card-body">              
                                                <form enctype="multipart/form-data" id="bs-validate-demo" novalidate method="post"  action="edituproses.php" class="form-horizontal">
                                                    <div class="box-body">

                                                        <input type="hidden" name="id" value="<?= $row2['id_user']; ?>">

                                                        <div class="form-group form-show-validation row">
                                                            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto :</label>
                                                            <div class="input-file input-file-image">
                                                                <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                                                <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" required>
                                                                <label  for="uploadImg" required class=" label-input-file btn btn-primary"><i class="fa fa-file-image"></i> Upload a Image</label><div class="invalid-feedback">
                                                                  Masih Kosong
                                                              </div></div></div>


                                                              <div class="form-group form-show-validation row">
                                                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pegawai</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                                    <input  value="<?= $row2['NipPegawai']; ?>" type="text"  class="form-control" name="NipPegawai" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group form-show-validation row">
                                                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pegawai</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                                    <input value="<?= $row2['NamaPegawai']; ?>"  type="text"  class="form-control" name="NamaPegawai" >
                                                                </div>
                                                            </div>

                                                            <div class="separator-solid"></div>
                                                            <div class="form-group form-show-validation row">
                                                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat & Tanggal Lahir</label>
                                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                                    <input value="<?= $row2['tempat_lahir']; ?>" type="text" name="tmp" class="form-control" >
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-8">
                                                                   <input value="<?= $row2['tanggal_lahir']; ?>" type="date" name="tgl" class="form-control" >
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
                                                                <select value="<?= $row2['Agama']; ?>" name="Agama" class="form-control">
                                                                    <option>Pilih</option>

                                                                    <option <?php if($row2['Agama'] == "Islam") echo "selected"; ?> value="Islam">Islam</option>

                                                                    <option <?php if($row2['Agama'] == "Kristen") echo "selected"; ?> value="Kristen">Kristen</option>

                                                                    <option <?php if($row2['Agama'] == "Budha") echo "selected"; ?> value="Budha">Budha</option>

                                                                    <option <?php if($row2['Agama'] == "Hindu") echo "selected"; ?> value="Hindu">Hindu</option>

                                                                    <option <?php if($row2['Agama'] == "Konghucu") echo "selected"; ?> value="Konghucu">Konghucu</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">No Telepon</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['NoHp']; ?>" type="number"   type="text"  class="form-control" name="NoHp" >
                                                            </div>
                                                        </div>                                                                                                

                                                        <div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Alamat</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['Alamat']; ?>" class="form-control" id="Alamat" name="Alamat" rows="5"></input>
                                                            </div>
                                                        </div>


                                                        <div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">E-Mail</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input  value="<?= $row2['Email']; ?>" type="text"  class="form-control" name="Email" >
                                                            </div>
                                                        </div> 

                                                        <div class="separator-solid"></div>
                                                        <div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pengawas</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['NipAtasanSatu']; ?>"  type="text"  class="form-control" name="NipAtasanSatu">
                                                            </div>
                                                        </div>                         

                                                        <div class="form-group form-show-validation row">
                                                            <label for="AtasanSatu" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pengawas</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['AtasanSatu']; ?>"  type="text"  class="form-control" name="AtasanSatu">
                                                            </div>
                                                        </div>

                                                        <!--<div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Atasan Dua</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['NipAtasanDua']; ?>" type="text"  class="form-control" name="NipAtasanDua">
                                                            </div>
                                                        </div> 

                                                        <div class="form-group form-show-validation row">
                                                            <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Atasan Dua</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input  value="<?=  $row2['AtasanDua']; ?>" type="text"  class="form-control" name="AtasanDua">
                                                            </div>
                                                        </div>-->

                                                        <div class="form-group form-show-validation row">
                                                            <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat Tugas</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input value="<?= $row2['penempatan']; ?>"   type="text"  class="form-control" name="penempatan">
                                                            </div>
                                                        </div>                                                     

                                                        <div class="separator-solid"></div>


                                                        <div class="form-group form-show-validation row">
                                                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input type="text"   value="<?= $row2['username']; ?>" class="form-control" name="username" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group form-show-validation row">
                                                            <label for="paswword"class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <input required type="password" class="form-control" name="password">
                                                            </div>
                                                        </div>


                                                        <div class="form-group form-show-validation row">
                                                            <label for="jenis_brg" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Pilih Akses</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                                <select id="level"  class="form-control" name="level">
                                                                    
                                                                   <option  <?php if($row2['level'] == "Admin Sub Bagian Tata Usaha") echo "selected"; ?>  value="Admin Sub Bagian Tata Usaha">Admin Sub Bagian Tata Usaha</option> 

                                                                    <option  <?php if($row2['level'] == "Admin Seksi Pelayanan dan Informasi") echo "selected"; ?>  value="Admin Seksi Pelayanan dan Informasi">Admin Seksi Pelayanan dan Informasi</option> 

                                                                     <option  <?php if($row2['level'] == "Admin Seksi Prasarana dan Sarana") echo "selected"; ?>  value="Admin Seksi Prasarana dan Sarana">Admin Seksi Prasarana dan Sarana</option> 


                                                                    <option  <?php if($row2['level'] == "Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan") echo "selected"; ?>  value="Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan">Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan</option> 


                                                                </select>
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
                                                            <span class="text">Untuk foto, jenis kelamin, dan password harap di isi ulang kembali</span>
                                                        </li>
                                                    </ol>
                                                    <div>
                                                        <div class="separator-solid"></div>

                                                        <div class="form-group">
                                                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
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
             </form>
         </div>
     </div>
 </div>
</section>
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
<?php endwhile; } }  ?>