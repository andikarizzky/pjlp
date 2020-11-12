<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
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
                            <h4 class="page-title">Profile</h4>
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
                                    <a href="#">Profile Saya</a>
                                </li>
                            </ul>
                        </div>
                        <section class="content">
                            <div class="col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                                    <i class="fas fa-user"></i>
                                                    Profile Saya
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                                    <i class="fas fa-user-cog"></i>
                                                    Edit Profile
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#pills-contact-icon" role="tab" aria-controls="pills-contact-icon" aria-selected="false">
                                                    <i class="fas fa-user-lock"></i>
                                                    Ganti Password
                                                </a>
                                            </li>										
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-foto-tab-icon" data-toggle="pill" href="#pills-foto-icon" role="tab" aria-controls="pills-foto-icon" aria-selected="false">
                                                    <i class="fas fa-user-edit"></i>
                                                    Ganti Foto
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                                            <div  class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                                                <form class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="box-body">
                                                       <div class="row">
                                                        <br><br>
                                                    </div>     
                                                    <input type="hidden" name="id" value="<?= $row2['id_user']; ?>">

                                                    <div class="form-group form-show-validation row">
                                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <img class="card-img-top rounded" src="../../staf3/foto/<?php echo $row2['foto'];?>" alt="foto">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-show-validation row">
                                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <input type="text"  required value="<?= $row2['NipPegawai']; ?>" class="form-control" name="username"disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-show-validation row">
                                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <input type="text" value="<?= $row2['NamaPegawai']; ?>" required  class="form-control" name="password"disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="separator-solid"></div>
                                                    <div class="form-group form-show-validation row">
                                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat & Tanggal Lahir</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                            <input value="<?= $row2['tempat_lahir']; ?>" type="text" name="tmp" class="form-control" disabled >
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                           <input value="<?= tanggal_indo($row2['tanggal_lahir']); ?>" name="tgl" class="form-control" disabled>
                                                       </div>                            
                                                   </div>
                                                   <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jenis Kelamin</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['jenisKelamin'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agama</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['Agama'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">No Telepon</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['NoHp'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">E-Mail</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['Email'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="separator-solid"></div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pengawas</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['NipAtasanSatu'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pangawas</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['AtasanSatu'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <!--<div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Atasan Dua</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['NipAtasanDua'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Atasan Dua</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['AtasanDua'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>--> 
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat Tugas</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['penempatan'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>    
                                                <div class="form-group form-show-validation row">
                                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Akses</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <input type="text" value="<?= $row2['level'];  ?>" required  class="form-control" name="level"disabled="">
                                                    </div>
                                                </div>
                                                <div class="form-group">

                        <!--    <a data-toggle="tooltip"  data-original-title="Kembali" href="index.php">
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
         <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
            <form enctype="multipart/form-data" id="bs-validate-demo" novalidate method="post"  action="editProfile.php" class="form-horizontal">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $row2['id_user']; ?>">
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
                    <label id="tes" for="Jenis Kelamin" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jenis Kelamin</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <select  name="jenisKelamin" class="form-control">
                            <option>Pilih</option>
                            <option <?php if($row2['jenisKelamin'] == "Laki-laki") echo "selected"; ?> value="Laki-laki">Laki-laki</option>

                            <option <?php if($row2['jenisKelamin'] == "Perempuan") echo "selected"; ?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-show-validation row">
                    <label id="tes" for="agama" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agama</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <select name="Agama" class="form-control">
                            <option>Pilih</option>
                            <option <?php if($row2['Agama'] == "Islam") echo "selected"; ?> value="Islam">Islam</option>
                            <option <?php if($row2['Agama'] == "Kristen") echo "selected"; ?>  value="Kristen">Kristen</option>
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
                <div class="form-group form-show-validation row">
                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Atasan Dua</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input value="<?= $row2['NipAtasanDua']; ?>" type="text"  class="form-control" name="NipAtasanDua">
                    </div>
                </div>  
                <div class="form-group form-show-validation row">
                    <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Atasan Dua</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input  value="<?= $row2['AtasanDua']; ?>" type="text"  class="form-control" name="AtasanDua">
                    </div>
                </div>
                <div class="form-group form-show-validation row">
                    <label for="AtasanDua" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat Tugas</label>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input value="<?= $row2['penempatan']; ?>"   type="text"  class="form-control" name="penempatan">
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
         <div class="tab-pane fade" id="pills-contact-icon" role="tabpanel" aria-labelledby="pills-contact-tab-icon">
            <form enctype="multipart/form-data" id="bs-validate-demo" novalidate method="post"  action="editProfilepw.php" class="form-horizontal">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $row2['id_user']; ?>">      
                    <div class="form-group form-show-validation row">
                        <label for="paswword"class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                        <div class="col-lg-4 col-md-9 col-sm-8">
                            <input required type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="separator-solid"></div>   
                </div class="form-group">
                <ol class="activity-feed">
                    <h3>Note<span class="required-label">*</span></h3>
                    <li class="feed-item feed-item-warning">
                        <span class="text"> Masukan Password Baru</span>
                    </li>
                </ol>
                <div>
                    <div class="separator-solid"></div>
                    <div class="form-group">
                        <input type="submit" name="updatePW" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
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
         <div class="tab-pane fade" id="pills-foto-icon" role="tabpanel" aria-labelledby="pills-foto-tab-icon">
            <form method="post"  action="editProfileFoto.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="box-body">
                   <div class="row">
                    <br><br>
                </div>     
                <input type="hidden" name="id" value="<?= $row2['id_user']; ?>">
                <div class="form-group form-show-validation row">
                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto :</label>
                    <div class="input-file input-file-image">
                        <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" required>
                        <label  for="uploadImg" required class=" label-input-file btn btn-primary"><i class="fa fa-file-image"></i> Upload Foto</label><div class="invalid-feedback">
                          Masih Kosong
                      </div></div></div>
                      <div class="separator-solid"></div>   
                  </div class="form-group">
                  <ol class="activity-feed">
                    <h3>Note<span class="required-label">*</span></h3>
                    <li class="feed-item feed-item-warning">
                        <span class="text"> Pilih foto baru</span>
                    </li>
                </ol>
                <div>
                    <div class="separator-solid"></div>
                    <div class="form-group">
                        <input type="submit" name="updateFOTO" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
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
</section>
</div>
</div>
<footer class="footer">
    <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
</footer>
<?php endwhile; } }  ?>