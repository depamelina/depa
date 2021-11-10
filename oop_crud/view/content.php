<?php 

include '../controller/Kursus.php';
$ctrl = new Kursus();
$hasil = $ctrl->index();


//var_dump($hasil);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Surat</title>
  
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
        <section id="features" class="features">
        <div class="container" data-aos="fade-up">

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
                <!-- <th scope="col">Jml Mapel</th>
                <th scope="col">Total Bayar</th> -->
                <!-- <th scope="col">Admin</th>         -->
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
            </div>
            </body>

    </html>




