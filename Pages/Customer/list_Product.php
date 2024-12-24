<?php

    //koneksi ke database
    require "../../Assets/Functions/functions.php"  ;
    $product = query ("SELECT * FROM product") ;
    if ( isset ($_POST["cari"] ) ) {
        $product = cari( $_POST["keyword"]) ;
    } ;

    // session_start();
    // if($_SESSION['level'] != 'pelanggan') {
    //     header("Location : ../../index.php") ;
    //     exit;
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Josefin+Sans:wght@400&display=swap" >
    <link rel="stylesheet" href="../../Assets/styles/Nav.css">
    <link rel="stylesheet" href="../../Assets/styles/List.css">
    <link rel="stylesheet" href="../../Assets/styles/Footer.css">
    <title>List Produk</title>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a class="navbar-brand">
                <img src="../../Assets/logoImage/Logo.png"  width="64">
                <span>Alope Store</span>
            </a>
        </div>

        <div class="navbar-center">
            <a class="nav-item" href="index.php">Dashboard</a>
            <a class="nav-item" href="list_Product.php">Product</a>
            <a class="nav-item" href="order.php">Pesanan</a>
            <a class="nav-item" href="transactions.php">Pembayaran</a>
        </div>

        <div class="navbar-right">
            <a href="../../Logout.php" class="btn btn-fill">LOGOUT</a>
        </div>
    </nav>

    <header>
        <h1>ALOPE STORE</h1>
    </header>

    <section>

    <div class="searc">

        <form action="" method="post">

            <input type="text" name="keyword" size= "35" autofocus="" placeholder="masukkan kunci pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari!</button>

        </form> <br>
        
    </div>

        <div class="grid-container">
      
            <?php foreach($product as $row) : ?>

            <div class="card">
                
                <img class="card-image" src="../../Assets/images/<?php echo $row["img"] ?>"> <br>
                <p class="card-title"> <?php echo $row["nameProduct"] ?> </p> <br>
                <p class="card-category"> <?php echo $row["category"] ?> </p> <br>
                <p class="card-price"> <?php echo $row["price"] ?> </p> <br>
                        
            </div>

            <?php endforeach ; ?>

        </div>

    </section>

    <footer class="footer">
        <div class="footer-container">
            <!-- Tentang Kami -->
            <div class="footer-section about">
                <h3>Tentang Kami</h3>
                <p>
                    Kami adalah platform E-Commerce terpercaya yang menyediakan produk berkualitas untuk pelanggan kami. 
                    Visi kami adalah memberikan pengalaman belanja yang mudah, aman, dan memuaskan.
                </p>
            </div>

            <!-- Navigasi -->
            <div class="footer-section navigation">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="footer-section contact">
                <h3>Kontak</h3>
                <p>Email: support@ecommerce.com</p>
                <p>Telepon: +62 123 4567 890</p>
                <p>Alamat: Jakarta, Indonesia</p>
            </div>
        </div>

        <!-- Ikon Sosial Media -->
        <div class="footer-socials">
            <a href="#" class="social-link">
                <img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook">
            </a>
            <a href="#" class="social-link">
                <img src="https://img.icons8.com/color/48/instagram-new.png" alt="Instagram">
            </a>
            <a href="#" class="social-link">
                <img src="https://img.icons8.com/color/48/whatsapp.png" alt="WhatsApp">
            </a>
        </div>

        <div class="footer-bottom">
            <p>© 2024 E-Commerce. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>