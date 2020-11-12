<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
// $query = mysqli_query($koneksi, "SELECT distinct(NIP), Akses, count(id_permintaan) FROM permintaan WHERE Akses='Sub Bagian Tata Usaha' AND Submit='berhasil' GROUP BY NIP");
if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
        //die($id = $_GET['id']);
    $tgl = $_GET['tgl'];
    echo $tgl;
    if ($_GET['aksi'] == 'detil') {
        header("location:?p=detil&tgl=$tgl");
    } 
}
$query = mysqli_query($koneksi, "SELECT distinct(NIP), Pegawai, NamaPegawai, tgl_permintaan, jam, tglManual, penempatan, AtasanSatu, level, Akses, count(tglManual) FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE Akses='Sub Bagian Tata Usaha' AND Submit='berhasil' GROUP BY NIP"); 
?>
<body>
  <div class="main-panel">
     <div class="content">
        <div class="page-inner">
           <div class="page-header">
              <h4 class="page-title">Laporan</h4>
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
                <a href="#">Laporan</a>
            </li>
        </ul>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="card">           
            <div class="card-header">
                <div class="card-title">Data Laporan Sub Bagian Tata Usaha</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">								
                    <div class="table-responsive">
                        <table  id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary">
                            <thead align="center" > 
                                <tr>
                                    <th>No</th> 
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tempat Tugas</th>
                                    <th>Pengawas</th>
                                    <th>Jumlah Laporan</th>
                                    <th>Lihat laporan</th>                                    
                                </tr>
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <?php 
                                    $no =1 ;
                                    if (mysqli_num_rows($query)) {
                                        while($row=mysqli_fetch_assoc($query)):
                                           ?>
                                           <td> <?= $no; ?> </td>       
                                           <td> <?= $row['NIP']; ?> </td>
                                           <td> <?= $row['Pegawai']; ?> </td>
                                           <td> <?= $row['penempatan']; ?> </td>
                                           <td> <?= $row['AtasanSatu']; ?> </td>
                                           <td> <?= $row['count(tglManual)']; ?> </td>
                                           <td>     
                                            <a data-original-title="Lihat"  data-toggle="tooltip" href="?p=detil2&NIP=<?= $row['NIP']; ?>&Pegawai=<?= $row['Pegawai']; ?>"><button type="button" class="btn btn-icon btn-round btn-info">
                                                <i class="fas fa-eye"></i>    
                                            </button>
                                        </a>        
                                    </td>                            
                                </tr>
                                <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada Laporan.</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
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
</body>