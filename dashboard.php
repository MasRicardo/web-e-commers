<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard1.css">
  <link href="assets/css/produk.css" rel="stylesheet" />
  <link href="assets1/img/2.png" rel="icon">
</head>
<body >
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
	  <li><a href="kontak.php">Contact</a></li>
	  <form action="pencarian.php" method="get" class="from-control">
		  <li><input type="text" name="keyword" placeholder="Search.."></li>
		  <button class="btn btn-primary">Cari</button>		
		</form>
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
<section class="konten">
  <div class="container">
    <h1>Produk</h1>
    
    <div class="row">
      <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
      <?php while($perproduk = $ambil->fetch_assoc()){ ?>
      <div class="col-md-3">
        <div class="thumbnail">
          <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
          <div class="caption">
            <h3><?php echo $perproduk['nama_produk']; ?></h3>
            <h5><?php echo number_format($perproduk['harga_produk']); ?></h5>
            <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-default">Detail</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  
</section>

</body>
</html>