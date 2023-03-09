<?php
session_start();
include 'koneksi.php';
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
While($pecah = $ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pencarian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard1.css">
	<link href="assets1/img/2.png" rel="icon">
</head>
<body>

<header>
	<div class="box-keranjang">
	    <a href="keranjang.php" class="btn btn-default"><img class="posisi" src="css/keranjang.png" width="20" height="20"></a>
	  </div>
	  <img class="poto" src="css/2.png" width="60" height="50"><a class="logo" href="index.php">Percetakan</a>
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
	  <form action="pencarian.php" method="get" class="from-control">
		  <li><input type="text" name="keyword" placeholder="Search.."></li>
		  <button class="btn btn-primary">Cari</button>		
		</form>
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
	<div class="container">
		<h3>Hasil Pencarian : <?php echo $keyword ?></h3>
		
		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
		<?php endif ?>
		<div class="row">

			<?php foreach ($semuadata as $key => $value): ?>

			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $value["foto_produk"] ?>" alt="" class="img-responsive">
					<div class="caption">
						<h3><?php echo $value["nama_produk"] ?> produk</h3>
						<h5>Rp. <?php echo number_format($value['harga_produk']) ?></h5>
						<a href="beli.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php endforeach ?>

		</div>
	</div>
</body>
</html>