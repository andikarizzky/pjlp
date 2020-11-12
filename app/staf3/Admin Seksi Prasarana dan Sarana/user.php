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
$query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY level DESC");	
?>
<div class="main-panel">
 <div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Pengguna</h4>
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
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
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
                        <h4 class="card-title">Olah Data User</h4>
                        <button type="button" data-toggle="tooltip" data-original-title="Tambah User" class="btn btn-primary btn-round ml-auto btn-xs">
                            <a href="index.php?p=tambahuser" class=" btn btn-primary">
                                <i class="fa fa-plus"></i>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    $no =1 ;
                                    if (mysqli_num_rows($query)) {
                                        while($row=mysqli_fetch_assoc($query)):
                                           ?>
                                           <td><?= $no; ?></td>
                                           <td><img src="../../../IT/foto/<?php echo $row['gambar'];?>" height="50"></td>
                                           <td><?= $row['username']; ?></td>
                                           <td><?= $row['NamaPegawai']; ?></td>
                                           <td><?= $row['level']; ?></td>
                                           <td>
                                            <div class="form-button-action">
                                                <a href="?p=user&aksi=edit&id=<?= $row['id_user']; ?>">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="#del<?php echo $row['id_user']; ?>" data-toggle="modal">
                                                   <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fas fa-eraser"></i>
                                                </button></a>
                                                <?php include('button.php'); ?>  
                                            </div>
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
</div>