<?php
session_start();
require 'koneksi.php';

$galeri_items = [
    ["judul" => "BLOWOUT TAPER", "kategori" => "Classic Taper • Barberbor", "foto" => "https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "TWO BLOCK RETRO", "kategori" => "Modern Retro • Barberbor", "foto" => "https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "TAPPER X FRINGE", "kategori" => "Textured Cut • Barberbor", "foto" => "https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "COMMA HAIR", "kategori" => "Clean Style • Barberbor", "foto" => "https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "IVY LEAGUE", "kategori" => "Gentlemen Cut • Barberbor", "foto" => "https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "WOLF CUT CLASSIC", "kategori" => "Layered Retro • Barberbor", "foto" => "https://images.unsplash.com/photo-1593702288056-7927b442d0fa?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "CLASSIC POMPADOUR", "kategori" => "90s Signature • Barberbor", "foto" => "https://images.unsplash.com/photo-1532710093739-9470acff878f?auto=format&fit=crop&w=600&q=80"],
    ["judul" => "TAPPER FADE", "kategori" => "Sharp Fade • Barberbor", "foto" => "https://images.unsplash.com/photo-1605497788044-5a32c7078486?auto=format&fit=crop&w=600&q=80"]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - BARBERBOR Retro Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body">

    <?php include 'navbar.php'; ?>

    <!-- Banner Header Halaman -->
    <header class="retro-page-header">
        <div class="container">
            <div class="retro-kicker mb-2">
                <span class="retro-line"></span> HAVE A LOOK AROUND
            </div>
            <h1 class="retro-page-title">GALLERY</h1>
        </div>
    </header>

    <section class="retro-section retro-section-dark">
        <div class="container">
            <!-- Header Bar ala Social Feed pada Screenshot -->
            <div class="retro-gallery-topbar d-flex flex-wrap justify-content-between align-items-center p-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="retro-mini-avatar">BB</div>
                    <div>
                        <h5 class="mb-0 text-cream fw-bold">BARBERBOR.CO</h5>
                        <small class="retro-text">"Barberbor" - Retro Barbershop & Shoescare | Buka 09.00 - 21.00</small>
                    </div>
                </div>
                <a href="booking.php" class="btn retro-btn-primary btn-sm mt-2 mt-md-0">BOOKING MODEL INI →</a>
            </div>

            <!-- Grid Galeri 4 Kolom -->
            <div class="row g-3">
                <?php foreach ($galeri_items as $item): ?>
                    <div class="col-6 col-md-3">
                        <div class="retro-gallery-card" data-judul="<?= htmlspecialchars($item['judul']); ?>" data-foto="<?= htmlspecialchars($item['foto']); ?>" data-kat="<?= htmlspecialchars($item['kategori']); ?>">
                            <img src="<?= htmlspecialchars($item['foto']); ?>" alt="<?= htmlspecialchars($item['judul']); ?>" class="img-fluid retro-gallery-img">
                            <div class="retro-gallery-overlay">
                                <span class="gallery-item-title"><?= htmlspecialchars($item['judul']); ?></span>
                                <div class="retro-play-circle">▶</div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Modal Preview Foto Gallery -->
    <div class="modal fade" id="modalGallery" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content retro-modal-box">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-mustard fw-bold" id="modalGalleryJudul">MODEL POTONGAN</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalGalleryFoto" src="" alt="Preview" class="img-fluid retro-img mb-3">
                    <p id="modalGalleryKat" class="retro-text mb-3"></p>
                    <a href="booking.php" class="btn retro-btn-primary w-100">BOOKING POTONGAN INI SEKARANG</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>