<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
$query = mysqli_query($koneksi, "SELECT distinct(NIP), Akses, count(NIP) FROM permintaan GROUP BY NIP");    
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
        <div class="col-md-12">
            <div class="card">           
                <div class="card-header">
                    <div class="card-title">Data Laporan Hari Ini</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">								
                        <div class="table-responsive">
                            <table  id="basic-datatables" class="display table table-striped table-hover"   >
                                <thead  > 
                                    <tr>
                                        <th>No</th> 
                                        <th>NIP</th>
                                        <th>Level</th>
                                        <th>Jumlah Laporan</th>
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
                                               <td> <?= $row['NIP']; ?> </td>
                                               <td><p class="text-success"><?= $row['Akses']; ?></p>  </td>        
                                               <td> <?= $row['count(NIP)']; ?> </td>
                                               <td>                                              
                                                 <a data-original-title="Lihat"  data-toggle="tooltip" href="?p=detil&NIP=<?= $row['NIP'];?>"><button type="button" class="btn btn-icon btn-round btn-info">
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
</div>
</section>
</body>