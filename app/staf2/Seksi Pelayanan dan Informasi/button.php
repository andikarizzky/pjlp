<div class="modal fade" id="del<?php echo $row['id_permintaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $del=mysqli_query($koneksi,"select * from permintaan where id_permintaan='".$row['id_permintaan']."'");
                $drow=mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                <h5><center>Anda Yakin Ingin Hapus : <strong><?php echo $drow['Akses']; ?></strong></center></h5> 
               </div> 
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            <a href="delete.php?id=<?php echo $row['id_permintaan']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        </div>

    </div>
</div>
</div>