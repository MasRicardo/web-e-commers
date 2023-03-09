<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>kontak</title>
	<link rel="stylesheet" type="text/css" href="css/kontak.css">
	<link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!--penting-->
  	<link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"><!--penting contact line 68-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/checkout.css">
  	<link href="assets1/css/style.css" rel="stylesheet">

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


<br>
<br>
<br>
 <section id="contact" class="contact">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          Produk-produk Percetakan di sini menggunakan bahan yang sangat bagus sesuai permintaan dari customer. Customer bisa Costum di sini tinggal hubungi kontak yang sudah tersedia di bawah ini para customer tinggal hubungi saja.
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Kyai Tapa No.1, RT.6/RW.16, Grogol, Kec. Grogol petamburan, Kota Jakarta Barat</p>
              </div>

              <div class="email mt-4">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>ricardo064002000040@std.trisakti.ac.id</p>
              </div>

              <div class="phone mt-4">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+62 895365161071</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->



  <script src="assets1/vendor/aos/aos.js"></script>
  <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets1/vendor/php-email-form/validate.js"></script>

  <script src="assets1/js/main.js"></script>

</body>
</html>