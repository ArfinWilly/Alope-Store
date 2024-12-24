<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/styles/Nav.css">
    <link rel="stylesheet" href="../../Assets/styles/Order.css">
    <link rel="stylesheet" href="../../Assets//styles/Footer.css">
    <title>Pesanan</title>
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

        <form method="POST" action="../../Assets/Functions/functionOrder.php">

        <div class="form-container">

            <label>Nama Pelanggan:</label><br>
            <input type="text" name="nameCustomers" required><br>

            <label>Jenis Kelamin:</label><br>
            <select name="gender" required>
                <option value="">--- Pilih Kelamin ---</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br>

            <label>Alamat:</label><br>
            <input type="text" name="addressCustomers" required><br>

            <label>No Telepon:</label><br>
            <input type="text" name="no_telp" required><br>

            <label>Menu:</label><br>
            <select name="idProduct" required>
                <option value="">Pilih Barang</option>
                <?php
                // Memanggil Assets/Functions/Function_Pesananngsi untuk mendapatkan opsi menu
                include '../../Assets/Functions/functionOrder.php';
                echo getMenuOptions($conn);
    ?>
            </select><br>

            <label>Jumlah:</label><br>
            <input type="number" name="amount" min="1" oninput="validity.valid||(value='');" required>
            <br>

            <button type="submit" class="submit-btn">Pesan</button>

        </div>

        </form>

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