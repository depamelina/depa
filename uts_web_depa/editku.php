
<?php 
  $con = new mysqli("localhost","root","","db_depa");
   $sql = "SELECT * FROM tbl_anggota";

	$query = mysqli_query($con, 'SELECT * FROM tbl_jenis_paket');

	$result = $con->query($sql);

	$isi = $result->fetch_assoc();

	$query2 = mysqli_query($con, 'SELECT * FROM tbl_mapel');

	$query3 = mysqli_query($con, 'SELECT * FROM tbl_admin');
	

if(isset($_POST['simpan'])){
	$id=date('YmdHis');
	$nama=$_POST['nama'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$jk=$_POST['jk'];
	$jenis_mapel=$_POST['jenis_mapel'];
	$admin=$_POST['admin'];
	$data = mysqli_query($con,
	"INSERT INTO `tbl_anggota`(`id_anggota`,`nama`, `tempat_lahir`,`jenis_kelamin`,`id_admin`) 
	VALUES ('$id', '$nama','$tempat_lahir','$jk', '$admin')");
	
	$query4 = "SELECT * FROM tbl_jenis_paket where id_paket='$jenis_mapel'";
	
	$result2 = $con->query($query4);
	$isi = $result2->fetch_assoc();
	$harga = $isi['harga'];
	 foreach ($query2 as $mp) {
	
	 	if(isset($_POST[$mp['id_mapel']])){
	 		$id_mapel=$_POST[$mp['id_mapel']];

	 			$data = mysqli_query($con,
				"INSERT INTO `tbl_kontrak_mapel`(`id_mapel`, `id_anggota`, `id_jenis_paket`, `harga`)
				VALUES ('$id_mapel', '$id','$jenis_mapel', '$harga')");

	 	}
	 	
					
		 }

	header("location:editku.php?pesan=success&frm=add");
 
}
  
if(isset($_POST['update'])){
  $id=$_POST['id'];
  $nama=$_POST['nama'];
  $tempat_lahir=$_POST['tempat_lahir'];
  $jk=$_POST['jk'];
  $jenis_mapel=$_POST['jenis_mapel'];
  $admin=$_POST['admin'];

  $result = mysqli_query($con, "UPDATE `tbl_anggota` SET `id_admin`='$admin',`nama`='$nama',`tempat_lahir`='$tempat_lahir',`jenis_kelamin`='$jk' WHERE `id_anggota`='$id'");

  $query4 = "SELECT * FROM tbl_jenis_paket where id_paket='$jenis_mapel'";
  
  $result = mysqli_query($con, "DELETE FROM `tbl_kontrak_mapel` WHERE `id_anggota`='$id'");
  $query2 = mysqli_query($con, 'SELECT * FROM tbl_mapel');
  $result2 = $con->query($query4);
  $isi = $result2->fetch_assoc();
  $harga = $isi['harga'];
   foreach ($query2 as $mp) {
  
    if(isset($_POST[$mp['id_mapel']])){
      $id_mapel=$_POST[$mp['id_mapel']];

        $data = mysqli_query($con,
        "INSERT INTO `tbl_kontrak_mapel`(`id_mapel`, `id_anggota`, `id_jenis_paket`, `harga`)
        VALUES ('$id_mapel', '$id','$jenis_mapel', '$harga')");

    }
          
    }
     header("location:editku.php?pesan=success&frm=edit");
  }

 

$tgl = date('d F Y');
$sql = "SELECT * FROM tbl_anggota 
join tbl_kontrak_mapel on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota 
join tbl_jenis_paket on tbl_kontrak_mapel.id_jenis_paket=tbl_jenis_paket.id_paket
group by tbl_anggota.id_anggota
";
$query = mysqli_query($con, "SELECT *,count(tbl_anggota.id_anggota) as quantity FROM tbl_anggota 
join tbl_kontrak_mapel on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota 
join tbl_jenis_paket on tbl_kontrak_mapel.id_jenis_paket=tbl_jenis_paket.id_paket
join tbl_admin on tbl_admin.id_admin=tbl_anggota.id_admin
group by tbl_anggota.id_anggota
");
$result = $con->query($sql);
$isi = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<?php include "template/head.php"?>
<body class="g-sidenav-show  bg-gray-200">
<?php include "template/sidebar.php" ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<?php include "template/navbar.php" ?>
	<!-- End Navbar -->
    <div class="container-fluid py-1">
 
  

   
        <?php 
		$pesan="";
		$frm="";
		if(isset($_GET['pesan'])){
			$pesan = $_GET['pesan'];
		}
          if(isset($_GET['frm'])){
          $frm = $_GET['frm'];
		  }
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
      <div class="alert alert-info alert-dismissible fade show" role="alert">
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
          <h2>View Anggota</h2>
          <p></p>
        </div>
		<div class="container text-center">
	
	<div class="container-fluid"></div>
	
	 <a href="addku.php" class="btn btn-outline-primary">Tambah</a>
	 <div class="table-responsive p-0">
<table class="table table-striped table-bordered table-hover small">
  <thead class="thead-dark">
    <th scope="col">ID Anggota</th>
    <th scope="col">Nama</th>
    <th scope="col">Jenis Kelamin</th>
    <th scope="col">Paket</th>
	  <th scope="col">Harga</th>
    <th scope="col">Jml Mapel</th>
	  <th scope="col">Total Bayar</th>
	  <th scope="col">Admin</th>       
    <th colspan="2">ACTION</th>
  </thead>

<?php
	foreach ($query as $isi) {

    $gn= "Perempuan";
	if($isi['jenis_kelamin']=="1"){
		$gn = "Laki-Laki";
	}

	
		?>
	<tr class="table-striped">
		<td><?= $isi['id_anggota'];?></td>
		<td><?php echo $isi['nama'];?></td>
    <td><?php echo $gn;?></td>
		<td><?php echo $isi['nama_paket'];?></td>
		<td><?php echo number_format($isi['harga']);?></td>
    <td><?php echo $isi['quantity'];?></td>
		<td><?php echo number_format($isi['harga']*$isi['quantity']);?></td>
		<td><?php echo $isi['nama_admin'];?></td>
		<td><a href="updateku.php?id=<?= $isi['id_anggota']; ?>"><i class="fas fa-edit"></i></a></td>
		<td><a href="#" data-bs-toggle="modal" data-bs-target="#deletesurat<?php echo $isi['id_anggota'];?>"><i class="fas fa-trash-alt"></i></a></td>
		</tr>

  <div class="example-modal">
    <div id="deletesurat<?php echo $isi['id_anggota'];?>" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
         <div class="modal-body">
          <form class="row g-3" method="post" action="view.php" name="form1">
            <input type="hidden" name="id" value="<?= $isi['id_anggota'] ?>">
           <h5 align="center">Apakah anda yakin ingin menghapus No Anggota <?php echo $isi['id_anggota'];?>?<strong><span class="grt"></span></strong></h5>
         </form>
      </div>
      <div class="modal-footer">
		<a href="delete.php?id=<?= $isi['id_anggota']; ?>" class="btn btn-danger">Delete</a>
        <button id="nodelete" type="button" class="btn btn-secondary pull-left" data-bs-dismiss="modal">Cancel</button>
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
</div>
<div class="text-center">

 

</div>
<?php include "template/footer.php" ?>
	</div>
  </main>

<?php include "template/script.php" ?>
</body>

</html>