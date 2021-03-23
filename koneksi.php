<?php

$server = "localhost";
$user = "root";
$pass = "admin";
$database = "mydb";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

if (!$koneksi){
	echo "Koneksi database gagal : " . mysqli_connect_error();
} else {        
    $tampil = mysqli_query($koneksi, "SELECT * FROM produk order by desc");
    $data = mysqli_fetch_array($tampil);
    echo ("Koneksi database sukses $data");
}
?>

