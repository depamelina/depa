<?php 
//Buat koneksi
$con = new mysqli("localhost","root","","db_surat");

$tgl = date('d F Y');
$kota = 'Tasikmalaya';
$barang = array('Komputer','Projector','Router','Wi-Fi');
$ttd = 'Depa Melina';
$instansi = array('LP3I','Kota Tasikmalaya','082-345-455');

if ($con) {
	
?>

<!DOCTYPE html>
<html>
<head>
	<title> Surat</title>
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


	$sql = "SELECT * FROM tbl_surat WHERE id = '2'";
	$query = mysqli_query($con, 'SELECT * FROM tbl_surat');
	$result = $con->query($sql);


	$isi = $result->fetch_assoc();

			echo "<div class='container'>";
			echo "<div class='margin'>";
			echo "<div class='padding'>";

			

				if ($isi["jenis_surat"]='1') {
					$js = "Surat Keputusan";
				}
				elseif ($isi["jenis_surat"]='2') {
					$js = "Surat Pernyataan";
				}
				elseif ($isi["jenis_surat"]='3') {
					$js = "Surat Peminjaman";
				}
				else{
					$js = "Kode Salah";
				}

			echo "<h2><center>" . $js . "</h2><br><hr>";
			echo "</b><br><br>Nomor : " . $isi["no_surat"];
			echo "<br>";
			echo " Perihal : " . $js;
			echo "<br>";
			echo " Kepada : <br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo $instansi[0];
			echo "<br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo $instansi[1]." (".$instansi[2].")";

			echo "<br>"; echo "<br>";
			echo "<p style='text-align: justify; text-indent: 0.5in;'>";
			echo "Dengan surat ini kami beritahu bahwa ada beberapa barang yang ingin kami pinjam. Semoga dengan ditulisnya surat ini Bapak/Ibu dapat memberikan beberapa barang yang kami butuhkan untuk menunjang kegiatan yang akan dilakukan.<br>";

			echo "<br>";

				$n=1;
				echo "Berikut ini daftar barang yang akan kami pinjam :<br>";
				for($x=0;$x<count($barang);$x++){

				echo $n.". ".$barang[$x]."<br/>";
				$n++;
				}

			echo "<br>";
			echo "<br>";
			echo "<p style='text-align: justify; text-indent: 4.5in;'>";
			echo $isi["tgl_surat"];
			echo "<br><br><br>";
			echo "<p style='text-align: justify; text-indent: 4.5in;'>";
			echo "<u>" .$isi["ttd_surat"] . "</u>";
			echo "</div></div></div>";

			//DEPA MELINA MI20B :)

	?>

</body>
</html>


<?php

}else{
	die("Yah! Koneksi Database pertama gagal : " . mysqli_connec_eror());
}

?>