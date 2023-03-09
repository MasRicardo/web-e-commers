<?php
session_start();
//koneksi de database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>daftar</title>
  <link rel="stylesheet" type="text/css" href="css/daftar.css">
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  <link href="assets1/img/2.png" rel="icon">


</head>
<body>
  <h2>Percetakan</h2>
  <h3>Daftar Akun</h3>
  <div class="cont">
  <form method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname">Nama</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="nama_pelanggan" placeholder="Tulis Nama...." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email</label>
    </div>
    <div class="col-75">
      <input type="email" id="lname" name="email_pelanggan" placeholder="Your email.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="lname" name="password_pelanggan" placeholder="Buat Password..." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">No. telepon</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="telepon_pelanggan" placeholder="No. telepon" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Alamat</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="alamat_pelanggan" placeholder="Tulis Alamat" style="height:200px" required></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" name="submit" value="Submit">
  </div>
  <a href="login.php" class="btn btn-primary">Kembali</a>
  </form>
  <?php
            if (isset ($_POST["submit"]))
            {
              $username = $_POST["nama_pelanggan"];
              $email = $_POST["email_pelanggan"];
              $password = $_POST["password_pelanggan"];
              $no_hp = $_POST["telepon_pelanggan"];
              $alamat = $_POST["alamat_pelanggan"];

              $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
              $yangcocok = $ambil->num_rows;
              if ($yangcocok==1)
              {
                echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
                echo "<script>location='daftar.php';</script>";
              }
              else
              {
                $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$username','$email',md5('$password'),'$no_hp','$alamat')");

                echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
                echo "<script>location='login.php';</script>";
              }

            }
            ?>
</div>
</body>
</html>