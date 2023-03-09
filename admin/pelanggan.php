<br>
<h1>Data Pelanggan</h2>
<link href="assets/css/pelanggan.css" rel="stylesheet" />

<br>
<br>
<br>
<table style="margin-left: auto;margin-right: auto;" border="1">
	<thead>
		<tr>
			<th>&nbspNo&nbsp</th>
			<th>Username</th>
			<th>Email</th>
			<th>No telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah =$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href="" class="btn btn-danger">hapus</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>
