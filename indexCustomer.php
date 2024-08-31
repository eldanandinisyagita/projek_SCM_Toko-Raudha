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
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link href='https://fonts.googleapis.com/css?family=PT Sans Caption' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Solway&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Imprima&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Rufina&display=swap" rel="stylesheet" /> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="./main.css" rel="stylesheet" />
        <style>
            .container {
                position: relative;
            }

            .center {
                position: absolute;
                top: 50%;
                left: 60%;
                transform: translate(-32%, -60%);
                font-size: 51px;
                color: #061A0E;
                font-family: Solway;
                font-weight: 900;
                text-align: left;
            }
            .container img { 
                width: 100%;
                height: auto;
                padding-top: 10px;
            }
            .subcen {
                position: absolute;
                top: 78%;
                left: 60%;
                transform: translate(-40%, -100%);
                font-family: PT Sans;
                font-weight: normal;
                font-size: 20px;
                opacity: 1;
                text-align: left;
                color: #061A0E;
            }
            .sn a input[type="submit"]{
                position: absolute;
                top: 90%;
                left: 53%;
                transform: translate(-35%, -100%);
                font-size: 18px;
                font-family: Imprima;
                background-color: white; 
                border: none;
                color: #436C56;
                padding: 15.75px 60.75px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius : 4px;
                box-shadow: 4px 4px 4px grey;
            }
            .sn a input[type="submit"]:hover{
                box-shadow: none;
            }
            .vmp {
                float: left;
                margin-top: 72px;
            }
            .vmp .satu {
                color: black;
                font-family: Rufina;
                font-weight: 600;
                font-size: 32px;
                text-align: left;
                margin-left: 48px;
                margin-top: 100px;
            }
            .vmp .dua {
                color: black;
                font-family: PT Sans;
                font-weight: normal;
                font-size: 20px;
                text-align: left;
                margin-left: 48px;
                margin-top: 9px;
            }
            .vmp .tiga a input[type="submit"]{
                font-size: 18px;
                font-family: Imprima;
                background-color: white; 
                border: none;
                color: #436C56;
                padding: 15.75px 60.75px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius : 5px;
                box-shadow: 4px 4px 4px #D0DAD5;
                border: 1px solid #436c56;
                margin-top: 27px;
                margin-left: 48px;
            }
            .vmp .tiga a input[type="submit"]:hover{
                box-shadow: 4px 4px 4px #ffffff;
            }
            div.gallery {
                margin-top: 72px;
                margin-right: 48px;
                border: 1px solid #D0DAD5;
                float: right;
                width: 262.5px;
                border-radius: 5px;
                box-shadow: 4px 4px 4px #D0DAD5;
            }
            div.gallery:hover {
                border: 1px solid #436c56;
            }            
            div.gallery:active {
                border: 1px solid #436c56;
            }
            div.gallery img {
                width: 100%;
                height: auto;
            }
            div.desc {
                padding-top: 16.5px;
                text-align: left;
                padding-left: 9px;
                font-family: PT Sans;
                font-size: 15px;
                margin-bottom: 9px;
            }
            div.desc b {
                font-size: 18px;
            }
            .pc {
                width: 50vh;
                height: 450.75px;
                margin-top: 48px;
                margin-left: 48px;
                text-align: justify;
            }
            .pc .pns {
                font-family: Rufina;
                font-weight: 600;
                font-size: 36px;
                text-align: justify;
                margin-top: 200px;
                white-space: nowrap;
                
            }
            .pc .sh {
                font-family: PT Sans;
                font-weight: normal;
                font-size: 21px;
                text-align: justify;
                margin-top: 14.25px;
            }
            .pc .gtp {
                margin-top: 20.25px;
            }
            .pc .gtp a input[type="submit"]{
                font-size: 18px;
                font-family: Imprima;
                background-color: white; 
                border: none;
                color: #436C56;
                padding: 14px 28px;
                text-align: justify;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius : 5px;
                box-shadow: 4px 4px 4px #D0DAD5;
                border: 1px solid #436c56;
            }
            .pc .gtp a input[type="submit"]:hover{
                box-shadow: 4px 4px 4px #ffffff;
            }
            .green {
                margin-top: 62.25px;
                z-index: 1;
                left: 100px;
                width: 352px;
                height: 532px;
                background-color: #053D57;
                float: right;
            }
            .rrf {
                font-family: PT Sans;
                font-weight: bolder;
                font-size: 18px;
                text-align: left;
                margin-top: 61.5px;
                margin-bottom: 93px;
            }
            #container-2{
                width: 300px;
                height: 280px;
                background: none;
                margin: 10px;
                margin-right: 20px;
                display: inline-block;
                margin-top: 18px;
            }
            .container-box-1{
                width: 300px;
                height: 280px;
                background-color: white;
                border-radius: 10px;
                box-shadow: 5px 5px 5px rgb(197, 197, 197), -1px -1px 3px #e4e2e2;
            }
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
        <div class="container">

        <div class="vmp">
            <div class="satu">
                Barang Terlaris 
            </div>
            <div class="dua">
                Persediaan barang yang<br> paling banyak diminati
            </div>
            <div class="tiga">
                <a href="beli.php">
                    <input type="submit" value="BELI SEKARANG">
                </a>
            </div>
        </div>
        <div class="gallery" style="margin-right: 30px;">
            <a target="_blank" href="foto_barang\cimory.jpg">
                <img src="foto_barang\cimory.jpg" alt="Cinque Terre" width="600" height="400">
            </a>
            <div class="desc">
                <b>Rubber Tree</b><br>
                Rp. 35.000</div>
        </div>
        <div class="gallery" style="margin-right: 30px;">
            <a target="_blank" href="foto_barang\cimory.jpg">
                <img src="foto_barang\cimory.jpg" alt="Cinque Terre" width="600" height="400">
            </a>
            <div class="desc">
                <b>Rubber Tree</b><br>
                Rp. 35.000</div>
        </div>
        <div class="gallery" style="margin-right: 30px;">
            <a target="_blank" href="foto_barang\cimory.jpg">
                <img src="foto_barang\cimory.jpg" alt="Cinque Terr" width="600" height="400">
            </a>
            <div class="desc">
                <b>Monstera</b><br>
                Rp. 40.000</div>
        </div>
        <img src="assets\img\Keunggulan toko raudha.png" style="width: 100%; height: auto; padding-top: 72px;">       

        <div class="green"></div>
        <img src="assets\img\poto.jpg" 
             style="height: 455px; width: 660px; float: right;
             margin-top: 91.5px; transform: translate(40%, 2.5%);">
        <div class="pc">
            <div class="pns">
                Barang harian lengkap <br> 
                Selalu Tersedia
            </div>
            <div class="gtp">
                <a href="katalogbarang.php">
                    <input type="submit" value="Lihat Daftar Barang">
                </a>
            </div>
        </div>
    </body>
</html>