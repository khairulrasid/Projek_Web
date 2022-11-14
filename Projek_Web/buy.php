<?php
    require "koneksi.php";
    ob_start();
    session_start();
    ob_end_clean();
    // if(isset($_SESSION["username"])){
    // }else{
    //     echo "<script>
    //     alert('Silahkan Login Terlebih Dahulu');
    //     document.location.href = 'product.php';
    //   </script>";
    // }
    // $username = $_SESSION['username'];
    // $tanggal1 = $_SESSION['time'];
    if(isset($_GET['id'])){
        $query = mysqli_query($conn, "SELECT * FROM produk WHERE id=$_GET[id]");
        $result = mysqli_fetch_array($query);
        $nama = $result['nama'];
        $harga = $result['harga'];
    }

    if(isset($_POST['submit'])){
        $namalengkap = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $cc = $_POST['kartu'];
        $tanggal = date("Y-m-d H:i:s");
        $query = mysqli_query($conn,"INSERT INTO pembelian (nama_produk,total_bayar,nama_lengkap,email_pembeli,alamat_pembeli,nomor_cc,tanggal_transaksi)  VALUES('$nama', '$harga','$namalengkap','$email','$alamat','$cc','$tanggal')");
        if($query){
            echo "<script>
                alert('Pembelian Berhasil, Silahkan Cek Email Anda');
                document.location.href = 'keranjang.php';
            </script>";
        }else {
            echo error_log ("tambah data error");
            echo "<script>
            alert('Gagal Diubah');  
            </script>";
        }
    }
        
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/masuk.css">
    <title>Beli Produk</title>
</head>
<body>
    <div class="fullv">
    <div class="container">

        <div class="judul">
            <h2>Form Pembayaran</h2>
        </div>
        
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">

                <label for="produk">Produk yang dibeli</label><br>
                <input type="text" name="produk" class="input" value="<?= $nama?>" readonly><br>

                <label for="produk">Harga Produk</label><br>
                <input type="text" name="produk" class="input" value="Rp. <?= number_format($harga,0,".",",")?>,-" readonly><br>

                <label for="nama">Nama Lengkap</label><br>
                <input type="text" name="nama" class="input" placeholder="Masukkan nama" required autofocus><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Masukkan email"required><br>

                <label for="alamat">Alamat</label><br>
                <textarea type="text" name="alamat" class="input" placeholder="Masukkan alamat"required></textarea><br>

                <label for="kartu">Nomor Kartu Kredit</label><br>
                <input type="number" name="kartu" class="input" min="0" placeholder="Masukkan nomor cc"><br>

                <input type="submit" name="submit" class="submit" value="Beli Sekarang"><br><br>
            </form>
        
        </div>
    </div>
    </div>
</body>
</html>