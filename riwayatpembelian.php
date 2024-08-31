<?php 
require 'function.php';
require 'check.php';

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","db_toko_raudha");

$id_barang = "";
if(isset($_GET["id_barang"])){
    $id_barang = $_GET["id_barang"];
}
$sql_query = "select * from barang where id_barang = '$id_barang'";
$result = $conn->query($sql_query);
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
                font-size: 18px;
                margin-left: 50px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <ul class="nav justify-content-end">
                <li nav-item active><a class="nav-link" href="indexCustomer.php">Home</a></li>
                    <li nav-item><a class="nav-link" href="katalogbarang.php">Daftar Barang</a></li>
                    <li nav-item><a class="nav-link" href="beli.php">Form Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="riwayatpembelian.php">Riwayat Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="logoutCus.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        
        <br>
       
        <div class="container">
            <h2>Riwayat Pembelian</h2>
            <br>
            <div class="card-body">
                               <center> <div class="table-responsive" style="width: 90%;">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="" >
                                        <thead style="background-color: #68A7AD; text-align: center;">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Barang</th>
                                                <th>ID Customer</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Jumlah Keluar</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php
                                            $dataBarangKeluar = mysqli_query($conn, "select * from barang_keluar");
                                            $i = 1;
                                            while($data = mysqli_fetch_array($dataBarangKeluar)){
                                                $id_barang_keluar = $data['id_brg_keluar'];
                                                $id_barang = $data['id_barang'];
                                                $id_cus = $data['id_cus'];
                                                $tanggal_keluar = $data['tgl_keluar'];
                                                $jumlah_keluar = $data['jml_keluar'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $id_barang; ?></td>
                                                <td><?= $id_cus; ?></td>
                                                <td><?= $tanggal_keluar; ?></td>
                                                <td><?= $jumlah_keluar; ?></td>

                                            </tr>
                                        
                                            <?php
                                             };
                                            ?>
                                        </tbody>
                                    </table>
                                    </center>
                                </div>
                            </div>
        </div>
    </body>
</html>