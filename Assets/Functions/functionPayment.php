<?php

require "config.php" ;

// Fungsi untuk mendapatkan data dari tabel orders
function getPesanan() {
    $conn = koneksiDatabase();

    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);

    $orders = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
    }

    mysqli_close($conn);
    return $orders;
}

// Fungsi untuk memasukkan data ke tabel completed_orders
function simpanPembayaran($idPayment ,$nameCustomers, $address, $no_telp, $nameProduct, $amount, $totalPrice, $pay) {
    $conn = koneksiDatabase();

    // Hitung returnPay
    $returnPay = $pay - $totalPrice;

    // Masukkan ke tabel completed_orders
    $query = "INSERT INTO completed_orders(nameCustomers, addressCustomers, no_telp, nameProduct, amount, totalPrice, pay, returnPay)
              VALUES ('$nameCustomers', '$address', '$no_telp', '$nameProduct', '$amount', '$totalPrice', '$pay', '$returnPay')";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }

    mysqli_close($conn);
}

function hapusPesanan($id_pesanan) {
    $conn = koneksiDatabase() ;
    $query = "DELETE FROM orders WHERE idCustomers = ?" ;

    $stmt = $conn->prepare($query) ;
    $stmt->bind_param("i",$id_pesanan) ;
    $stmt->execute() ;
    $stmt->close() ;
}

function getPelanggan() {

    $conn = koneksiDatabase();

    $query = "SELECT * FROM completed_orders";
    $result = mysqli_query($conn, $query);

    $pelanggan = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pelanggan[] = $row;
        }
    }

    mysqli_close($conn);
    return $pelanggan;

}

?>