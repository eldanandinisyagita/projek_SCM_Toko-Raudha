<?php

require 'function.php';
require 'check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Halaman Customer</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            li{
                font-size: 18px;
                margin-left: 50px;
            }
            * {box-sizing: border-box;}
            body {font-family: Verdana, sans-serif;}
            .mySlides {display: none;}
            img {vertical-align: middle;}

            /* Slideshow container */
            .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
            }

            /* Caption text */
            .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 1.5ss ease;
            }

            .active {
            background-color: #717171;
            }

            /* Fading animation */
            .fade {
            animation-name: fade;
            animation-duration: 1.5s;
            }

            @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -90px;">
                <ul class="nav justify-content-end" style="margin-left: 90px;">
                    <li nav-item active><a class="nav-link" href="indexCustomer.php">Home</a></li>
                    <li nav-item><a class="nav-link" href="katalogbarang.php">Daftar Barang</a></li>
                    <li nav-item><a class="nav-link" href="beli.php">Form Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="riwayatpembelian.php">Riwayat Pembelian</a></li>
                    <li nav-item><a class="nav-link" href="logoutCus.php">Logout</a></li>
                </ul>
            
        </nav>

        <section class="konten">
        <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                <div class="slideshow-container">

                        <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="foto_barang\indomie.jpg" style="width:70%">
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="foto_barang\roma.jpg" style="width:70%">
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="foto_barang\ichitan.jpg" style="width:70%">
                        </div>

                        </div>
                        <br>

                        <div style="text-align:left; margin-left: 200px;">
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                        </div>

                        <script>
                        let slideIndex = 0;
                        showSlides();

                        function showSlides() {
                        let i;
                        let slides = document.getElementsByClassName("mySlides");
                        let dots = document.getElementsByClassName("dot");
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";  
                        }
                        slideIndex++;
                        if (slideIndex > slides.length) {slideIndex = 1}    
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";  
                        dots[slideIndex-1].className += " active";
                        setTimeout(showSlides, 2000); // Change image every 2 seconds
                        }
                        </script>

                </div>
                <div class="signup-form">
                    <form method="post" class="register-form" >
                        <h2 style="margin-top: -10px; padding-bottom: 12px;">Form Pembelian</h2>
                        <div class="form-group">
                            <label for="address" style="margin-bottom: 10px;">Username :</label>
                            <div class="form-select">
                                    <select name="customer" class="form-control" >
                                    <?php
                                    $takeData = mysqli_query($conn, "select * from customer");
                                    while($fetcharray = mysqli_fetch_array($takeData)){ 
                                        $pilnamastaff = $fetcharray['username'];
                                        $pilidstaff = $fetcharray['id_cus'];
                                        ?>
                                    <option value="<?=$pilidstaff;?>"><?=$pilnamastaff;?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="state" style="margin-bottom: 10px;">Pilih Barang :</label>
                                <div class="form-select">
                                    <select name="barang" class="form-control">
                                                    <?php
                                                        $takeData = mysqli_query($conn, "select * from barang");
                                                        while($fetcharray = mysqli_fetch_array($takeData)){
                                                            $pilnamabarang = $fetcharray['nama_barang'];
                                                            $pilidbarang = $fetcharray['id_barang'];
                                                    
                                                    ?>
                                                    <option value="<?=$pilidbarang;?>"><?=$pilnamabarang;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name" style="margin-bottom: 5px;">Jumlah :</label>
                                <input type="Number" name="jml_keluar" placeholder="Jumlah Barang"/>
                            </div>
                        </div>
                        
                        
                        <div class="form-submit">
                            <input type="submit" value="Ulang" class="submit" name="reset" id="reset" />
                            <input type="submit"  value="Beli" class="submit" name="tambahBarangKeluarCustomer" style="background-color: orange;" />
                        </div>
                        </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
        </section>
    </body>
</html>