<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if ( isset($_GET['NIP'])) {
    $NIP = $_GET['NIP'];
    $query = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE NIP='$NIP' ORDER BY tgl_permintaan DESC  ");        
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'edit')
        header("location:?p=editpesan");        
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
        <!-- Small boxes (Stat box) -->
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="berhasildisetujui"){
                echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil DiSetujui</p>
                </div>';
            }else if($_GET['pesan'] == "berhasilditolak"){
               echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil DiTolak</p>
               </div>';   
           }else if($_GET['pesan'] == "berhasildiedit"){
               echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil DiEdit</p>
               </div>';   
           }
       }
       ?>
       <div class="col-md-12">
           <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h3>NIP
                        <span class="text-primary"><?php echo $NIP; ?></span>
                    </h3>
                    <a class="btn btn-border ml-auto btn-success"  href="index.php?p=datapesanan">
                       <i class="flaticon-back"></i>
                       Kembali
                   </a>
               </div>
           </div>
           <div class="card-body">                               
            <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead> 
                        <tr>
                            <th>No</th>
                            <th>Tanggal Permintaan</th> 
                            <th>Jam</th>      
                            <th>Akses</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Video</th>
                            <th>Status</th>      
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            $no =1 ;
                            if (mysqli_num_rows($query)) {
                                while($row=mysqli_fetch_assoc($query)):
                                   ?>
                                   <td> <?= $no; ?> </td>
                                   <td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td>
                                   <td> <?= $row['jam']; ?> </td>
                                   <td> <?= $row['Akses']; ?> </td>
                                   <td><img src="../../staf1/gambar/<?php echo $row['gambar'];?>" height="50" alt="..." class="avatar-img rounded"></td>
                                   <td> <?= $row['Keterangan']; ?> </td>
                                   <td>
                                    <a data-original-title="Play"  data-toggle="tooltip" href="../../../IT/video/<?php echo $row['video_name']; ?>">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </td>
                                <td > <?php
                                if ($row['status'] == 0){
                                    echo '<span class="badge badge-warning" class=text-warning>Menunggu Persetujuan</span>';
                                } elseif ($row['status'] == 1) {
                                    echo '<span class="badge badge-success" class=text-primary>Telah Disetujui</span>';
                                } else {
                                    echo '<span class="badge badge-danger" class=text-danger>Tidak Disetujui</span>';
                                }
                                ?> 
                            </td>  
                            <td> 
                                <a href="#editS<?php echo $row['id_permintaan']; ?>" data-toggle="modal"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success " data-original-title="Setuju"><i class="fas fa-check-square"></i></button></a><?php include('buttonS.php'); ?> 
                                <a href="#edit<?php echo $row['id_permintaan']; ?>" data-toggle="modal">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Tidak Setuju"> <i class="fas fa-window-close"></i></button>
                                    <?php include('buttonT.php'); ?>
                                    <a  href="?p=editpesan&id=<?=$row['id_permintaan']; ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary " data-original-title="Edit"> <i class="fa fa-edit"></i></button></a> 
                                </td>                                                       
                            </tr>
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada laporan.</td></tr>";} ?>
                        </tbody>
                    </table>
                </div>                  
            </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>