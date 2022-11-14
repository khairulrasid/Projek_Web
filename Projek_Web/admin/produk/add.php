<?php
session_start();
if($_SESSION['level']==""){
  header("location:./index.php?pesan=gagal");
}
require '../../koneksi.php';

if(isset($_POST['tambah'])){
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $gambar = $_FILES['gambar_produk']['name'];
  $tanggalpembelian=$_POST['tanggal'];
  
  $target_dir = "../../gambar/";
  $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($imageFileType,$extensions_arr) ){
    if(move_uploaded_file($_FILES["gambar_produk"]["tmp_name"],$target_dir.$gambar)){
  
  $sql = "INSERT INTO produk (id, nama,kategori,harga,gambar,tanggalpembelian) 
          VALUES ( '','$nama','$kategori','$harga','$gambar','$tanggalpembelian')";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo"<script>
        alert('Data Produk Berhasil Ditambahkan');
        document.location.href ='produk.php';
        </script>";
  }else{
    echo"<script>
    alert('Data Produk Gagal Ditambahkan');
    document.location.href ='add.php';
    </script>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/crud.css">
  </head>
  <body>
    <div class="sidebar">
      <h2>KDG STORE</h2>
      <ul class="nav">
        <li>
          <a href="./index.php">
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="produk.php">
            <span>Produk</span>
          </a>
        </li>
       
      </ul>
    </div>
    <div class="main">
        <form action="" method="POST" enctype="multipart/form-data">
          
            <div class="container">
              <h1>Tambah Produk</h1>
              <hr>
              <label for="name"><b>Nama Produk</b></label>
              <input type="text" placeholder="masukan Nama" name="nama" required>
              <label for="tanggal"><b>Tanggal Ditambah</b><br></label>
              <input type="datetime-local" placeholder="Masukan tanggal" name="tanggal" id="tgl" required><br>
              <label for="gambar"><b>Gambar</b><br></label>
              <input type="file" placeholder="Masukan gambar" name="gambar_produk" required><br><br>
              <label for="kategori"><b>Kategori</b></label>
              <input type="text" placeholder="masukan kategori" name="kategori" required>
              <label for="harga"><b>Harga</b></label>
              <input type="number" placeholder="masukan harga" name="harga" required>
              <hr>
              <button type="submit" class="addbtn" name="tambah">Tambah Produk</button>
            </div>
          </form>          
    </div>
  </body>
</html>