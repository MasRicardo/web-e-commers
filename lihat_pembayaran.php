<?php
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)) 
{
	echo "<script>alert('belum ada data pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}


if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) 
{
	echo "<script>alert('anda tidak berhak melihat pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>lihat pembayaran</title>
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
<div class="container">
	<h3>Lihat Pembayaran</h3>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?php echo $detbay["nama"] ?></td>
				</tr>
				<tr>
					<th>Bank</th>
					<td><?php echo $detbay["bank"] ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $detbay["tanggal"] ?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
				</tr>
			</table>	
		</div>
		<div class="col-md-6">
			<img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
		</div>
	</div>
</div>
</body>
</html>