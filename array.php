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
			print_r ($biodata);

	?>
</body>
</html>
