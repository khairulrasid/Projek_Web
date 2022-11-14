<?php 
require "koneksi.php";
ob_start();
session_start();
ob_end_clean();
date_default_timezone_set("Asia/Makassar");
$tanggal = date("Y-m-d H:i:s");
$user = $_SESSION['email'];
$tanggal1 =$_SESSION['time'];
$query = mysqli_query($conn, "UPDATE riwayat_login SET waktu_logout ='$tanggal' WHERE nama_user='$user' AND waktu_login='$tanggal1'");
if($query){
    echo " <script>
        alert('berhasil logout');
        document.location.href='index.php';
    </script>";
    session_unset();
    session_destroy();
}else{
    echo " <script>
    alert('gagal logout');
    document.location.href='Home.php';
    </script>";
}

 
header("location: index.php");
?>
















