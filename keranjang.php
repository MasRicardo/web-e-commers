<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Percetakan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/dashboardkeranjang.css">
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
<br>
<br>
<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
					</td> 
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>

		<a href="dashboard.php" class="btn btn-default">Lanjut</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>

</body>
</html>