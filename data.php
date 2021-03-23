<?php

require_once('helper.php');

$query = "SELECT * FROM produk";
$sql = mysqli_query($db_connect, $query);


if($sql){
$result = array();
    while($row = mysqli_fetch_array($sql)){
        array_push($result, array(
            'id' => $row['id'],
            'name' => $row['nama'],
            'category' => $row['kategori'],
            'description' => $row['deskripsi'],
            'price' => $row['harga']
        ));
    }
    echo json_encode(array('data' => $result));
}


?>