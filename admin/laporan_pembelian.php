<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
$status = "";
if (isset($_POST["kirim"])) 
{
	$tgl_mulai = $_POST['tglm'];
	$tgl_selesai = $_POST['tgls'];
	$status = $_POST['status'];
	$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

}

?>
<h1>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h1>
<link href="assets/css/laporan_pembelian.css" rel="stylesheet" />
<link href="assets/css/produk.css" rel="stylesheet" />


<div>
  <form method="post">
    <label for="fname">Tanggal Mulai</label>
    <input type="date" id="fname" name="tglm" value="<?php echo $tgl_mulai ?>">

    <label for="lname">Tanggal Selesai</label>
    <input type="date" id="lname" name="tgls" value="<?php echo $tgl_selesai ?>">

    <label>Status</label>
			<select class="form-control" name="status">
				<option value="">Pilih Status</option>
				<option value="lunas" <?php echo $status=="lunas"?"selected":""; ?> >Lunas</option>
				<option value="barang dikirim" <?php echo $status=="barang dikirim"?"selected":""; ?> >Barang Dikirim</option>
				<option value="batal" <?php echo $status=="batal"?"selected":""; ?> >Batal</option>
				<option value="sudah kirim pembayaran" <?php echo $status=="sudah kirim pembayaran"?"selected":""; ?> >Sudah kirim pembayarn</option>
				<option value="pending" <?php echo $status=="pending"?"selected":""; ?> >Pending</option>
			</select>

    <input type="submit" name="kirim" value="kirim">
  </form>
</div>

<table style="margin-left: auto;margin-right: auto;" border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian'] ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
		</tr>
	</tfoot>
</table>