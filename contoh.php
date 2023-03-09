<?php
session_start();
$koneksi = new mysqli("localhost","root","","db_percetakanku");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>contoh</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
		  	<div class="row">
		    	<div class="col-25">
		      		<label>Foto Bukti</label>
		    	</div>
		    	<div class="col-75">
		      		<input type="file" class="from-control" name="bukti">
		      		<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
		    	</div>
		    	<button class="btn btn-primary" name="kirim">Kirim</button>
		  	</div>
		</form>
		<?php

if (isset($_POST["kirim"])) 
{

	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namabukti");

	$koneksi->query("INSERT INTO contoh(bukti)
		VALUES('$namafiks')");
}
?>

</body>
</html>