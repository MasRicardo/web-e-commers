<h2>Tambah Produk</h2>
<link rel="stylesheet" type="text/css" href="assets/css/tambahproduk.css">

<div class="container">
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-25">
				<label for="fname">Nama Produk</label>
			</div>
			<div class="col-75">
				<input type="text" id="fname" name="nama" placeholder="nama produk">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="fname">Harga (Rp)</label>
			</div>
			<div class="col-75">
				<input type="number" id="fname" name="harga" placeholder="Harga">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="fname">Berat</label>
			</div>
			<div class="col-75">
				<input type="number" id="fname" name="berat" placeholder="Stok Barang">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="fname">Ganti foto</label>
			</div>
			<div class="col-75">
				<input type="file" id="fname" name="foto" placeholder="foto">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="fname">Deskripsi</label>
			</div>
			<div class="col-75">
				<textarea type="text" id="fname" name="deskripsi" placeholder="Deskripsi"></textarea>
			</div>
		</div>
		<input type="submit" name="save">
	</form>
</div>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
