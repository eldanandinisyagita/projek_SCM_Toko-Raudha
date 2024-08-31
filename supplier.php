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
        <title>Data Supplier</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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

                        </div>
                    </div>
                 
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Supplier</h1>
                       
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
                                          <h4 class="modal-title">Tambah Data Supplier</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                              <input type="text" name="id_supplier" placeholder="ID Barang (ex: SP01)" class="form-control" required>
                                              <br>
                                              <select name="staff" class="form-control">
                                                    <?php
                                                        $takeData = mysqli_query($conn, "select * from staff");
                                                        while($fetcharray = mysqli_fetch_array($takeData)){
                                                            $pilnamastaff = $fetcharray['nama_staff'];
                                                            $pilidstaff = $fetcharray['id_staff'];
                                                    
                                                    ?>
                                                    <option value="<?=$pilidstaff;?>"><?=$pilnamastaff;?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                              <br>
                                              <input type="text" name="nama_supplier" placeholder="Nama Supplier" class="form-control" required>
                                              <br>
                                              <input type="text" name="no_hp" placeholder="No Handphone" class="form-control" required>
                                              <br>
                                              <button type="submit" class="btn btn-primary" name="tambahSupplier">Submit</button>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Supplier</th>
                                                <th>ID Staff</th>
                                                <th>Nama Supplier</th>
                                                <th>No Handphone</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $dataSupplier = mysqli_query($conn, "select * from supplier");
                                            $i = 1;
                                            while($data = mysqli_fetch_array($dataSupplier)){
                                                $id_supplier = $data['id_supplier'];
                                                $id_staff = $data['id_staff'];
                                                $nama_supplier = $data['nama_supplier'];
                                                $nohandphone = $data['no_hp'];
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $id_supplier; ?></td>
                                                <td><?= $id_staff; ?></td>
                                                <td><?= $nama_supplier; ?></td>
                                                <td><?= $nohandphone; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id_supplier; ?>">Edit</button>
                                                    <input type="hidden" name="id_supplier_del" value="<?= $id_supplier; ?>"></input>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_supplier; ?>">Hapus</button>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $id_supplier; ?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Supplier</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                            <input type="text" name="id_staff" value="<?= $id_staff; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="text" name="nama_supplier" value="<?= $nama_supplier; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="text" name="no_handphone" value="<?= $nohandphone; ?>" class="form-control" required>
                                                            <br>
                                                            <input type="hidden" name="id_supplier" value="<?= $id_supplier; ?>">
                                                            <button type="submit" class="btn btn-warning" name="updateSupplier">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?= $id_supplier; ?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                      
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Supplier</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class = "modal-body">
                                                            Apakah anda yakin ingin menghapus <b>Data <?= $nama_supplier; ?> </b> ini ?
                                                            <input type="hidden" name="id_supplier" value="<?= $id_supplier; ?>">
                                                            <input type="hidden" name="id_staff" value="<?= $id_staff; ?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="deleteSupplier">Hapus</button>
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
