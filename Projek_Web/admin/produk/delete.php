<?php
require '../../koneksi.php';
$id =$_GET['id'];
$result =mysqli_query($conn, "DELETE FROM produk Where id =$id");
if($result){
    echo"<script>
        alert('Data Produk Berhasil Dihapus');
        document.location.href ='produk.php';
        </script>";
  }else{
    echo"<script>
    alert('Data Produk Gagal Dihapus');
    document.location.href ='produk.php';
    </script>";
}
?>