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
 <div class="section-title">
          <h2>Add Surat</h2>
          <p>Menambah berbagai macam elemen surat</p>
        </div>

    <?php
$con = new mysqli("localhost","root","","db_surat");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat";

$query = mysqli_query($con, 'SELECT * FROM tbl_jenis_surat');

$result = $con->query($sql);

$isi = $result->fetch_assoc();
?>

<div class="container">
  <row>
    <div class="card">
      <div class="card-body">
      <form class="row g-3" method="post" action="addku.php" name="form1">
        <div class="col-md-6">
          <label for="no_surat" class="form-label">Nomor Surat</label>
          <input type="text" class="form-control" name="no_surat" placeholder=" Nomor Surat" required>
        </div>
        <div class="col-md-6">
          <label for="jenis_surat" class="form-label">Jenis Surat</label>
          <select name="jenis_surat"  class="form-select">
            <option selected disabled> - Pilih Jenis Surat - </option>
            <?php //query data table jenis surat

             foreach ($query as $js) {

            ?>
            <option value="<?=$js['id_js']?>"><?=$js['jenis_surat']?></option>
            <?php 
              }
            ?>
           </select>
        </div>
        <div class="col-md-6">
          <label for="tgl_surat" class="form-label">Tanggal Surat</label>
          <input type="date" class="form-control" name="tgl_surat" required>
        </div>
        <div class="col-md-6">
          <label for="ttd_surat" class="form-label">TTD Surat</label>
          <input type="text" class="form-control" name="ttd_surat" placeholder=" Nama Pembuat Surat" required>
        </div>
        <div class="col-md-6">
          <label for="ttd_mengetahui" class="form-label">TTD Mengetahui</label>
          <input type="text" class="form-control" name="ttd_mengetahui" placeholder=" Nama Mengetahui" required>
        </div>
        <div class="col-md-6 my-4">
          <label for="ttd_menyetujui" class="form-label">TTD Menyetujui</label>
          <input type="text" class="form-control" name="ttd_menyetujui" placeholder=" Nama Menyetujui" required>
        </div>
      
       <div class="d-grid gap-2 col-4 mx-auto">
          <input type="submit" class="btn btn-primary" value="SAVE" name="simpan">
          <a href="index.php" class="btn btn-danger">CANCEL</a>
        </div>
      </form>
    </div>
    </div>
  </row>
  </div>
  <?php
  if(isset($_POST['simpan'])) {
    $no_surat = $_POST['no_surat'];
    $jenis_surat = $_POST['jenis_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $ttd_surat = $_POST['ttd_surat'];
    $ttd_mengetahui = $_POST['ttd_mengetahui'];
    $ttd_menyetujui = $_POST['ttd_menyetujui'];

    $result = mysqli_query($con, "INSERT INTO `tbl_surat` (`no_surat`,`jenis_surat`,
    `tgl_surat`,`ttd_surat`,`ttd_mengetahui`,`ttd_menyetujui`) 
    VALUES ('$no_surat','$jenis_surat','$tgl_surat','$ttd_surat','$ttd_mengetahui','$ttd_menyetujui')");

    header("location: editku.php?pesan=success&frm=add");
  }?>
   
   
</body>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>