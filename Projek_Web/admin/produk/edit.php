<?php
session_start();
if($_SESSION['level']==""){
  echo "<script>alert('Login Dulu.');
  document.location.href ='./../../index.php?pesan=gagal';</script>";
}
require '../../koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM produk WHERE id = $id");
$prk =[];

while($row = mysqli_fetch_assoc($result)){
  $prk[] = $row;
}

$prk = $prk[0];

if(isset($_POST['ubah'])){
  $id =$_POST['id'];
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
  
      $sql = "UPDATE produk set nama ='$nama', kategori='$kategori', harga ='$harga',gambar='$gambar',tanggalpembelian='$tanggalpembelian'where id = $id";
      $result = mysqli_query($conn,$sql);
    
      if($result){
        echo"<script>
            alert('Data Produk Berhasil Diubah');
            document.location.href ='produk.php';
            </script>";
      }else{
        echo"<script>
        alert('Data Produk Gagal Diubah');
        document.location.href ='edit.php';
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
    <title>Ubah Produk</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/crud.css"/>
  </head>
  <body>
    <div class="sidebar">
      <h2>KR STORE</h2>
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
              <h1>Ubah Produk</h1>
              <hr>
              <input type="hidden" name="id" value="<?php echo $prk['id']?>">
              <label for="nama"><b>Name</b></label>
              <input type="text" placeholder="Masukan Nama" name="nama" value="<?php echo $prk['nama']?>"required>
              <label for="tanggal"><b>Tanggal Pembelian</b><br></label>
              <input type="datetime-local" placeholder="Masukan tanggal" value="<?php echo $prk['tanggalpembelian']?>" name="tanggal" id="tgl" required><br>
              <label for="gambar"><b>Gambar</b><br></label>
              <input type="file" placeholder="Masukan gambar" value="<?php echo $prk['gambar']?>" name="gambar_produk" required><br><br>
              <label for="kategori"><b>Kategori</b></label>
              <input type="text" placeholder="Masukan harga" name="kategori" value="<?php echo $prk['kategori']?>" required>
              <label for="harga"><b>harga</b></label>
              <input type="text" placeholder="Masukan harga" name="harga" value="<?php echo $prk['harga']?>"required>
              <hr>
              <button type="submit" class="addbtn" name="ubah" >Ubah Produk</button>
            </div>
          </form>          
    </div>
  </body>
</html>