<br>
<h1>Data Pembelian</h1>
<link href="assets/css/pembelian.css" rel="stylesheet" />

<table style="margin-left: auto;margin-right: auto;" border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian'] ?></td>
			<td><?php echo number_format($pecah['total_pembelian']); ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>

				<?php if ($pecah['status_pembelian']=="sudah kirim pembayaran"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>