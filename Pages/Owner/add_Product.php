<?php

    require "../../Assets/Functions/functions.php" ;

    if (isset($_POST["submit"]) ) {
       
        if(tambah($_POST) > 0 ) {
            echo "
            <script>
                alert('data berhasil di tambahkan!') ;
                document.location.href = 'list_Product.php';
            </script>" ;
        } else {
            echo"
            <script>
                alert('data gagal di tambahkan!') ;
                document.location.href = 'list_Product.php';
            </script>" ;
        }

    } ;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alope Store Add-Product</title>

    <!-- Custom fonts for this template-->
    <link href="../../Assets/styles/sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../Assets/styles/sb/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">ALOPE STORE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
             
            <li class="nav-item active">
                <a class="nav-link" href="list_Product.php">
                <i class="far fa-arrow-alt-circle-left"></i>
                    <span>Kembali</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>
                    
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="../../Assets/styles/sb/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Tasks Card Example -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-grey-800" style="text-align:center;">Tambah Barang</h1>

                    <!-- Card untuk form data -->

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">

                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="file">Upload Gambar</label>
                                            <input type="file" name="img" id="file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Product</label>
                                            <input type="text" name="nameProduct" id="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Kategori Product</label>
                                            <input type="text" name="category" id="category" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Harga Product</label>
                                            <input type="text" inputmode="numeric" name="price" id="price" class="form-control">
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../../Assets/styles/sb/vendor/jquery/jquery.min.js"></script>
    <script src="../../Assets/styles/sb/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Assets/styles/sb/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Assets/styles/sb/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../Assets/styles/sb/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../Assets/styles/sb/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../Assets/styles/sb/js/demo/datatables-demo.js"></script>

</body>

</html>