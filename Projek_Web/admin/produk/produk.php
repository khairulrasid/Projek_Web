<?php
session_start();
if($_SESSION['level']==""){
  echo "<script>alert('Login Dulu.');
  document.location.href ='./../../index.php?pesan=gagal';</script>";
}
  require '../../koneksi.php';
  if (isset($_POST['search'])) {
    $search=trim($_POST['search']);
  $result=mysqli_query($conn,"select * from produk where nama like '%".$search."%' or kategori like '%".$search."%' order by id asc");
  while($row = mysqli_fetch_assoc($result)){
    $produk[] =$row;
  }
}else {
  $result = mysqli_query($conn,"SELECT * FROM produk");
  $produk = [];
  while($row = mysqli_fetch_assoc($result)){
    $produk[] =$row;
  }
}
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Produk</title>
      <link rel="stylesheet" href="../css/style.css" />
      <link rel="stylesheet" href="../css/search.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
      <div class="sidebar">
        <h2>KDG STORE</h2>
        <ul class="nav">
          <li>
            <a href="../index.php">
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="produk.php">
              <span>Produk</span>
            </a>
          </li>
          <li>
          <a href="../logout.php">
              <span>Log Out</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="main">
      <div class="search">
        <form action="" method="post">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
        <a href="add.php" >
          <span class="add">Tambah Produk</span>
        </a>
          <table class="table">
              <tr>
              <th>id</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Tanggal Pembelian</th>
              <th>Gambar Produk</th>
        
              <th>Action</th>
              <tbody>
                <?php $i = 1; foreach($produk as $prk) :?>
              </tr>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $prk["nama"];?></td>
                <td><?php echo $prk["kategori"];?></td>
                <td>RP.<?php echo $prk["harga"];?></td>
                <td><?php echo $prk["tanggalpembelian"];?></td>
              <td><img src = "../../gambar/<?php echo $prk["gambar"]; ?>"style = "width:30px;height:30px;"></td>
             
                <td>
                  <a class="edit-button" href="edit.php?id=<?php echo $prk["id"];?>">edit</a>
                  <a class ="hapus-button" href="delete.php?id=<?php echo $prk["id"];?>">hapus</a>
                </td>
              </tr>
              <?php $i++; endforeach;?>
              </tbody>
          </table>
      </div>
    </body>
  </html>