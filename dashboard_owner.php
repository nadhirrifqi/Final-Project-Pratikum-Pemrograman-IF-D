<?php
session_start();
require 'koneksi.php';

// Proteksi halaman agar hanya Owner yang bisa masuk
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'owner') {
    header("Location: index.php?error=Akses ditolak! Halaman ini khusus Owner Barberbor.");
    exit();
}

$notif_aksi = '';
$panggil_berikutnya = false;

// Proses update status antrian ketika Owner menekan tombol aksi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_booking'], $_POST['aksi_status'])) {
    $id_booking  = (int) $_POST['id_booking'];
    $aksi_status = $_POST['aksi_status'];

    $status_valid = ['Sedang Diproses', 'Selesai', 'Antrian Berikutnya'];
    if (in_array($aksi_status, $status_valid)) {
        $stmt = $koneksi->prepare("UPDATE bookings SET status_antrian = ? WHERE id_booking = ?");
        $stmt->bind_param("si", $aksi_status, $id_booking);
        $stmt->execute();
        $stmt->close();

        if ($aksi_status === 'Antrian Berikutnya') {
            $panggil_berikutnya = true;
            $notif_aksi = "Notifikasi terkirim ke Antrian #" . $id_booking . ": Anda antrian berikutnya, pastikan sudah berada di tempat!";
        } else {
            $notif_aksi = "Status Antrian #" . $id_booking . " berhasil diubah menjadi: " . $aksi_status;
        }
    }
}

// Ambil seluruh list booking customer
$query_bookings = $koneksi->query("SELECT * FROM bookings ORDER BY id_booking ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner - BARBERBOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body">

    <!-- Navbar Khusus Owner -->
    <nav class="navbar retro-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand retro-nav-logo" href="dashboard_owner.php">
                <span class="logo-top">BARBERBOR OWNER</span>
                <span class="logo-bottom">PANEL KONTROL ANTRIAN RETRO</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-cream small d-none d-md-inline">Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']); ?></strong></span>
                <a href="logout.php" class="btn retro-btn-logout btn-sm">LOGOUT</a>
            </div>
        </div>
    </nav>

    <section class="retro-section retro-section-dark min-vh-100">
        <div class="container">
            <div class="retro-section-num">/ OWNER PANEL</div>
            <h1 class="retro-section-title mb-2">DASHBOARD ANTRIAN BOOKING</h1>
            <p class="retro-text mb-4">Kelola daftar antrian customer Barberbor dan panggil pelanggan berikutnya.</p>

            <!-- Alert / Notifikasi Aksi Owner -->
            <?php if ($notif_aksi !== ''): ?>
                <div class="alert <?= $panggil_berikutnya ? 'retro-alert-call' : 'retro-alert-success'; ?> mb-4 fw-bold">
                    <?= htmlspecialchars($notif_aksi); ?>
                </div>
            <?php endif; ?>

            <!-- Tabel Daftar Antrian Booking Customer -->
            <div class="retro-card-box p-3 p-md-4">
                <div class="table-responsive">
                    <table class="table table-dark retro-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>NO. ANTRIAN</th>
                                <th>NAMA CUSTOMER</th>
                                <th>NO. HANDPHONE</th>
                                <th>SERVICES</th>
                                <th>HARGA</th>
                                <th>DP QRIS (50%+)</th>
                                <th>STATUS</th>
                                <th class="text-center">AKSI ANTRIAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($query_bookings->num_rows > 0): ?>
                                <?php while ($b = $query_bookings->fetch_assoc()): ?>
                                    <tr>
                                        <td class="fw-bold text-mustard">#<?= $b['id_booking']; ?></td>
                                        <td>
                                            <strong><?= htmlspecialchars($b['nama_customer']); ?></strong><br>
                                            <small class="text-secondary"><?= htmlspecialchars($b['email_customer']); ?></small>
                                        </td>
                                        <td><?= htmlspecialchars($b['no_hp']); ?></td>
                                        <td><?= htmlspecialchars($b['nama_service']); ?></td>
                                        <td>Rp <?= number_format($b['harga_service'], 0, ',', '.'); ?></td>
                                        <td class="text-success fw-bold">Rp <?= number_format($b['jumlah_dp'], 0, ',', '.'); ?></td>
                                        <td>
                                            <?php
                                            $badge_class = 'bg-secondary';
                                            if ($b['status_antrian'] === 'Antrian Berikutnya') $badge_class = 'bg-warning text-dark';
                                            elseif ($b['status_antrian'] === 'Sedang Diproses') $badge_class = 'bg-info text-dark';
                                            elseif ($b['status_antrian'] === 'Selesai') $badge_class = 'bg-success';
                                            ?>
                                            <span class="badge <?= $badge_class; ?> px-2 py-1">
                                                <?= strtoupper($b['status_antrian']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1 justify-content-center">
                                                <!-- Tombol 1: Antrian Berikutnya dengan Alert -->
                                                <form method="POST" class="d-inline" onsubmit="alert('Anda antrian berikutnya, pastikan sudah berada di tempat!');">
                                                    <input type="hidden" name="id_booking" value="<?= $b['id_booking']; ?>">
                                                    <input type="hidden" name="aksi_status" value="Antrian Berikutnya">
                                                    <button type="submit" class="btn btn-warning btn-sm fw-bold">
                                                        Antrian Berikutnya
                                                    </button>
                                                </form>

                                                <!-- Tombol 2: Sedang Diproses -->
                                                <form method="POST" class="d-inline">
                                                    <input type="hidden" name="id_booking" value="<?= $b['id_booking']; ?>">
                                                    <input type="hidden" name="aksi_status" value="Sedang Diproses">
                                                    <button type="submit" class="btn btn-info btn-sm fw-bold">
                                                        Sedang Diproses
                                                    </button>
                                                </form>

                                                <!-- Tombol 3: Selesai -->
                                                <form method="POST" class="d-inline">
                                                    <input type="hidden" name="id_booking" value="<?= $b['id_booking']; ?>">
                                                    <input type="hidden" name="aksi_status" value="Selesai">
                                                    <button type="submit" class="btn btn-success btn-sm fw-bold">
                                                        Selesai
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4 retro-text">
                                        Belum ada antrian booking dari customer.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>