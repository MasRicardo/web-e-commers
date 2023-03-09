<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Percetakan</title>
	<title>Percetakan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="assets1/img/2.png" rel="icon">
</head>
<head>
<img class="tengah" src="css/2.png" widht="400" height="400">
</head>
<body id="bg-login">
	<div class="box-login">
		<h1>Percetakan</h1>
		<h2>Login</h2>
		<?php if (isset($_SESSION["pelanggan"])): ?> 
		<?php else: ?>
		<?php endif ?>
		<form method="post">
			<div class="txt" required>
				<input type="email" name="email" placeholder="email" class="input-control">
			</div>
			<div class="txt_field">
				<input type="password" name="pass" placeholder="password" class="input-control">
			</div>
			<div class="pass">Forgot Password?<a href="Lupa.php" class="btn">Lupa</a>
			<input type="submit" name="submit" value="Login"><a href="dashboard.php class=btn"></a>
			<div class="signup_link">
				Not a member? <a href="daftar.php" class="btn">Signup</a>
			<img class="google" src="css/3.png" width="50" height="50">
		</form>
		<?php
			if (isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$email = $_POST['email'];
				$pass = $_POST['pass'];

				$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND Password_pelanggan=md5('$pass')");

				$akunyangcocok = $ambil->num_rows;

				if ($akunyangcocok==1)
				{
					$akun = $ambil->fetch_assoc();
					$_SESSION['pelanggan'] = $akun;
					echo "<script>alert('anda sukses login');</script>";

					if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
					{
						
					echo "<script>location='checkout.php';</script>";
					}
					else
					{
						echo "<script>location='dashboard.php';</script>";
					}
				}
				else
				{
					echo "<script>alert('anda gagal login, periksa akun anda');</script>";
					echo "<script>location='login.php';</script>";
				}
			}
		
		?>
	</div>
</body>
</html>