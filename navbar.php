<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proteksi halaman agar hanya customer yang sudah login bisa masuk website
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'customer') {
    header("Location: index.php?error=Silakan login terlebih dahulu!");
    exit();
}

$halaman_aktif = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg retro-navbar sticky-top">
    <div class="container">
        <!-- Logo Kiri Atas -->
        <a class="navbar-brand retro-nav-logo" href="home.php">
            <span class="logo-top">BARBERBOR</span>
            <span class="logo-bottom">BARBERSHOP & SHOESCARE</span>
        </a>

        <!-- Toggle Mobile -->
        <button class="navbar-toggler retro-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBarberbor">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi Kanan (HOME, ABOUT tanpa dropdown, BOOKING, GALLERY, CONTACT) -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarBarberbor">
            <ul class="navbar-nav align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link retro-nav-link <?= ($halaman_aktif == 'home.php') ? 'active' : ''; ?>" href="home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link retro-nav-link <?= ($halaman_aktif == 'about.php') ? 'active' : ''; ?>" href="about.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link retro-nav-link <?= ($halaman_aktif == 'booking.php') ? 'active' : ''; ?>" href="booking.php">BOOKING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link retro-nav-link <?= ($halaman_aktif == 'gallery.php') ? 'active' : ''; ?>" href="gallery.php">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link retro-nav-link <?= ($halaman_aktif == 'contact.php') ? 'active' : ''; ?>" href="contact.php">CONTACT</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a href="logout.php" class="btn retro-btn-logout btn-sm" onclick="return confirm('Keluar dari akun customer?')">
                        KELUAR (<?= htmlspecialchars(explode(' ', $_SESSION['nama_lengkap'])[0]); ?>)
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>