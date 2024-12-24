// Fungsi untuk membuka modal
function openModal(id) {
    document.getElementById('modal-' + id).style.display = 'block';
}

// Fungsi untuk menutup modal
function closeModal(id) {
    document.getElementById('modal-' + id).style.display = "none";
}

// Tutup modal jika pengguna mengklik di luar modal
window.onclick = function(event) {
    var modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
}

// Cek URL halaman dan beri kelas aktif pada elemen yang sesuai
window.onload = function () {
    const currentPage = window.location.pathname;

    // Tombol Proses dan Riwayat
    const prosesBtn = document.querySelector('.transactions');
    const riwayatBtn = document.querySelector('.history');

    // Jika berada di halaman "Pembayaran.php" (Proses)
    if (currentPage.includes("transactions.php")) {
        prosesBtn.classList.add('filled'); // Tambahkan fill ke Proses
        riwayatBtn.classList.remove('filled'); // Hapus fill dari Riwayat
    }

    // Jika berada di halaman "Riwayat.php"
    if (currentPage.includes("order_history.php")) {
        riwayatBtn.classList.add('filled'); // Tambahkan fill ke Riwayat
        prosesBtn.classList.remove('filled'); // Hapus fill dari Proses
    }
};