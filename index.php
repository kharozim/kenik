<?php

$server = "localhost";
$user = "root";
$pass = "admin";
$database = "mydb";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan di klik
if(isset($_POST['bsimpan'])){
  $simpan = mysqli_query($koneksi,"INSERT INTO `produk` (`nama`, `kategori`, `deskripsi`, `harga`, `id`, `gambar`)
                                    VALUES (
                                    '$_POST[tnama]', 
                                    '$_POST[tkategori]', 
                                    '$_POST[tdeskripsi]', 
                                    '$_POST[tharga]',
                                      '', 
                                      '')"
                        );
  if($simpan){
    echo "<div class='alert alert-success' >Success</div>";
  }
  else{
    echo "<div class='alert alert-danger'>Gagal</div>";
  }
                    
                        

} 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Ini Produku</h1>

      <!-- card -->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">Data Produk</div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="tname" class="form-control" placeholder="Input Nama produk anda disini" required />
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="tdeskripsi" class="form-control" placeholder="Input Deskripsi produk anda disini"></textarea>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="tharga" class="form-control" placeholder="Input Harga produk anda disini" required />
            </div>
            <div class="form-group mt-10">
              <label>Kategori</label>
              <select name="tkategori" class="form-control">
                <option value="Baju">Baju</option>
                <option value="Celana">Celana</option>
                <option value="Aksesoris">Aksesoris</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success mt-3" name="btsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger mt-3" name="btreset">Kosongkan</button>
          </form>
        </div>
      </div>
      <!-- end card  -->

      <!-- card table -->
      <div class="card mt-3">
        <div class="card-header bg-success text-white">List Produk</div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Description</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT*from produk order by id desc");
            while($data = mysqli_fetch_array($tampil)):
            ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data['nama'];?></td>
              <td><?=$data['kategori'];?></td>
              <td><?=$data['deskripsi'];?></td>
              <td><?=$data['harga'];?></td>
              <td>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Hapus</a>
              </td>
      
            </tr>
            <?php endwhile;  ?>
            <!-- penutup while -->
          </table>
        </div>
      </div>
      <!-- end card table  -->
    </div>
    <script src="assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
