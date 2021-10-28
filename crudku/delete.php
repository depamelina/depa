<?php
$con = new mysqli("localhost","root","","db_surat");
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM `tbl_surat` WHERE `id`='$id'");
header("location: editku.php?pesan=success&frm=del");
?>
