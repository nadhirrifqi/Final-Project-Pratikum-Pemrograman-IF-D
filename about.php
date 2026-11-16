<?php
session_start();
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - BARBERBOR Retro Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body">

    <?php include 'navbar.php'; ?>

    <!-- Banner Header Halaman -->
    <header class="retro-page-header">
        <div class="container">
            <div class="retro-kicker mb-2">
                <span class="retro-line"></span> HI, WE ARE YOUR FAVORITE BARBERSHOP
            </div>
            <h1 class="retro-page-title">ABOUT</h1>
        </div>
    </header>

    <!-- Section / 01 WHO WE ARE -->
    <section class="retro-section retro-section-dark">
        <div class="container">
            <div class="retro-section-num">/ 01</div>
            <h2 class="retro-section-title">WHO WE ARE</h2>
            <div class="retro-kicker mb-4">
                <span class="retro-line"></span> NYAMAN TAMPAN BARBERBOR - GOOD BARBER FOR GOOD PEOPLE
            </div>

            <div class="row gy-4 align-items-start">
                <div class="col-lg-8">
                    <p class="retro-highlight-text mb-4">
                        Hello bro, <strong>Barberbor Barbershop & Shoescare</strong> adalah perusahaan yang bergerak di bidang pengelolaan Barbershop klasik bertema retro dengan merek terdaftar <strong>"BARBERBOR"</strong>.
                    </p>
                    <p class="retro-text mb-3">
                        Barberbor Barbershop & Shoescare berdiri dan berdomisili di Daerah Istimewa Yogyakarta. Kami menggabungkan nuansa barbershop klasik era 90-an dengan standar kebersihan modern, alat cukur steril, dan layanan perawatan sepatu (Shoescare).
                    </p>
                    <p class="retro-text mb-3">
                        Dengan karakteristik retro yang kuat, musik klasik yang hangat, serta kapster berpengalaman, tidak heran jika kami sangat dekat dengan customer loyal Barberbor.
                    </p>
                    <p class="fw-bold text-mustard mb-4">
                        #LEBIHBAIK bersama Barberbor Barbershop & Shoescare.
                    </p>
                </div>

                <div class="col-lg-4">
                    <div class="retro-registered-box text-center p-4">
                        <small class="text-uppercase tracking-wide d-block mb-3 text-cream">REGISTERED BRAND</small>
                        <div class="retro-badge-logo mx-auto">
                            <span class="badge-sub">AUTHENTIC RETRO</span>
                            <h3 class="retro-brand-title mb-0">BARBERBOR</h3>
                            <span class="badge-sub">EST. YOGYAKARTA</span>
                        </div>
                        <p class="small retro-text mt-3 mb-0">
                            Segala bentuk pelayanan mengutamakan kenyamanan, ketepatan waktu antrian, dan hasil potongan presisi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>