<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./css/login.css">
<title>KDG STORE-Toko Online Terpercaya </title>
</head>
<body>
    <header class="showcase">
        

            <div class="logo">
                <img src="merk.jpg">
            </div>

            <div class="showcase-content">
                <div class="formm">
                    <form action="cek_login.php" method="post">
                        <h1>Sign In</h1>
                        <div class="info">
                            <input class="email" type="email" placeholder="Email" name="email"> <br>
                            <?php
                             if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="wrongpass"){
                                    echo "Password salah !!";
                                }
                            }
                            ?>
                            <input class="email" type="password" placeholder="Password" name="pass"> <br>
                            <?php 
                                if(isset($_GET['pesan'])){
		                            if($_GET['pesan']=="gagal2"){
                                        echo "email salah !!";
                                    }
	                            }
                            ?>
                        </div>
                        <div class="btn">
                            <button class="btn-primary" type="submit" value="login">Sign In</button>
                        </div>
                    </form>
    
                </div>
                <div class="signup">
                    <p>Belum Punya Akun?</p>
                    <a href="register.php">Daftar Sekarang</a>
                </div>
            </div>
    </header>


</body>
</html>


