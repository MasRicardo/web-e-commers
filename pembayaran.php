<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];

$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli) 
{
	echo "<script>alert('Hayoo LOHH');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
  	<link rel="stylesheet" type="text/css" href="css/checkout.css">
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
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim bukti pembayaran Anda disini</p>
		<div class="alert alert-info">total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></div>
		
	  	<form method="post" enctype="multipart/form-data">
		 	<div class="row">
		    	<div class="col-25">
		      		<label>Nama Penyetor</label>
		    	</div>
		    	<div class="col-75">
		      		<input type="text" class="from-control" name="nama">
		    	</div>
		  	</div>
		  	<div class="row">
		    	<div class="col-25">
		      		<label>Bank</label>
		    	</div>
		    	<div class="col-75">
		      		<input type="text" class="from-control" name="bank">
		    	</div>
		  	</div>
		  	<div class="row">
		    	<div class="col-25">
		      		<label>Jumlah</label>
		    	</div>
		    	<div class="col-75">
		      		<input type="number" class="from-control" name="Jumlah" min="1">
		    	</div>
		  	</div>
		  	<div class="row">
		    	<div class="col-25">
		      		<label>Foto Bukti</label>
		    	</div>
		    	<div class="col-75">
		      		<input type="file" class="from-control" name="bukti">
		      		<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
		    	</div>
		    	<button class="btn btn-primary" name="kirim">Kirim</button>
		  	</div>
		</form>
	</div>

<?php

if (isset($_POST["kirim"])) 
{

	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namabukti");
	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["Jumlah"];
	$tanggal = date("Y-m-d");

	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
		VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namabukti')");

	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");
	echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
</body>
</html>