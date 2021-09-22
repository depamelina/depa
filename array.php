<?php 
$biodata = array(
	'nama' => "Depa Melina",
	'kls' => "MI20B",
	'alamat' => "Seoul"
	);

$matakuliah = array('Web Programming','Database Client Server','Java Programming');

?>

<!DOCTYPE html>
<html>
<head>
	<title> Array</title>
</head>
<body>
	<?php 
			echo "<h2><center>~ Belajar Array ~</h2><br><br>";
			echo " Hai perkenalkan :)<br>Nama Saya : ".$biodata['nama'];
			echo "<br>";
			echo " Dari Kelas  : ".$biodata['kls'];
			echo "<br>";
			echo " Saya Tinggal di  : ".$biodata['alamat'];
			echo "<br>";
			print_r ($matakuliah);

	?>
</body>
</html>

