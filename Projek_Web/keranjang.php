<?php
    ob_start();
    session_start();
    ob_end_clean();
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="uf-8">
	<meta charset="viewport" content="width=device-width, intial-scale=1">
	<title>KDG STORE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/produk.css">
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
			<h1><a href="index.html">KDG STORE</a></h1>
			<ul>
				<li><a href="Home.php">HOME</a></li>
				<li><a href="beranda.php">BELANJA</a></li>
				<li class="active"><a href="beranda.php"><i class="fas fa-shopping-basket"></i></a></li>
				<li><a href="beranda.php"><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
		</div>
	</header>
 <!-- product -->
 <section class="">
        <!-- <div class="container"> -->
            <div  class="maincard">
            <h2>PRODUK</h2>
                <?php
                    require 'koneksi.php';
                    $result = mysqli_query($conn, "SELECT * FROM produk order by id asc");
                    $i = 0;            
                    while($row = mysqli_fetch_assoc($result)){$i++;
                ?>
                <div class="card">
                    <img src="assets/<?=$row['gambar'];?>" class="content" width="350px"/>
                    <div class="deskrip">
                        <p><?=$row['nama'];?><br>Rp. <?=number_format($row['harga'],0,".",",");?>,-</p>
                    </div>
                    <a href="buy.php?id=<?php echo $row['id'] ?>"><button class="button-50" role="button" name="button">Beli Sekarang</button></a>
                </div>
                <?php
                }
                ?>
            </div>
        <!-- </div> -->
    </section>
	
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
</body>
</html>