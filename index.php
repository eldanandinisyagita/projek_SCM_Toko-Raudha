<?php 
require 'function.php';
require 'check.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            .foto{
                width: 100px;
            }
            .foto:hover{
                transform: scale(2.2);
                transition: 0.3s ease;
            }
        </style>    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Toko Raudha</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group"> 
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </form>
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a> -->
                        <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Barang
                            </a>
                            <a class="nav-link" href="barangmasuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Barang Masuk
                            </a>
                            <a class="nav-link" href="barangkeluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Data Barang Keluar
                            </a>
                            <a class="nav-link" href="perhitunganPPIC.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Perhitungan PPIC
                            </a>
                            <a class="nav-link" href="staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Staff
                            </a>
                            <a class="nav-link" href="supplier.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Supplier
                            </a>
                            <a class="nav-link" href="customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Customer
                            </a>
                            <a class="nav-link" href="logout.php">
                                <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                Logout
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Barang</h1>
                        <!-- <ol class="breadcrumb mb-4"> 
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Data
                                  </button>
                                   <!-- The Modal -->
                                  <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">Tambah Data Barang</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                              <input type="text" name="id_barang" placeholder="ID Barang (ex: b01)" class="form-control" required>
                                              <br>
                                              <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required>
                                              <br>
                                              <input type="text" name="harga_barang" placeholder="Harga Barang" class="form-control" required>
                                              <br>
                                              <input type="file" name="foto_barang" placeholder="Foto Barang" class="form-control">
                                              <br>
                                              <input type="text" name="modal_barang" placeholder="Modal Barang" class="form-control" required>
                                              <br>
                                              <input type="number" name="stok" placeholder="Stok" class="form-control" required>
                                              <br>
                                              <input type="number" name="rop" placeholder="ROP (Batas Pemesanan Kembali)" class="form-control" required>
                                              <br>
                                              <input type="number" name="lot_sizing" placeholder="Total Pemesanan Barang Kembali" class="form-control" required>
                                              <br>
                                              <button type="submit" class="btn btn-primary" name="tambahBarang">Submit</button>
                                            </div>
                                        </form>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body">

                                                        
                            <?php
                                $dataStokTambah = mysqli_query($conn, "select * from barang_masuk bm, barang brg where brg.id_barang = bm.id_barang order by bm.tgl_masuk desc");

                                while($data = mysqli_fetch_array($dataStokTambah)){
                                    $nama_barang = $data['nama_barang'];

                                
                            ?>                                           
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Perhatian!</strong> Stok barang <b><?= $nama_barang; ?></b> telah ditambahkan. Harap Menunggu Kedatangan Barang</b>.
                            </div>
                           

                            <?php
                                };

                            ?>

                            <?php
                                $dataStok = mysqli_query($conn, "select * from barang where stok <= rop");

                                while($data = mysqli_fetch_array($dataStok)){
                                    $nama_barang = $data['nama_barang'];

                                
                            ?>                                           
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Perhatian!</strong> Stok barang <b><?= $nama_barang; ?></b> telah mencapai batas <b>ROP</b>, harap melakukan pemesanan ulang sesuai dengan <b>Lot Sizing</b>.
                            </div>
                           

                            <?php
                                };

                            ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Foto Barang</th>
                                                <th>Modal Barang</th>
                                                <th>Stok</th>
                                                <!-- <th>ROP</th> -->
                                                <!-- <th>Lot Sizing</th> -->
                                                <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataBarang = mysqli_query($conn, "select * from barang");
                                            $i = 1;
                                            while($data = mysqli_fetch_array($dataBarang)){
                                                $id_barang = $data['id_barang'];
                                                $nama_barang = $data['nama_barang'];
                                                $harga_barang = $data['harga_barang'];
                                                
                                                //cek foto
                                                $foto_barang = $data['foto_barang'];
                                                if($foto_barang == null){
                                                    $foto = 'Gambar Tidak Tersedia';
                                                }else{
                                                    $foto = '<img src="foto_barang/'.$foto_barang.'"class = "foto">';
                                                }

                                                $modal_barang = $data['modal_barang'];
                                                $stok = $data['stok'];
                                                $rop = $data['rop'];
                                                $lot_sizing = $data['lot_sizing'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $id_barang; ?></td>
                                                <td><?= $nama_barang; ?></td>
                                                <td><?= $harga_barang; ?></td>
                                                <td><?= $foto; ?></td>
                                                <td><?= $modal_barang; ?></td>
                                                <td><?= $stok; ?></td>
                                                <!-- <td><?= $rop; ?></td> -->
                                                <!-- <td><?= $lot_sizing; ?></td> -->
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id_barang; ?>">Edit</button>
                                                    <input type="hidden" name="id_barang_del" value="<?= $id_barang; ?>"></input>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_barang; ?>">Hapus</button>
                                                </td>
                                            </tr>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?= $id_barang; ?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                        
                                                        <!-- Modal body -->
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                            <input type="text" name="nama_barang" value="<?= $nama_barang; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="text" name="harga_barang" value="<?= $harga_barang; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="file" name="foto_barang" value="<?= $foto_barang; ?>" class="form-control">
                                                            <br>
                                                            <input type="text" name="modal_barang" value="<?= $modal_barang; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="number" name="rop" value="<?= $rop; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="number" name="lot_sizing" value="<?= $lot_sizing; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="hidden" name="id_brg" value="<?= $id_barang; ?>">
                                                            <button type="submit" class="btn btn-warning" name="updateTambahBarang">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?= $id_barang; ?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class = "modal-body">
                                                            Apakah anda yakin ingin menghapus <b>Data <?= $nama_barang; ?> </b> ini ?
                                                            <input type="hidden" name="id_brg" value="<?= $id_barang; ?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="deleteBarang">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>

                                            <?php
                                             };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
