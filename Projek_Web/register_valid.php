<?php
require 'koneksi.php';
if(isset($_POST['daftar'])){
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['pass'];
  $email = $_POST['email'];
  if(!empty($nama) || !empty($username) || !empty($password) || !empty($email)){
    $cek=mysqli_query($conn,"SELECT * from user where email='$email' ");
    $jml=mysqli_num_rows($cek);
    if($jml>0){
      header("location:register.php?pesan=gagal");
    }else{
      $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO user (id_user, nama, username, pass,email,level) 
          VALUES ( '','$nama','$username','$password_encrypted','$email','user')";
      $result = mysqli_query($conn, $sql);
    if($result){
        echo"<script>
            alert('Anda berhasil Daftar');
            document.location.href ='index.php';
            </script>";
    }else{
        echo"<script>
        alert('Username harus benar!!');
        </script>";
    }
        }  
    }
  
}
?>