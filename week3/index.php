<?php
error_reporting(1);

//DATABASE PERTAMA
$db_host1 = 'localhost';
$username = 'root';
$password = '';
$database = 'db_surat';

// Buat Koneksinya
$con = mysqli_connect('localhost',$username,$password,$database);

// Cek koneksi *BISA SOBAT HAPUS NANTINYA 
if ($con) { 
	echo "Sukses"; 
} else { 
	echo "Gagal";
}


// ------------------------------------------------------------------------------- \\
?>