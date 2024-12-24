<?php
// Memasukkan file FPDF
require('../../fpdf/fpdf.php');

// Koneksi ke database
require "../../Assets/Functions/config.php" ;
$conn = koneksiDatabase() ;

// Query untuk mengambil data pesanan

$idPayment = $_GET['idPayment']; // Ambil ID pembayaran dari URL
$query = "SELECT * FROM completed_orders WHERE idPayment = $idPayment";
$result = $conn->query($query);


// Membuat folder "images" jika belum ada
$folderPath = "images/";
if (!is_dir($folderPath)) {
    mkdir($folderPath, 0755, true); // Buat folder dengan izin baca/tulis
}

// Membuat instance FPDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Logo
$pdf->Image('../../Assets/logoImage/Logo.png', ($pdf->GetPageWidth() - 65) / 2, 0, 65);
$pdf->Ln(20);

// Judul
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell(0, 10, 'Alope Store', 0, 2, 'C');

// Alamat
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(0, 10, 'Pekalongan, Jawa Tengah, Indonesia', 0, 2, 'C');
$pdf->Cell(0, 10, 'No. Telp +6285972551095', 0, 2, 'C');

// Tanggal
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 10, 'Tanggal: ' . date('d-m-Y') . ', ' . date('H:i:s'), 0, 1, 'R');
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(5);


// Mengecek apakah data pesanan ditemukan
if ($result->num_rows > 0) {
    // Loop untuk menampilkan pesanan
    while ($pesanan = $result->fetch_assoc()) {
        // Menambahkan detail pesanan
        $pdf->SetFont('Arial', '', 18);

        $pdf->Cell(40, 10, 'Nama Pelanggan: ', 0, 0);
        $pdf->Cell(0, 10, $pesanan['nameCustomers'], 0, 1 , 'R');
        $pdf->Cell(40, 10, 'Alamat: ' , 0, 0);
        $pdf->Cell(0, 10, $pesanan['addressCustomers'], 0, 1 ,'R');
        $pdf->Cell(40, 10, 'No Telp: ', 0, 0);
        $pdf->Cell(0, 10, $pesanan['no_telp'], 0, 1 ,'R');
        $pdf->Cell(40, 10, 'Nama Product: ' , 0, 0);
        $pdf->Cell(0, 10, $pesanan['nameProduct'], 0, 1 , 'R');
        $pdf->Cell(40, 10, 'Jumlah: ' , 0, 0);
        $pdf->Cell(0, 10, $pesanan['amount'], 0, 1 ,'R');
        $pdf->Cell(40, 10, 'Total Harga: ' , 0, 0);
        $pdf->Cell(0, 10, 'Rp ' . number_format($pesanan['totalPrice'], 2, ',', '.'), 0, 1 ,'R');
        $pdf->Ln(5);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(10); // Menambahkan jarak sebelum bagian pembayaran


        // Pembayaran dan Kembalian
        $pdf->Cell(40, 10, 'Uang Bayar:', 0, 0);
        $pdf->Cell(0, 10, "Rp " . number_format($pesanan['pay'], 2, ',', '.'), 0, 1, 'R');
        $pdf->Ln(5); // Menambahkan jarak
        $pdf->Cell(40, 10, 'Kembalian:', 0, 0);
        $pdf->Cell(0, 10, "Rp " . number_format($pesanan['returnPay'], 2, ',', '.'), 0, 1, 'R');
        $pdf->Ln(10); // Menambahkan jarak

        // Footer
        $pdf->SetFont('Arial', '', 18);
        $pdf->MultiCell(0, 10, 'Terima kasih ' . $pesanan['nameCustomers'] . " atas kunjungan Anda, semoga pengalaman Anda menyenangkan!", 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(0, 10, '(' . $pesanan['nameCustomers'] . ')', 0, 1, 'C');

        // Simpan file ke folder
        $fileName = 'Struk_' . $pesanan['idPayment'] . '.pdf';
        $filePath = $folderPath . $fileName;
        $pdf->Output('D', $filePath);

        // Masukkan data ke database
        $insertSQL = "INSERT INTO pdf_storage (idPayment, file_name, file_path, created_at) 
                      VALUES ('" . $pesanan['idPayment'] . "', '" . $fileName . "', '" . $filePath . "', NOW())";

        if ($conn->query($insertSQL)) {
            echo "PDF berhasil disimpan dan informasi dimasukkan ke database.<br>";
        } else {
            echo "Gagal menyimpan informasi ke database: " . $conn->error . "<br>";
        }

        header("Location:List.php");
        exit;
    }
} else {
    $pdf->Cell(0, 40, 'Tidak ada data pesanan', 0, 1);
}

// Menutup koneksi
$conn->close();

?>
