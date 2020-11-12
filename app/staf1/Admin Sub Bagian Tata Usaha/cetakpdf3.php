<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <center>
    <h2>DATA LAPORAN</h2>
  </center>
  <?php 
  include '../../../fungsi/koneksi.php';
  ?>
  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      <th>Tanggal</th>
      <th>Nama</th>
      <th width="5%">Akses</th>
    </tr>
    <?php 
    $no = 1;
    $sql = mysqli_query($koneksi,"select * from permintaan");
    while($data = mysqli_fetch_assoc($sql)){
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['Akses']; ?></td>
      <td><?php echo $data['tgl_permintaan']; ?></td>
      <td><?php echo $data['Keterangan']; ?></td>
    </tr>
    <?php 
    }
    ?>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>