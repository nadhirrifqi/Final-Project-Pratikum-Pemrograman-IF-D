<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: booking.php");
    exit();
}

$nama_customer  = trim($_POST['nama_customer']);
$no_hp          = trim($_POST['no_hp']);
$email_customer = $_SESSION['email'];
$nama_service   = trim($_POST['nama_service']);
$harga_service  = (int) $_POST['harga_service'];
$jumlah_dp      = (int) $_POST['jumlah_dp'];

// Daftar harga resmi server-side sesuai halaman Services
$daftar_harga = [
    "Haircuts Pro"                  => 30000,
    "Haircut Kids"                  => 25000,
    "Shaves, Beard & Mustache Trim" => 20000,
    "Shoescare Deep Cleaning"       => 25000,
    "Hair Coloring Basic"           => 45000,
    "Hair Coloring Fashion"         => 65000,
    "Haircare Treatment"            => 60000
];

if ($nama_customer === '' || $no_hp === '' || !isset($daftar_harga[$nama_service])) {
    header("Location: booking.php?status=gagal&pesan=Booking gagal! Pastikan nama, nomor HP, dan service dipilih dengan benar.");
    exit();
}

$harga_resmi = $daftar_harga[$nama_service];
$minimal_dp  = $harga_resmi * 0.5;

// Validasi ketat DP minimal 50%
if ($jumlah_dp <= 0 || $jumlah_dp < $minimal_dp) {
    $pesan_err = "Booking GAGAL! Pembayaran QRIS wajib DP minimal 50% (Rp " . number_format($minimal_dp, 0, ',', '.') . ") dari harga " . $nama_service . ".";
    header("Location: booking.php?status=gagal&pesan=" . urlencode($pesan_err));
    exit();
}

// Simpan booking ke database
$metode = "QRIS";
$status = "Menunggu";

$stmt = $koneksi->prepare("INSERT INTO bookings (nama_customer, no_hp, email_customer, nama_service, harga_service, jumlah_dp, metode_pembayaran, status_antrian) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiiss", $nama_customer, $no_hp, $email_customer, $nama_service, $harga_resmi, $jumlah_dp, $metode, $status);

if ($stmt->execute()) {
    $nomor_antrian = $stmt->insert_id;
    $stmt->close();
    $pesan_ok = "Booking BERHASIL! Nomor antrian Anda #" . $nomor_antrian . " untuk layanan " . $nama_service . " (DP QRIS Rp " . number_format($jumlah_dp, 0, ',', '.') . ").";
    header("Location: booking.php?status=sukses&pesan=" . urlencode($pesan_ok));
    exit();
} else {
    $stmt->close();
    header("Location: booking.php?status=gagal&pesan=Terjadi kesalahan sistem saat menyimpan booking.");
    exit();
}
?>