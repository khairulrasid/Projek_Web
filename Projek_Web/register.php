
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">  
    <title>Register</title>
</head>
<body>
<body>
<div class="container">
  <div class="form">
    <h1 class="main-text">Daftar</h1>
    <form class="register-form" method="post" action="register_valid.php">
      <input type="text" placeholder="nama" name="nama" required>
      <input type="text" placeholder="username" name="username"required>
      <input type="text" placeholder="email address" name="email" required>
      <input type="password" placeholder="password"name="pass" required>
      <button class="btn" type="submit" name="daftar">Registrasi</button>
      <h4><p class="message">Masuk <a href="index.php"></h>Sign In</a></p>
    </form>
  </div>
</div>
</body>
</html>