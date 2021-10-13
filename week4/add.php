<?php
$con = new mysqli("localhost","root","","db_surat");

$tgl = date('d F Y');

//$sql = "SELECT * FROM tbl_surat";
$query = mysqli_query($con, 'SELECT * FROM tbl_surat');
//$result = $con->query($sql);
//$isi = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Surat</title>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<h2 class="card-header text-center">Tambah Surat</h2>
		<div class="card-body">
			<form class="row g-3">
			  <div class="col-md-6">
			    <label for="noSurat" class="form-label">Nomor Surat</label>
			    <input type="text" class="form-control" id="noSurat" name="noSurat" placeholder=" Nomor Surat">
			  </div>
			  <div class="col-md-6">
			    <label for="jenisSurat" class="form-label">Jenis Surat</label>
			    <select id="jenisSurat" name="jenisSurat"  class="form-select">
			      <option selected disabled> - Pilih Jenis Surat - </option>
			      <option value="1">Surat Keputusan</option>
			      <option value="2">Surat Pernyataan</option>
			      <option value="3">Surat Peminjaman</option>
			    </select>
			  </div>
			  <div class="col-md-6">
			    <label for="tglSurat" class="form-label">Tanggal Surat</label>
			    <input type="date" class="form-control" id="tglSurat" name="tglSurat">
			  </div>
			  <div class="col-md-6">
			    <label for="ttdSurat" class="form-label">TTD Surat</label>
			    <input type="text" class="form-control" id="ttdSurat" name="ttdSurat" placeholder=" Nama Pembuat Surat">
			  </div>
			  <div class="col-md-6">
			    <label for="ttdMengetahui" class="form-label">TTD Mengetahui</label>
			    <input type="text" class="form-control" id="ttdMengetahui" name="ttdMengetahui" placeholder=" Nama Mengetahui">
			  </div>
			  <div class="col-md-6">
			    <label for="ttdMenyetujui" class="form-label">TTD Menyetujui</label>
			    <input type="text" class="form-control" id="ttdMenyetujui" name="ttdMenyetujui" placeholder=" Nama Menyetujui">
			  </div>
		  
			  <div class="d-grid gap-2 d-md-block text-center">
				  <button class="btn btn-primary" >Add</button>
				  <button class="btn btn-danger" type="button">Cancel</button>
			</div>
			</form>
		</div>
		</div>
	</row>
	</div>
	<?php
	if(isset($_POST['submit'])) {
		$no_surat = $_POST['noSurat'];
		$jenis_surat = $_POST['jenisSurat'];
		$tgl_surat = $_POST['tglSurat'];
		$ttd_surat = $_POST['ttdSurat'];
		$ttd_mengetahui = $_POST['ttdMengetahui'];
		$ttd_menyetujui = $_POST['ttdMenyetujui'];

		$result = mysqli_query($mysqli, "INSERT INTO tbl_surat (id,no_surat,jenis_surat,tgl_surat,ttd_surat,ttd_mengetahui,ttd_menyetujui) VALUES ('','$no_surat','$jenis_surat','$tgl_surat','$ttd_surat','$ttd_mengetahui','$ttd_menyetujui')");

		echo "User added succesfully <a href='view.php'>List Surat</a>";
	}
	?>

</body>
<script src="../assets/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>