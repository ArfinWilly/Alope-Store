<?php
// Koneksi ke database
require "config.php" ;

$conn = koneksiDatabase() ;

// Fungsi untuk menampilkan pilihan product dari tabel product
function getMenuOptions($conn) {
    $query = "SELECT idProduct, nameProduct FROM product";
    $result = mysqli_query($conn, $query);
    $options = '';
    
    while ($product = mysqli_fetch_assoc($result)) {
        $options .= "<option value='" . $product['idProduct'] . "'>" . $product['nameProduct'] . "</option>";
    }
    return $options;
}

// Proses form pemesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameCustomers = $_POST['nameCustomers'];
    $gender = $_POST['gender'];
    $addressCustomers = $_POST['addressCustomers'];
    $no_telp = $_POST['no_telp'];
    $idProduct = $_POST['idProduct'];
    $amount = $_POST['amount'];

    // Ambil data product berdasarkan idProduct
    $query = "SELECT nameProduct, price FROM product WHERE idProduct = '$idProduct'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    $nameProduct = $product['nameProduct'];
    $price = $product['price'];

    // Hitung total price
    $totalPrice = $price * $amount;

    // Simpan ke dalam tabel pemesanan
    $sql1 = "INSERT INTO orders (nameCustomers, gender, addressCustomers, no_telp, nameProduct, amount, totalPrice) 
            VALUES ('$nameCustomers', '$gender', '$addressCustomers', '$no_telp', '$nameProduct', '$amount', '$totalPrice')";
    
    if (mysqli_query($conn, $sql1)) {
        echo " <script>
        alert('Pesanan Berhasil!') ;
        document.location.href = '../../Pages/Customer/list_Product.php';
            </script>";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}

?>