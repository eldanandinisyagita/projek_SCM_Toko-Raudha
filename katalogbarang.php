<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","db_toko_raudha");

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Halaman Customer</title>
        <link rel="stylesheet" href="css/styles.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            li{
                font-size: 20px;
                margin-left: 50px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <ul class="nav justify-content-end" style="margin-left: 90px;">
                    <li nav-item active><a class="nav-link" href="indexCustomer.php">Home</a></li>
                    <li nav-item><a class="nav-link" href="katalogbarang.php">Daftar Barang</a></li>
                    <li nav-item><a class="nav-link" href="beli.php">Form Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="riwayatpembelian.php">Riwayat Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="logoutCus.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        
        <br>
        <section class="konten">
            <div class="container">
                <h2>Katalog Produk</h2>
                <br>
                <div class="row">
                    <?php $ambil = $conn->query("select*from barang");?>
                    <?php while($card = $ambil->fetch_assoc()){?>

                
                    <div class="col-md-3">
                        <div class="card shadow" style="width: 16rem; margin-bottom: 50px; margin-left: 20px;">
                            <img class="card-img-top" src="foto_barang/<?php echo $card['foto_barang'];?>" alt="">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 20px;"><?php echo $card['nama_barang'];?></h4>
                                <h5 class="card-text">RP. <?php echo number_format($card['harga_barang']);?></h5>
                                <h5 class="card-text">Stok : <?php echo number_format($card['stok']);?></h5>
                            </div>
                        </div>
                    </div>
                    <?php     }?>
                </div>
               <center> <a href="beli.php" class="btn btn-primary" style="width: 70%; height: 30%;">Beli</a></center>
            </div><br><br>
        </section>
    </body>
</html>