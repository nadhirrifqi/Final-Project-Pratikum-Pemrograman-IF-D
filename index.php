<?php
session_start();

// Jika sudah login, langsung arahkan sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'customer') {
        header("Location: home.php");
        exit();
    } elseif ($_SESSION['role'] === 'owner') {
        header("Location: dashboard_owner.php");
        exit();
    }
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BARBERBOR Retro Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body login-page-bg">

    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="retro-login-box w-100" style="max-width: 520px;">
            
            <!-- Header Logo Retro -->
            <div class="text-center mb-4">
                <div class="retro-badge-logo mx-auto mb-2">
                    <span class="badge-sub">EST. 1998 • GOOD BARBER FOR GOOD PEOPLE</span>
                    <h1 class="retro-brand-title mb-0">BARBERBOR</h1>
                    <span class="badge-sub">BARBERSHOP & SHOESCARE</span>
                </div>
                <p class="retro-subtitle mt-2">Silakan pilih akses masuk sebelum memasuki website</p>
            </div>

            <!-- Notifikasi Error jika ada -->
            <?php if ($error != ''): ?>
                <div class="alert retro-alert-danger mb-3" role="alert">
                    <?= htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <!-- Tombol Switch Role Login -->
            <div class="d-flex gap-2 mb-4">
                <button type="button" id="btnTabCustomer" class="btn retro-tab-btn active w-50">
                    LOGIN CUSTOMER
                </button>
                <button type="button" id="btnTabOwner" class="btn retro-tab-btn w-50">
                    LOGIN OWNER
                </button>
            </div>

            <!-- FORM 1: LOGIN CUSTOMER -->
            <form id="formCustomer" action="proses_login.php" method="POST">
                <input type="hidden" name="role" value="customer">
                
                <div class="mb-3">
                    <label class="form-label retro-label">NAMA LENGKAP *</label>
                    <input type="text" name="nama_lengkap" class="form-control retro-input" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="mb-3">
                    <label class="form-label retro-label">NOMOR HANDPHONE *</label>
                    <input type="tel" name="no_hp" class="form-control retro-input" placeholder="Contoh: 081234567890" required>
                </div>

                <div class="mb-3">
                    <label class="form-label retro-label">ALAMAT LENGKAP *</label>
                    <textarea name="alamat" rows="2" class="form-control retro-input" placeholder="Masukkan alamat tempat tinggal" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label retro-label">EMAIL *</label>
                    <input type="email" name="email" class="form-control retro-input" placeholder="nama@email.com" required>
                </div>

                <button type="submit" class="btn retro-btn-primary w-100">
                    MASUK KE WEBSITE BARBERBOR →
                </button>
            </form>

            <!-- FORM 2: LOGIN OWNER -->
            <form id="formOwner" action="proses_login.php" method="POST" style="display: none;">
                <input type="hidden" name="role" value="owner">

                <div class="retro-info-note mb-3">
                    * Akses khusus Owner Barberbor untuk mengelola antrian booking.
                </div>

                <div class="mb-3">
                    <label class="form-label retro-label">USERNAME OWNER *</label>
                    <input type="text" name="username" class="form-control retro-input" placeholder="Masukkan username owner" required>
                </div>

                <div class="mb-4">
                    <label class="form-label retro-label">PASSWORD OWNER *</label>
                    <input type="password" name="password" class="form-control retro-input" placeholder="Masukkan password owner" required>
                </div>

                <button type="submit" class="btn retro-btn-primary w-100">
                    MASUK DASHBOARD OWNER →
                </button>
            </form>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>