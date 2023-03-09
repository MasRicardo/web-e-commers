<?php
session_start();
include 'koneksi.php';

$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>detail produk</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
  	<link rel="stylesheet" type="text/css" href="css/detail.css">
  	<link href="assets1/img/2.png" rel="icon">
</head>
<body>
<header>
	<div class="box-keranjang">
	    <a href="keranjang.php" class="btn btn-default"><img class="posisi" src="css/keranjang.png" width="20" height="20"></a>
	  </div>
	  <img class="poto" src="css/2.png" width="60" height="50"><a class="logo" href="dashboard.php">Percetakan</a>
	<div class="dropdown">
	<button class="dropbtn">Menu</button>
	  <div class="dropdown-content">
	  <?php if (isset($_SESSION["admin"])): ?>
	    <a href="#">Profile</a> 
	    <a href="logout.php">Logout</a>
	    <a href="riwayat.php">Riwayat</a>
	  <?php else: ?>
	    <a href="login.php">Login</a>
	    <a href="daftar.php">Daftar</a>
	  <?php endif ?>
	</div>
	</div>
	<ul>
	  <li><a href="dashboard.php">Produk</a></li>
	  <li><a href="#news">Bantuan</a></li>
	  <li><a href="#contact">Contact</a></li>
	</ul>
</header>
<section class="banner"></section>

<script type="text/javascript">
  window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>
<br>
<br>
<br>
<br>
<br>
<br>

<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_produk"] ?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
				<h5>Stok: <?php echo $detail['stok_produk'] ?></h5>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
						</div>
					</div>
					<div class="tombol">
						<button class="btn btn-primary" name="beli" style="margin-bottom: 50px;">Beli</button>
					</div>
				</form>
				<p><?php echo $detail["deskripsi_produk"]; ?></p>
			</div>
		<?php

		if (isset($_POST["beli"]))
		{
			$jumlah = $_POST["jumlah"];

			$_SESSION["keranjang"][$id_produk] = $jumlah;

			echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
			echo "<script>location='keranjang.php';</script>";
		}
		?>
	</div>
</section>
</body>
</html>