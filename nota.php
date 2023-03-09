<?php
session_start();
$koneksi = new mysqli("localhost","root","","db_percetakanku");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>nota pembelian</title>
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

<section class="konten">
	<div class="container">
		
<br>
<br>
<br>
<br>
<br>
<h1>Detail Pembelian</h1>
<link href="assets/css/detail.css" rel="stylesheet" />
<div class="container">
	<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
	?>

	<?php
	$idpelangganyangbeli = $detail["id_pelanggan"];

	$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

	if ($idpelangganyangbeli!==$idpelangganyanglogin) 
	{
		echo "<script>alert('Hayoo lohh');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}
	?>
</div>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
			<?php echo $detail['telepon_pelanggan']; ?> <br>
			<?php echo $detail['email_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota'] ?></strong><br>
		Ongkos kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat: <?php echo$detail['alamat_pelanggan']; ?>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga</th>
			<th>Berat</th>
			<th>jumlah</th>
			<th>subberat</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> Kg.</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> Kg.</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke<br>
				<strong>BANK BRI 0866-01-004603-50-1 AN. Ricardo Dharma Saputra</strong>
			</p>
		</div>
	</div>	
</div>

</section>
</body>
</html>