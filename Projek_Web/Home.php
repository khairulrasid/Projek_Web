<?php
session_start();
if($_SESSION['level']== ""){
    echo "<script>alert('Login Dulu.');
    document.location.href ='index.php?pesan=gagal';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="hero">
        <div class="navbar">
        </div>
        <div class="content">
            <small>WELCOME TO KDG STORE</small><br>
            <h2>APPSTORE</span></h2>
            <a href="beranda.php"><button type="button" > EXPLORE  </button></a>
        </div>
        
            </div> -->
        </div>
    </div>

</body>

</html>