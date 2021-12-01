<?php 

include '../controller/Kursus.php';
//$id = $_GET['id'];
$ctrl = new Kursus();
//$isi = $ctrl->getData($id);
$mapel = $ctrl->getMapel();
$nmadmin = $ctrl->getAdmin();
$jpaket = $ctrl->getJenisPaket();
$ctrl->simpanKursus();
//$tkontrak = $ctrl->getKontrak();

?>

<!DOCTYPE html>
    <html>
        <?php include "../template/head.php"?>
    <body class="g-sidenav-show  bg-gray-200">
        <?php include "../template/sidebar.php" ?>
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include "../template/navbar.php" ?>

    <div class="container-fluid py-1">

            <div class="section-title text-center">
                <h2>Tambah Data Anggota</h2>
                <div class="container px-3 py-4">
                <div class="px-3">
      <div class="px-3">
        <div class="px-3">
          <div class="px-3">
            <div class="px-3">
              <div class="px-3">
                <div class="px-4">

<div class="card border-primary " style="width: 45rem;">

		  <div class="card-body">
		  <form class="row g-3" method="post" action="" name="form1">
              <div class="col-6">
              
			     <div class="input-group input-group-outline col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="nama" class="form-control" name="nama" onfocus="focused(this)" onfocusout="defocused(this)" required> 
                  </div>
              </div>
              <div class="col-6">
			     <div class="input-group input-group-outline col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="nama" class="form-control" name="tempat_lahir" onfocus="focused(this)" onfocusout="defocused(this)" required>
                  </div>
              </div>
             
			<div class="col-md-6">
				<label for="jenis_mapel" class="form-label">Pilihan Paket</label>
					<select name="jenis_mapel"  class="form-select">
					<option selected disabled> - Pilih Paket - </option>
				<?php //query data table jenis surat

				 foreach ($jpaket as $js) {

				?>
					<option value="<?=$js['id_paket']?>"><?=$js['nama_paket']?></option>
				<?php 
				  }
				?>
			   </select>
			</div>
			<div class="col-md-6">
				<label for="jk" class="form-label">Jenis Kelamin</label>
				<select name="jk" class="form-select">
					<option disabled="disabled" selected="selected">   -- </option>
					<option value="1">Laki-laki</option>
					<option value="2">Perempuan</option>
				</select>
			</div>
			<div class="col-md-6 my-4">
			 	 <label for="matkul" class="form-label">Pilihan MAPEL</label><br>
				  
			 	 <?php //query data table jenis surat

				 foreach ($mapel as $mp) {

				?>
					<div class="form-check-inline custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="<?=$mp['id_mapel']?>" value="<?=$mp['id_mapel']?>"> <span><?=$mp['nama_mapel']?></span>
				</div>
				<?php 
				  }
				?>

			</div>
			
			<div class="col-md-6">
				<label for="jenis_surat" class="form-label">Admin</label>
					<select name="admin"  class="form-select">
					<option selected disabled> - Pilih Admin - </option>
				<?php //query data table jenis surat

				 foreach ($nmadmin as $ad) {

				?>
					<option value="<?=$ad['id_admin']?>"><?=$ad['nama_admin']?></option>
				<?php 
				  }
				?>
			   </select>
			</div>	
			<div class="d-grid gap-2 col-4 mx-auto">
				<input type="submit" class="btn btn-primary" value="SAVE" name="simpan">
				<a href="content.php" class="btn btn-outline-primary">HOME</a>
			</div>
		  </form>
		</div>
		</div>
	  </row>
	  </div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

   
<?php include "../template/footer.php" ?>
	</div>
  </main>

<?php include "../template/script.php" ?>
</html>