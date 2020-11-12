<?php  
include "../../../fungsi/koneksi.php";
if (isset($_GET['aksi']) && isset($_GET['id'])) {
        //die($id = $_GET['id']);
    $id = $_GET['id'];        
    if ($_GET['aksi'] == 'edit') {
        header("location:?p=edituser&id=$id");
    } else if ($_GET['aksi'] == 'hapus') {
        header("location:?p=hapususer&id=$id");
    } 
}
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE level!='Sub Bagian Tata Usaha' AND level!='Seksi Pelayanan dan Informasi' AND level!='Seksi Prasarana dan Sarana' AND level!='Seksi Konservarsi Peragaan Penelitian dan Pengembangan' AND level!='IT' ORDER BY level DESC");	
?>
<div class="main-panel">
 <div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Admin</h4>
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
                    <a href="#">Data</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pengguna Admin</a>
                </li>
            </ul>
        </div>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
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
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Olah Data Admin</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary" >
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th style="width: 10%">Detail Pengguna</th>
                                    <th style="width: 10%">Edit</th>
                                    <th style="width: 10%">Hapus</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <?php 
                                    $no =1 ;
                                    if (mysqli_num_rows($query)) {
                                        while($row=mysqli_fetch_assoc($query)):
                                           ?>
                                           <td><?= $no; ?></td>
                                           <td><img src="../../../IT/foto/<?php echo $row['foto'];?>" height="50" width="80"></td>
                                           <td><?= $row['username']; ?></td>
                                           <td><?= $row['NamaPegawai']; ?></td>
                                           <td class="text-info"><?= $row['level']; ?></td>
                                           <td>
                                            <a href="#userdetil<?php echo $row['id_user']; ?>" data-toggle="modal">
                                               <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-default" data-original-title="Lihat">
                                                <i class="far fa-eye"></i>
                                            </button></a>
                                            <?php include('buttonuser.php'); ?> 
                                        </td>
                                        <td>
                                            <a href="?p=user&aksi=edit&id=<?= $row['id_user']; ?>">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Admin">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#del<?php echo $row['id_user']; ?>" data-toggle="modal">
                                               <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fas fa-eraser"></i>
                                            </button></a>
                                            <?php include('button.php'); ?> 
                                        </td>
                                    </tr>
                                    <?php $no++; endwhile; } ?>
                                </tbody>
                            </table>
                        </div>
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