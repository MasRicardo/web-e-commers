<link href="assets/css/produk.css" rel="stylesheet" />
<br>
<h1>Data Produk</h1>
<br>
<table style="margin-left: auto;margin-right: auto;" border="1">
	<thead>
		<tr>
			<th>&nbspNo&nbsp</th>
			<th>&nbspNama&nbsp</th>
			<th>&nbspHarga&nbsp</th>
			<th>&nbspDeskripsi&nbsp</th>
			<th>Berat</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>&nbspAksi&nbsp</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $pecah['nama_produk']; ?></td>
		<td><?php echo number_format($pecah['harga_produk']); ?></td>
		<td><?php echo $pecah['deskripsi_produk']; ?></td>
		<td><?php echo $pecah['berat_produk']; ?></td>
		<td><?php echo $pecah['stok_produk']; ?></td>
		<td>
			<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
		</td>
		<td>
			<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger">hapus</a>
			<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
		</td>
	</tr>
	<?php $nomor++;?>
	<?php } ?>
</tbody>
</table>
<div class="box-data">
	<a href="index.php?halaman=tambahproduk" class="posisi">Tambah Data</a>
</div>