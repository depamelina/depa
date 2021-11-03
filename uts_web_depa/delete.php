<?php
$con = new mysqli("localhost","root","","db_depa");
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM `tbl_anggota` WHERE `id_anggota`='$id'");
$result = mysqli_query($con, "DELETE FROM `tbl_kontrak_mapel` WHERE `id_anggota`='$id'");
header("location: editku.php?pesan=success&frm=del");
?>
