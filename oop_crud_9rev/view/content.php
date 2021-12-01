<?php 

include '../controller/Kursus.php';
$ctrl = new Kursus();
$hasil = $ctrl->index();
$ctrl->hapusData();
//$query = $ctrl->getQty();


//var_dump($hasil);
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
                <h2>View Anggota</h2>
                <p></p>
                </div>
            <div class="container text-center">

        <div class="container-fluid">

                <a href="add.php" class="btn btn-outline-primary">Tambah</a>
                    <div class="table-responsive p-0">
                     <table class="table table-striped table-bordered table-hover small">
                        <thead class="thead-dark">
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Harga</th>
                            <!-- <th scope="col">Jml Mapel</th>
                            <th scope="col">Total Bayar</th> -->
                            <!-- <th scope="col">Admin</th>  -->
                            <th colspan="2">ACTION</th>
                        </thead>

        <?php
        foreach ($hasil as $isi) {

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
            <!-- <td><?php echo $isi['quantity'];?></td>
            <td><?php echo number_format($isi['harga']*$isi['quantity']);?></td> -->
             <!-- <td><?php echo $isi['nama_admin'];?></td> -->
            <td><a href="edit.php?id=<?= $isi['id_anggota']; ?>">Edit<i class="fas fa-edit"></i></a></td>
            <td><a href="#" onclick="return hapus(`<?= $isi['id_anggota'];?>`,`<?= $isi['nama'];?>`)">Hapus<i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php 
}
?>
</tbody>

</table>
</div>
</div>
<div class="text-center">

 

</div>
<?php include "../template/footer.php" ?>
	</div>
  </main>

<?php include "../template/script.php" ?>
</body>
<script>
	function hapus(id_anggota,nama_anggota){
		$('[name="id_anggota"]').val(id_anggota);
		$("#nama_anggota").html(nama_anggota);
		$("#deletesurat").modal('show');
	}
</script>
			<div class="example-modal">
                <div id="deletesurat" class="modal fade" role="dialog" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form class="row g-3" method="post" action="" name="form1">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
				
								<input type="hidden" name="id_anggota" value="">
								<h5 align="center">Apakah anda yakin ingin menghapus No Anggota <span id="nama_anggota"></span>?<strong><span class="grt"></span></strong></h5>
				
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger" name="delete" value="hapus">Delete</button>
								<button id="nodelete" type="button" class="btn btn-secondary pull-left" data-bs-dismiss="modal">Cancel</button>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
</html>