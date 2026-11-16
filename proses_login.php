<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$role = isset($_POST['role']) ? $_POST['role'] : '';

if ($role === 'customer') {
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $no_hp        = trim($_POST['no_hp']);
    $alamat       = trim($_POST['alamat']);
    $email        = trim($_POST['email']);

    // Validasi semua field wajib diisi
    if ($nama_lengkap === '' || $no_hp === '' || $alamat === '' || $email === '') {
        header("Location: index.php?error=Semua data customer wajib diisi!");
        exit();
    }

    // Simpan data customer ke database
    $stmt = $koneksi->prepare("INSERT INTO customers (nama_lengkap, no_hp, alamat, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_lengkap, $no_hp, $alamat, $email);
    $stmt->execute();
    $stmt->close();

    // Simpan data ke Session
    $_SESSION['role']         = 'customer';
    $_SESSION['nama_lengkap'] = $nama_lengkap;
    $_SESSION['no_hp']        = $no_hp;
    $_SESSION['alamat']       = $alamat;
    $_SESSION['email']        = $email;

    header("Location: home.php");
    exit();

} elseif ($role === 'owner') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === '' || $password === '') {
        header("Location: index.php?error=Username dan password owner wajib diisi!");
        exit();
    }

    // Cek akun owner dari database
    $stmt = $koneksi->prepare("SELECT id_owner, username, password FROM owners WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $hasil = $stmt->get_result();

    if ($hasil->num_rows === 1) {
        $data_owner = $hasil->fetch_assoc();
        // Verifikasi password (mendukung hash default 'barberbor123' atau 'password')
        if (password_verify($password, $data_owner['password']) || ($username === 'owner' && $password === 'barberbor123')) {
            $_SESSION['role']     = 'owner';
            $_SESSION['username'] = $data_owner['username'];

            header("Location: dashboard_owner.php");
            exit();
        }
    }

    $stmt->close();
    header("Location: index.php?error=Username atau password owner salah!");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>