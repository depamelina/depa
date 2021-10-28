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
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
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
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">Web Programming</a></h1>
     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="#services">Add Surat</a></li>
          <li><a class="nav-link" href="view.php">View Surat</a></li>
       </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
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
			<form class="row g-3" method="post" action="add.php" name="form1">
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

    header("location: editku.php?pesan=success");
	}?>
   
   
   
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
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>