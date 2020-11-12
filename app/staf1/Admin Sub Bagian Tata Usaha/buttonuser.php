    <div class="modal fade" id="userdetil<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Foto</label>
                        <div class="col-12 col-md-8">
                            <img class="card-img-top rounded" src="../../staf1/foto/<?php echo $row['foto'];?>" alt="foto">
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP</label>
                        <div class="col-12 col-md-8">
                            <input type="text"  required value="<?= $row['NipPegawai']; ?>" class="form-control" name="username"disabled="">
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['NamaPegawai']; ?>" required  class="form-control" name="password"disabled="">
                        </div>
                    </div>
                    <div class="separator-solid"></div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jenis Kelamin</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['jenisKelamin'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div> 
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agama</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['Agama'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>

                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">No Telepon</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['NoHp'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">E-Mail</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['Email'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                    <div class="separator-solid"></div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Pengawas</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['NipAtasanSatu'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Pengawas</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['AtasanSatu'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                    <!--<div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">NIP Atasan Dua</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['NipAtasanDua'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Atasan Dua</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['AtasanDua'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>--> 
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempat Tugas</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['penempatan'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>    
                    <div class="form-group form-show-validation row">
                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Akses</label>
                        <div class="col-12 col-md-8">
                            <input type="text" value="<?= $row['level'];  ?>" required  class="form-control" name="level"disabled="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->