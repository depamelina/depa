<?php 

$tgl = date('d F Y');
$kota = 'Tasikmalaya';
$barang = array('Buku','Pensil','Pulpen');
$ttd = 'Depa Melina';
$instansi = array('LP3I','Kota Tasikmalaya','082-345-455');

?>

<!DOCTYPE html>
<html>
<head>
	<title> Array</title>
</head>
<body>
	<?php 
			echo "<h2 style='color:#00BFFF'><center>Surat Peminjaman</h2><br><hr>";

			echo "</b><br><br>Nomor : 102 ";
			echo "<br>";
			echo " Perihal : Surat Peminjaman";
			echo "<br>";
			echo " Kepada : <br>".$instansi[1];
			echo "<br>";
			echo $instansi[0].", ".$instansi[2];
			echo "<br>"; echo "<br><br>";
			echo "Surat Peminjaman Barang<br>";

			echo "<br>";

			$n=1;
			echo "Berikut ini daftar barang yang akan kami pinjam<br>";
			for($x=0;$x<count($barang);$x++){

			echo $n.". ".$barang[$x]."<br/>";
			$n++;
			}

			echo "<br>";
			echo "<br>";

			echo "$tgl";
			echo "<br><br>";
			echo "$ttd";
			

	?>
</body>
</html>