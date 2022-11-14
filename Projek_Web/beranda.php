<?php
if ( isset($_SESSION["user"])) {
    header("Location:user.php");
    exit;
  }
  require 'koneksi.php';
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
<html>
<head>
	<meta charset="uf-8">
	<meta charset="viewport" content="width=device-width, intial-scale=1">
	<title>KDG STORE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="medsos">
		<div class="container">
			<ul>
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>
				<li><a href="#"><i class="fab fa-youtube"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>
	<header>
		<div class="container">
			<h1><a>KDG STORE</a></h1>
			<ul>
				<li><a href="Home.php">HOME</a></li>
				<li class="active"><a href="beranda.php">PRODUK</a></li>
				<li><a href="keranjang.php"><i class="fas fa-shopping-basket"></i></a></li>
                <li><a href="aboutme.php"><i class="fas fa-address-book"></i></a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
                <li><a class="#Dark" onclick = ubahwarna()><i class="fas fa-adjust"></i></a></li>

			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>BERANDA</p>
		</div>
	</section>

	<!-- gambar -->
	<selection class="gambargerak">
		<div align="center">
			<marquee width ="1200">
				<img src="gambar/1.jpg" height="100">
				<img src="gambar/2.jpg" height="100">
				<img src="gambar/3.jpg" height="100">
				<img src="gambar/4.jpg" height="100">
				<img src="gambar/5.jpg" height="100">
				<img src="gambar/6.jpg" height="100">
				<img src="gambar/7.jpg" height="100">
				<img src="gambar/9.jpg" height="100">
				<img src="gambar/10.jpg" height="100">
				<img src="gambar/11.jpg" height="100">
				<img src="gambar/12.jpg" height="100">
				<img src="gambar/13.jpg" height="100">
				<img src="gambar/14.jpg" height="100">
				<img src="gambar/15.jpg" height="100">
				<img src="gambar/16.jpg" height="100">
				<img src="gambar/17.jpg" height="100">
				<img src="gambar/18.jpg" height="100">
				<img src="gambar/19.jpg" height="100">
			</marquee>
		</div>
	</selection>
<!-- kategori -->
<section class="kategori">
		<div class="container">
			<h3>KATEGORI</h3>
			<div class="box">
				<div class="col-7">
					<div class="icon"><i class="fas fa-box"></i></div>
					<h4>Macintosh</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-mobile-alt"></i></div>
					<h4>iPod</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-mobile-alt"></i></div>
					<h4>iPhone</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-tablet"></i></div>
					<h4>iPad</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-clock"></i></div>
					<h4>Apple Watch</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-tv"></i></div>
					<h4>Apple TV</h4>
				</div>
				<div class="col-7">
					<div class="icon"><i class="fas fa-laptop"></i></div>
					<h4>macOS</h4> <br><br>
				</div>
			</div>
		</div>
	</section>

	<!-- recomendasi -->
	<div class="rekomendasi">
		<h3>PRODUK</h3>
	</div>


	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - KDG STORE. All Right reserves.</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function() {
			$(".bg-loader").hide();
		})
	</script>
     <script src="javascript.js"></script>
</body>
</html>