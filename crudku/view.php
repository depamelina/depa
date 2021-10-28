<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Depa Melina</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Techie - v4.3.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">Web Programming</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="add.php">Add Surat</a></li>
          <li><a class="nav-link scrollto active" href="#features">View Surat</a></li>
         </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Features Section ======= -->
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

	<section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
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
    <td><a href="update.php?id=<?= $isi['id']; ?>"><i class="bi bi-pencil btn btn-primary btn-sm"></i></a></td>
    <td><a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id'];?>"><i class="bi bi-trash btn btn-danger btn-sm"></i></a></td>
    </tr>

<?php 
}
?>
</tbody>

</table>
</div> 
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Depa Melina</h3>
            <p>
              Manajemen Informatika <br>
              Politeknik LP3I Tasikmalaya<br>
              <!-- United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>-->
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
          </div>
          <div class="credits">Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
</body>

 <div class="example-modal" tabindex="-1">
    <div id="deletesurat<?php echo $isi['id'];?>" class="modal fade" data-backdrop="false" role="dialog" style="display: none;">
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
           </div>
		</form>
      <div class="modal-footer">
        <button id="nodelete" type="button" class="btn btn-secondary pull-left" data-bs-dismiss="modal">Cancel</button>
        <a href="delete.php?id=<?= $isi['id']; ?>" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script> 
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</html>
