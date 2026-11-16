<?php
session_start();
require 'koneksi.php';

$notif_kontak = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['nama']);
    $email  = trim($_POST['email']);
    $subjek = trim($_POST['subjek']);
    $pesan  = trim($_POST['pesan']);

    if ($nama !== '' && $email !== '' && $subjek !== '' && $pesan !== '') {
        $stmt = $koneksi->prepare("INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $subjek, $pesan);
        $stmt->execute();
        $stmt->close();
        $notif_kontak = "Terima kasih! Pesan Anda telah terkirim ke tim Barberbor.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - BARBERBOR Retro Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body">

    <?php include 'navbar.php'; ?>

    <!-- Banner Header Halaman -->
    <header class="retro-page-header">
        <div class="container">
            <div class="retro-kicker mb-2">
                <span class="retro-line"></span> LET'S GET IN TOUCH
            </div>
            <h1 class="retro-page-title">CONTACT</h1>
        </div>
    </header>

    <!-- Section / 01 SAY HELLO -->
    <section class="retro-section retro-section-dark">
        <div class="container">
            <div class="retro-section-num">/ 01</div>
            <h2 class="retro-section-title">SAY HELLO</h2>
            <div class="retro-kicker mb-5">
                <span class="retro-line"></span> SEND US A MESSAGE
            </div>

            <?php if ($notif_kontak !== ''): ?>
                <div class="alert retro-alert-success mb-4">
                    <?= htmlspecialchars($notif_kontak); ?>
                </div>
            <?php endif; ?>

            <div class="row gy-4">
                <!-- Info Alamat Kiri -->
                <div class="col-lg-5">
                    <p class="retro-text mb-4">
                        Punya pertanyaan seputar layanan potong rambut, perawatan sepatu, atau jadwal booking? Hubungi kami langsung atau kirim pesan melalui formulir di samping.
                    </p>
                    <ul class="list-unstyled retro-contact-info">
                        <li class="mb-3">
                            <strong class="text-mustard">Head Office :</strong><br>
                            Jl. LPMP, Ngajeg, Tirtomartani, Kalasan, Sleman, Yogyakarta
                        </li>
                        <li class="mb-3">
                            <strong class="text-mustard">Customer Care :</strong><br>
                            +62 896-1850-8311
                        </li>
                        <li class="mb-3">
                            <strong class="text-mustard">Email :</strong><br>
                            info@barberbor.com
                        </li>
                    </ul>
                </div>

                <!-- Form Say Hello Kanan -->
                <div class="col-lg-7">
                    <form action="contact.php" method="POST" class="retro-card-box p-4">
                        <div class="mb-3">
                            <label class="form-label retro-label">Your Name (required)</label>
                            <input type="text" name="nama" class="form-control retro-input" value="<?= htmlspecialchars($_SESSION['nama_lengkap']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label retro-label">Your Email (required)</label>
                            <input type="email" name="email" class="form-control retro-input" value="<?= htmlspecialchars($_SESSION['email']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label retro-label">Subject *</label>
                            <input type="text" name="subjek" class="form-control retro-input" placeholder="Judul pesan Anda" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label retro-label">Your Message</label>
                            <textarea name="pesan" rows="5" class="form-control retro-input" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>

                        <button type="submit" class="btn retro-btn-primary px-5">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>