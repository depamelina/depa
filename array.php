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
			echo "<h2 style='color:#00BFFF'><center>~ Belajar Array ~</h2><br><br>";

			echo "<b><i> Hai perkenalkan :)</i></b><br><br>Nama Saya : ".$biodata['nama'];
			echo "<br>";
			echo " Dari Kelas  : ".$biodata['kls'];
			echo "<br>";
			echo " Saya Tinggal di  : ".$biodata['alamat'];
			echo "<br><br>";

			echo "Menampilkan isi array matakuliah : <br>";
			print_r ($matakuliah);

			echo "<br><br> Matakuliah favorit Saya : <br>";
			for($x=0;$x<count($matakuliah);$x++){
			echo "- ".$matakuliah[$x]."<br/>";
}

	?>
</body>
</html>

