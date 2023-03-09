<?php
session_start();
// koneksi
$koneksi = new mysqli("localhost","root","","db_percetakanku");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Percetakan</title>
	<title>Percetakan</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<head>
<img class="tengah" src="../css/2.png" widht="400" height="400">
</head>
<body id="bg-login">
	<div class="box-login">
		<h1>Percetakan</h1>
		<h2>Login</h2>
		<form method="post">
			<div class="txt" required>
				<input type="email" name="email" placeholder="email" class="input-control">
			</div>
			<div class="txt_field">
				<input type="password" name="pass" placeholder="password" class="input-control">
			</div>
			<div class="pass">Forgot Password?<a href="Lupa.php" class="btn">Lupa</a>
			<input type="submit" name="login" value="Login">
			<br>
			<img class="google" src="../css/3.png" width="50" height="50">
		</form>
			<?php
	        if (isset($_POST['login']))
	        {
	            $ambil=$koneksi->query("SELECT * FROM admin WHERE email_ku='$_POST[email]' AND password = md5('$_POST[pass]')");
	            $yangcocok = $ambil->num_rows;
	            if ($yangcocok==1) 
	            {
	                $_SESSION['admin']=$ambil->fetch_assoc();
	                echo "<div class='alert alert-info'>Login Sukses</div>";
	                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	            }
	            else
	            {
	                echo '<script>alert("email atau password Anda salah!")</script>';
	                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	            }
	        }
	        ?>
	</div>
</body>
</html>