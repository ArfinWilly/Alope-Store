<?php

//Menghubungkan ke Folder Function
include '../../Assets/Functions/functionPayment.php';

// Ambil Data dari tabel pesanan/Function yang ada di Functions/Pembayaran
$pesananList = getPesanan();

// Jika form pembayaran disubmit
$return = null; // Variabel untuk menyimpan return
$pesananIdBayar = null; // Variabel untuk menyimpan ID pesanan yang dibayar

if (isset($_POST['submit'])) {
    $pesananIdBayar = $_POST['idCustomers'];
    $nameCustomers = $_POST['nameCustomers'];
    $addressCustomers = $_POST['addressCustomers'];
    $no_telp = $_POST['no_telp'];
    $nameProduct = $_POST['nameProduct'];
    $amount = $_POST['amount'];
    $totalPrice = $_POST['totalPrice'];
    $pay = $_POST['pay'];

    // Hitung return
    $return = $pay - $totalPrice;

    // Simpan ke tabel pembayaran
    simpanPembayaran($pesananIdBayar ,$nameCustomers, $addressCustomers, $no_telp, $nameProduct, $amount, $totalPrice, $pay);

    hapusPesanan($pesananIdBayar) ;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Assets/styles/Nav.css">
    <link rel="stylesheet" href="../../Assets/styles/Message.css">
    <link rel="stylesheet" href="../../Assets/styles/Footer.css">
    <title>Pembayaran</title>
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
            <a class="nav-item" href="transactions.php">Pembayaran</a>
        </div>

        <div class="navbar-right">
            <a href="Logout.php" class="btn btn-fill">LOGOUT</a>
        </div>
    </nav>

    <header >
        <h1>ALOPE STORE</h1>
    </header>

    <div class="order-status">
        <a  href="transactions.php" class="a transactions">Proses</a>
        <a  href="order_history.php" class="a history">Riwayat</a>
    </div>

    <div 
     class="container">

        <?php
        
        // Tampilkan informasi pesanan
        foreach ($pesananList as $pesanan) {
            $pesananId = $pesanan['idCustomers']; // Ambil ID Pesanan untuk modal unik

           // Format tanggal (opsional, agar lebih mudah dibaca)
           $tanggalDibuat = date("d F Y, H:i", strtotime($pesanan['created_at']));

           // Tampilkan daftar pesanan dengan tautan untuk membuka modal
           echo '<div class="message" onclick="openModal(' . $pesananId . ')">';
           echo '<div class="message-header">';
           echo '<p>Pesanan</p>';
           echo '<span class="date">' . $tanggalDibuat . '</span>';
           echo '</div>';
           echo '<p>Klik Untuk Melihat Detail</p>';
           echo '</div>';

            // Modal yang berisi detail pesanan dan form pembayaran
            echo '<div class="modal" id="modal-' . $pesananId . '">';
            echo '<div class="modal-content">';
            echo '<span class="close" onclick="closeModal(' . $pesananId . ')">&times;</span>';

            // Tampilkan detail pesanan dalam modal
            echo "<p><strong>Nama Pelanggan:</strong> " . $pesanan['nameCustomers'] . "</p>";
            echo "<p><strong>Alamat:</strong> " . $pesanan['addressCustomers'] . "</p>";
            echo "<p><strong>No Telp:</strong> " . $pesanan['no_telp'] . "</p>";
            echo "<p><strong>Nama Menu:</strong> " . $pesanan['nameProduct'] . "</p>";
            echo "<p><strong>Jumlah:</strong> " . $pesanan['amount'] . "</p>";
            echo "<p><strong>Total Harga: Rp</strong> " . number_format($pesanan['totalPrice'], 0 , ',', '.') ;  "</p>";

            // Form pembayaran untuk tiap pesanan
            if ($pesananId == $pesananIdBayar && $return !== null) {
                // Jika pembayaran sudah dilakukan, tampilkan return dan sembunyikan form
                echo "<p><strong>Kembalian:</strong> Rp " . $return . "</p>";
            } else {
                // Tampilkan form pembayaran jika belum ada return
                 // Tampilkan form pembayaran jika belum ada return
                echo '<form action="" method="POST" onsubmit="return validatePayment(' . $pesanan['totalPrice'] . ', this)">';
                echo '<input type="hidden" name="idCustomers" value="' . $pesanan['idCustomers'] . '">';
                echo '<input type="hidden" name="nameCustomers" value="' . $pesanan['nameCustomers'] . '">';
                echo '<input type="hidden" name="addressCustomers" value="' . $pesanan['addressCustomers'] . '">';
                echo '<input type="hidden" name="no_telp" value="' . $pesanan['no_telp'] . '">';
                echo '<input type="hidden" name="nameProduct" value="' . $pesanan['nameProduct'] . '">';
                echo '<input type="hidden" name="amount" value="' . $pesanan['amount'] . '">';
                echo '<input type="hidden" name="totalPrice" value="' . $pesanan['totalPrice'] . '">';
                echo '<label for="pay">Bayar:</label>';
                echo '<input type="number" name="pay" required><br>';
                echo '<button type="submit" name="submit">Bayar</button>';
                echo '</form>';
            }

            echo '</div>'; // Tutup modal-content
            echo '</div>'; // Tutup modal
        }
        ?>
    </div>

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

    <!-- Menginput Javascript dari folder moduls -->
    <script src="../../Assets/moduls/Message.js"></script>

    <script>
        // Fungsi untuk memvalidasi pembayaran
        function validatePayment(totalHarga, form) {
            const bayarInput = form.querySelector('input[name="pay"]').value.replace(/[^\d]/g, '');
            const pay = parseInt(bayarInput);

            if (pay < totalHarga) {
                alert('Uang yang dimasukkan tidak cukup!');
                return false; // Gagalkan pengiriman form
            }

            return true; // Lanjutkan jika valid
        }
    </script>

</body>
</html>
