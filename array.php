<?php 
$biodata = array(
	'nama' => "Depa",
	'kelas' => "MI20B",
	'alamat' => "Seoul"
	);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Array</title>
</head>
<body>
	<?php 
			echo $biodata['nama'];
			echo "<br>";
			print_r ($biodata);

	?>
</body>
</html>