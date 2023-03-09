<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>riwayat</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
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
	  <?php if (isset($_SESSION["pelanggan"])): ?>
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
<section class="riwayat">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php 
				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

				$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
				while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
					<td>
						<?php echo $pecah["status_pembelian"] ?>
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])): ?>
						Resi: <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>
					</td>
					<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">
							Input Pembayaran
						</a>
						<?php else: ?>
						<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">
							Lihat Pembayaran
						</a>
						<?php endif ?>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>
</body>
</html>