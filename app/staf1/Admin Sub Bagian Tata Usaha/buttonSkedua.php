<!-- Delete -->
<div class="modal fade" id="editSkedua<?php echo $row['id_permintaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                   <h5><center>Anda Yakin : </center></h5>
               </div> 
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            <a href="setujukedua.php?tgl=<?= $tgl; ?>&id=<?=$row['id_permintaan']; ?>&NIP=<?= $row['NIP'];?>&Pegawai=<?= $row['Pegawai']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-trash"></span> Setuju </a>
        </div>
    </div>
</div>
</div>
<!-- /.modal -->