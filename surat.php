<?php 

$tgl = date('d F Y');
$kota = 'Tasikmalaya';
$barang = array('Komputer','Projector','Router','Wi-Fi');
$ttd = 'Depa Melina';
$instansi = array('LP3I','Kota Tasikmalaya','082-345-455');

?>

<!DOCTYPE html>
<html>
<head>
	<title> Array</title>
	<style>
        .container {
            border: 1px solid #000;
            width: 50%;
        }
        .margin {
            margin: 10px 10px 10px 10px;
        }
         .padding{
         	padding: 0px 5px 0px 5px;
         }
        }
    </style>
</head>
<body>
	<?php 
			echo "<div class='container'>";
			echo "<div class='margin'>";
			echo "<div class='padding'>";
			echo "<h2><center>Surat Peminjaman Barang</h2><br><hr>";

			echo "</b><br><br>Nomor : 102 ";
			echo "<br>";
			echo " Perihal : Surat Peminjaman Barang";
			echo "<br>";
			echo " Kepada : <br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo $instansi[1];
			echo "<br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo $instansi[0].", ".$instansi[2];
			echo "<br>"; echo "<br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo "Dengan surat ini kami beritahu bahwa ada beberapa barang yang ingin kami pinjam. Semoga dengan ditulisnya surat ini Bapak/Ibu dapat memberikan beberapa barang yang kami butuhkan untuk menunjang kegiatan yang akan dilakukan.<br>";

			echo "<br>";

			$n=1;
			echo "Berikut ini daftar barang yang akan kami pinjam<br>";
			for($x=0;$x<count($barang);$x++){

			echo $n.". ".$barang[$x]."<br/>";
			$n++;
			}

			echo "<br>";
			echo "<br>";
			echo "<p style='text-align: justify; text-indent: 4.5in;'>";
			echo "$tgl,";
			echo "<br><br><br>";
			echo "<p style='text-align: justify; text-indent: 4.5in;'>";
			echo "<u>$ttd</u>";
			echo "</div></div></div>";

	?>
</body>
</html>