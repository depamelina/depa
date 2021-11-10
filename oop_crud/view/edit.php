<?php 

include '../controller/Kursus.php';

$ctrl = new Kursus();
$id = $_GET['id'];
$hasil = $ctrl->getData($id);


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

<div class="card border-primary " style="width: 45rem;">
      <div class="card-body">
      <form class="row g-3" method="post" action="editku.php" name="form1">
         <input type="hidden" name="id" value="<?= $isi['id_anggota'] ?>">
		<div class="col-6">
		     <div class="input-group input-group-outline col-md-6">
                   <label class="form-label">Nama</label>
                   <input type="nama" class="form-control" name="nama" value="<?= $isi['nama'] ?>" onfocus="focused(this)" onfocusout="defocused(this)">
                 </div>
        </div>
        <div class="col-6">
		     <div class="input-group input-group-outline col-md-6">
                   <label class="form-label">Tempat Lahir</label>
                   <input type="nama" class="form-control" name="tempat_lahir" value="<?= $isi['tempat_lahir'] ?>" onfocus="focused(this)" onfocusout="defocused(this)">
                 </div>
        </div>
            
    <div class="col-md-6">
        <label for="jenis_surat" class="form-label">Pilihan Paket</label>
          <select name="jenis_mapel"  class="form-select">
          <option selected disabled> - Pilih Paket - </option>
        <?php //query data table jenis surat

         foreach ($query as $js) {
          $select="";
          if ($isi['id_jenis_paket']==$js['id_paket']) {
            $select="selected";
          }
        ?>
          <option value="<?=$js['id_paket']?>"<?=$select?>><?=$js['nama_paket']?></option>
        <?php 
          }
        ?>
         </select>
      </div>
      <div class="col-md-6">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" class="form-select">
          <option disabled selected>--</option>
           <?php

    
          $select="";
          $select2="";
          if($isi['jenis_kelamin']=="1") {$select="selected";}
          if($isi['jenis_kelamin']=="2") {$select2="selected";}
        
        ?>
          <option value="1" <?= $select ?> > Laki-laki</option>
          <option value="2" <?= $select2 ?>> Perempuan</option>
        </select>
      </div>
      <div class="col-md-6 my-4">
        <label for="matkul" class="form-label">Pilihan MAPEL</label><br>
        <?php //query data table jenis surat

         foreach ($query2 as $mp) {
          $select="";
          foreach ($query4 as $mp1){
            if ($mp['id_mapel']==$mp1['id_mapel']) {
              $select="checked";
            }
          }

        ?>
          <div class="form-check-inline custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="<?=$mp['id_mapel']?>" value="<?=$mp['id_mapel']?>" <?=$select?> > <span><?=$mp['nama_mapel']?></span>
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

         foreach ($query3 as $ad) {
          $select="";
          if ($isi['id_admin']==$ad['id_admin']) {
            $select="selected";
          }
        ?>
          <option value="<?=$ad['id_admin']?>" <?=$select?>><?=$ad['nama_admin']?></option>
        <?php 
          }
        ?>
         </select>
      </div>  
      <div class="d-grid gap-2 col-4 mx-auto">
        <input type="submit" class="btn btn-primary" value="UPDATE" name="update">
        <a href="editku.php" class="btn btn-outline-primary">CANCEL</a>
      </div>
      </form>
    
    </div>
    </row>
    </div>
  </div>
</div>
</div>
</div>