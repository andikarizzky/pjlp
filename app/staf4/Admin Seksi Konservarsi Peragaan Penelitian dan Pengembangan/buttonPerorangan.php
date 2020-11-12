<!-- Delete -->
<div class="modal fade" id="delPerorangan<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $del=mysqli_query($koneksi,"select * from user where id_user='".$row['id_user']."'");
                $drow=mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                   <h5><center>Anda Yakin Ingin Hapus Pengguna : <strong><b><?php echo $drow['username']; ?></strong></b></center></h5> 
               </div> 
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            <a href="deletePerorangan.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        </div>
    </div>
</div>
</div>
<!-- /.modal -->