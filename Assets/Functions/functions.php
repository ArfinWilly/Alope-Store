<?php

// Koneksi ke database
require "config.php" ;

$conn = koneksiDatabase() ;

// Menampilkan Tabel product
function query($query) {
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form

    $nameProduct = htmlspecialchars($data["nameProduct"]);
    $category = htmlspecialchars($data["category"]);
    $price = $data["price"];

    // upload img 
    $img = upload();
    if ( !$img ) {
        return false;
    }
    
    // query insert data dengan menyebutkan img kolom-kolom yang akan diisi
    $query = "INSERT INTO product (img, nameProduct, category, price) VALUES ('$img', '$nameProduct', '$category', '$price')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function upload() {
    $gambarFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    // cek apakah tidak ada gamabr yang diupload
    if ( $error === 4 ) {
        echo "<script>
                alert('Pilih img terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yan diupload adalah img
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $gambarFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang anda upload bukan img!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
              </script>";
        return false;
    }

    // lolos pengecekan, img siap diupload
    // generate img img baru
    $gambarFileBaru = uniqid();
    $gambarFileBaru .= '.';
    $gambarFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../Assets/images/' . $gambarFileBaru);

    return $gambarFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM product where idProduct = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["idProduct"];
    $img = htmlspecialchars($data["img"]);
    $nameProduct = htmlspecialchars($data["nameProduct"]);
    $category = htmlspecialchars($data["category"]);
    $price = $data["price"];
    $gambarLama = htmlspecialchars($data["img"]);

    // cek apakah user pilih img atau tidak
    if ( $_FILES['img']['error'] === 4 ) {
        $img = $gambarLama;
    } else {
        $img = upload();
    }

    // query update data
    $query = "UPDATE product SET
                img = '$img',
                nameProduct = '$nameProduct',
                category = '$category',
                price = '$price'
                WHERE idProduct = $id    
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    global $conn;
    $keyword = mysqli_real_escape_string($conn, $keyword);
    $query = "SELECT * FROM product
                WHERE
            -- img LIKE '%$keyword%' OR
            nameProduct LIKE '%$keyword%' OR
            category LIKE '%$keyword%' OR
            price LIKE '%$keyword%'
            ";
    return query($query);
}
