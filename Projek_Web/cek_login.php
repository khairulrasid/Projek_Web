<?php 
ob_start();
session_start();
ob_end_clean();
include 'koneksi.php';
 
$email = $_POST['email'];
$password = $_POST['pass'];

$login = mysqli_query($conn,"SELECT * from user where email='$email'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	$data = mysqli_fetch_assoc($login);

	if(password_verify($password, $data['pass'])) {
		if($data['level']=="admin"){
			$_SESSION['email'] = $email;
			$_SESSION['level'] = "admin";
			date_default_timezone_set("Asia/Makassar");
			$tanggal = date("Y-m-d H:i:s");
			$_SESSION['time'] = $tanggal;
			$queryhistory = mysqli_query($conn,"INSERT INTO riwayat_login (nama_user, waktu_login) VALUES('$email', '$tanggal')");
	
			header("location:./admin/index.php");
			
		}else if($data['level']=="user"){
			$_SESSION['email'] = $email;
			$_SESSION['level'] = "user";
			date_default_timezone_set("Asia/Makassar");
			$tanggal = date("Y-m-d H:i:s");
			$_SESSION['time'] = $tanggal;
			$queryhistory = mysqli_query($conn,"INSERT INTO riwayat_login (nama_user, waktu_login) VALUES('$email', '$tanggal')");
	
			header("location:Home.php");


		}else{
			header("location:index.php?pesan=gagal1");
		}
	}else{
		header("location:index.php?pesan=wrongpass");
	}	
}else{
	header("location:index.php?pesan=gagal2");
}
 
?>