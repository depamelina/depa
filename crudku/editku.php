
<?php
$con = new mysqli("localhost","root","","db_surat");

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $no_surat = $_POST['no_surat'];
  $jenis_surat = $_POST['jenis_surat'];
  $tgl_surat = $_POST['tgl_surat'];
  $ttd_surat = $_POST['ttd_surat'];
  $ttd_mengetahui = $_POST['ttd_mengetahui'];
  $ttd_menyetujui = $_POST['ttd_menyetujui'];

  $result = mysqli_query($con, "UPDATE `tbl_surat` SET
    `no_surat`='$no_surat',
    `jenis_surat`='$jenis_surat',
    `tgl_surat`='$tgl_surat',
    `ttd_surat`='$ttd_surat',
    `ttd_mengetahui`='$ttd_mengetahui',
    `ttd_menyetujui`='$ttd_menyetujui'
    WHERE
    `id`='$id';
  ");
}

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat";
$query = mysqli_query($con, 'SELECT * FROM tbl_surat');
$result = $con->query($sql);
$isi = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Surat</title>
  
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
 
  
	<section id="features" class="features">
      <div class="container" data-aos="fade-up">
        <?php 
          $pesan = $_GET['pesan'];
          $frm = $_GET['frm'];

          //echo $pesan;

          if ($pesan=='success' && $frm =='del') {
        ?>    
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Anda berhasil menghapus.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php 
       }else if ($pesan=='success' && $frm =='add') {
     ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Anda berhasil menambahkan.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        <?php 
       }else if ($pesan=='success' && $frm =='edit') {
     ?>
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Anda berhasil mengubah.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php 
    }
      ?>
        <div class="section-title text-center">
          <h2>View Surat</h2>
          <p>Menampilkan elemen-elemen surat yang telah ditambahkan</p>
        </div>
		<div class="container text-center">
	<row>
	<div class="container-fluid"></div>
	</row>
<table class="table table-striped table-bordered">
  <thead>
    <td>No Surat</td>
    <td>Jenis Surat</td>
    <td>Tanggal Surat</td>
    <td>TTD Surat</td>
    <td>TTD Mengetahui</td>
    <td>TTD Menyetujui</td>
    <td colspan="2">ACTION</td>
  </thead>

<?php
	foreach ($query as $isi) {
    if($isi["jenis_surat"]=='1'){
      $js = "Surat Keputusan";
    }
    else if($isi["jenis_surat"]=='2'){
      $js = "Surat Pernyataan";
    }
    else if($isi["jenis_surat"]=='3'){
      $js = "Surat Peminjaman";
    }
    else if($isi["jenis_surat"]=='4'){
      $js = "Surat Nikah";
    }
    else if($isi["jenis_surat"]=='5'){
      $js = "Surat Cerai";
    }
    else if($isi["jenis_surat"]=='6'){
      $js = "Surat Kepemilikan";
    }
    else if($isi["jenis_surat"]=='7'){
      $js = "Surat Wasiat";
    }
    else{
      $js = "Kode Bermasalah";
    }

		?>
	<tr class="table-striped">
		<td><?php echo $isi['no_surat'];?></td>
		<td><?php echo $js;?></td>
		<td><?php echo $isi['tgl_surat'];?></td>
		<td><?php echo $isi['ttd_surat'];?></td>
		<td><?php echo $isi['ttd_mengetahui'];?></td>
		<td><?php echo $isi['ttd_menyetujui'];?></td>
		<td><a href="update.php?id=<?= $isi['id']; ?>"><i class="bi bi-pencil btn btn-info btn-sm"></i></a></td>
		<td><a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id'];?>"><i class="bi bi-trash btn btn-danger btn-sm"></i></a></td>
		</tr>

  <div class="example-modal">
    <div id="deletesurat<?php echo $isi['id'];?>" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Konfirmasi Delete Data Surat</h3>
          </div>
         <div class="modal-body">
          <form class="row g-3" method="post" action="view.php" name="form1">
            <input type="hidden" name="id" value="<?= $isi['id'] ?>">
           <h5 align="center">Apakah anda yakin ingin menghapus No Surat <?php echo $isi['no_surat'];?>?<strong><span class="grt"></span></strong></h5>
         </form>
      </div>
      <div class="modal-footer">
        <button id="nodelete" type="button" class="btn btn-secondary pull-left" data-bs-dismiss="modal">Cancel</button>
        <a href="delete.php?id=<?= $isi['id']; ?>" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
}
?>
</tbody>

</table>
</div>
<div class="text-center">
  <a href="index.php"><h6>Home</h6></a>
</div>

</body>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>