<?php
session_start();
$koneksi = new mysqli("localhost","root","","db_percetakanku");

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <nav>
        <img class="tengah" src="../css/2.png" widht="50" height="50">
        <h2>Administrator</h2>    

                    <ul class="slide">
                        <li><a class="active-menu"  href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a class="tampilan" href="index.php?halaman=produk"><i class="fa fa-desktop"></i> Produk</a></li>
                        <li><a class="pembelian" href="index.php?halaman=pembelian"><i class="fa fa-qrcode"></i>Pembelian</a></li>
                        <li><a class="pembelian" href="index.php?halaman=laporan_pembelian"><i class="fa fa-qrcode"></i>Laporan</a></li>
                        <li><a class="pelanggan"  href="index.php?halaman=pelanggan"><i class="fa fa-bar-chart-o "></i> Pelanggan</a></li>
                        <li> <a class="logout" href="index.php?halaman=logout"><i class="fa fa-table"></i> Logout</a></li>
                    </ul>
                </ul>
               <div class="menu-toggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               <?php
               if (isset($_GET['halaman']))
               {
                    if ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    {
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan")
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail") 
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk")
                    {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk")
                    {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran")
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian")
                    {
                        include 'laporan_pembelian.php';
                    }
               }
               else
               {
                    include 'home.php';
               }
               ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>
    
