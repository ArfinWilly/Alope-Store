<?php

// Fungsi untuk koneksi ke database
function koneksiDatabase() {
    $host = 'localhost'; // Sesuaikan dengan host database Anda
    $username = 'root'; // Sesuaikan dengan username database Anda
    $password = ''; // Sesuaikan dengan password database Anda
    $database = 'e-commerce'; // Ganti dengan nama database Anda

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}

?>