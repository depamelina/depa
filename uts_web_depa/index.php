<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
<?php include "template/head.php" ?>
<body class="g-sidenav-show  bg-gray-200">
<?php include "template/sidebar.php" ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<?php include "template/navbar.php" ?>
	<!-- End Navbar -->
    <div class="container-fluid py-4">
	<h2 class="text-center border-bottom">Welcome <br> Depa Melina Study<br></h2>
	 <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h5 class="fw-normal">Rincian Biaya</h5>
            <p class="fs-5 text-muted"> Kami memberikan berbagai macam pilihan skema pembayaran yang dapat Anda gunakan</p>
         </div>
        
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g3">
		  
              <div class="col-lg-4"> 
			  <!-- lg-3 utuk membuat 4 kartu, karena konsepnya 12:3=4 -->
                <div class="card mb-3 rounded-3 shadow-sm border-primary">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Paket Bronze</h4>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title pricing-card-title">Rp10.000<small class="text-muted fw-light">/minggu</small></h3>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>included PSPL & kunjungan industri</li>
                      <li>Biaya pendidikan 1 tahun</li>
                      <li>Sertifikat Ujikom Nasional</li>
                      <li>Non-Beasiswa</li>
                    </ul>
                    <!--<button type="button" class="w-100 btn btn-lg btn-outline-primary">Daftar Sekarang</button>-->
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="card mb-3 rounded-3 shadow-sm">
                  <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Paket Silver</h4>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title pricing-card-title">Rp20.000<small class="text-muted fw-light">/bulan</small></h3>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>Included PSPL & kunjungan industri</li>
                      <li>Biaya pendidikan 1 tahun</li>
                      <li>Sertifikat Ujikom Nasional</li>
                      <li>Non-Beasiswa</li>
                    </ul>
                  </div>
                </div>
              </div>
			  
			     <div class="col-lg-4">
					<div class="card mb-3 rounded-3 shadow-sm border-primary">
					  <div class="card-header py-3 text-white bg-primary border-primary">
						<h4 class="my-0 fw-normal">Paket Gold</h4>
					  </div>
					  <div class="card-body">
						<h3 class="card-title pricing-card-title">Rp30.000<small class="text-muted fw-light">/semester</small></h3>
						<ul class="list-unstyled mt-3 mb-4">
						  <li>Included PSPL & kunjungan industri</li>
						  <li>Biaya pendidikan 1 tahun</li>
						  <li>Sertifikat Ujikom Nasional</li>
						  <li>Beasiswa pendidikan</li>
						  <li> </li>
						</ul>
					  </div>
					</div>
				</div>
				</div>
              
       
	<?php include "template/footer.php" ?>
	</div>
  </main>

<?php include "template/script.php" ?>
</body>

</html>