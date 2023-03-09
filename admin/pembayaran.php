<h1>Data Pembayaran</h1>
<link rel="stylesheet" type="text/css" href="css/pembayaran.css">
<link href="assets/css/produk.css" rel="stylesheet" />


<?php

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>


<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['nama'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail['bank'] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
			</tr>
			<tr>
				<th>Bukti</th>
				<td>
					<img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
				</td>
			</tr>
		</table>
	</div>
</div>

<form method="post">
    <label for="fname">No Resi Pengiriman</label>
    <input type="text" class="from-control" name="resi">

    <label for="country">Status</label>
    <select id="country" name="status">
      <option value="">Pilih Status</option>
      <option value="lunas">Lunas</option>
      <option value="barang dikirim">Barang Dikirim</option>
      <option value="batal">Batal</option>
    </select>
  
    <input type="submit" name="proses" value="Submit">
  </form>

  <?php
  if (isset($_POST["proses"])) 
  {
  	$resi = $_POST["resi"];
  	$status = $_POST["status"];
  	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

  	echo "<script>alert('data pembelian terupdate');</script>";
  	echo "<script>location='index.php?halaman=pembelian';</script>";
  }
?>