<?php
session_start();
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERBOR - Good Barber For Good People</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="retro-body">

    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->
    <header class="retro-hero d-flex align-items-center">
        <div class="retro-watermark-bg">BARBERBOR</div>
        <div class="container position-relative py-5">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <div class="retro-kicker mb-3">
                        <span class="retro-line"></span> GOOD BARBER FOR GOOD PEOPLE
                    </div>
                    <h1 class="retro-hero-headline">
                        NYAMAN<br>
                        TAMPAN<br>
                        <span class="text-mustard">BARBERBOR</span>
                    </h1>
                    <p class="retro-lead mt-3 mb-4">
                        Halo, <strong><?= htmlspecialchars($_SESSION['nama_lengkap']); ?></strong>! Nikmati potongan rambut klasik bergaya retro dengan sentuhan kapster profesional.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="booking.php" class="btn retro-btn-primary">BOOKING SEKARANG →</a>
                        <a href="#section-services" class="btn retro-btn-outline">LIHAT SERVICES</a>
                    </div>
                </div>

                <!-- Sticker Emblem Retro di Tengah/Kanan -->
                <div class="col-lg-5 text-center">
                    <div class="retro-sticker-card">
                        <div class="retro-barber-pole"></div>
                        <div class="p-4">
                            <span class="sticker-tag">CLASSIC & RETRO CUTS</span>
                            <h2 class="sticker-title mt-2">BARBERBOR</h2>
                            <p class="sticker-sub mb-3">Barbershop & Shoescare</p>
                            <div class="sticker-quote">
                                "NIKMATI BANYAK KEUNTUNGAN DENGAN BOOKING ONLINE LEBIH CEPAT TANPA ANTRI LAMA!"
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SECTION / 01 ABOUT -->
    <section id="section-about" class="retro-section retro-section-dark">
        <div class="container">
            <div class="retro-section-num">/ 01</div>
            <h2 class="retro-section-title">ABOUT</h2>
            <div class="retro-kicker mb-4">
                <span class="retro-line"></span> UNIQUE & INNOVATIVE
            </div>

            <div class="row gy-4 align-items-center">
                <div class="col-lg-7">
                    <p class="retro-highlight-text mb-4">
                        Kami memulai sebuah perubahan besar dengan mendirikan <strong>Barberbor Barbershop and Shoescare</strong> yang memadukan atmosfer klasik retro dengan pelayanan modern berkualitas tinggi.
                    </p>
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <p class="retro-text">
                                Dengan karakter yang kuat dan mengadopsi sistem antrian berbasis teknologi serta standar kualitas pelayanan yang tinggi, kami hadir menjadi yang terdepan dalam industri barbershop.
                            </p>
                            <p class="retro-text fw-bold text-mustard">
                                we analyze, adapt and innovate.<br>
                                #LEBIHBAIK bersama Barberbor & Shoescare.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="retro-text">
                                Didukung tim kapster muda terpilih dan kompeten, kami terus menjaga kualitas potongan klasik maupun tren terkini demi kepuasan setiap pelanggan setia Barberbor.
                            </p>
                            <a href="about.php" class="btn retro-btn-outline mt-2">→ SELENGKAPNYA TENTANG KAMI</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="retro-frame-box">
                        <img src="https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=800&q=80" alt="Interior Retro Barberbor" class="img-fluid retro-img">
                        <div class="retro-frame-caption">BARBERBOR CLASSIC LOUNGE</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION / 02 SERVICES -->
    <section id="section-services" class="retro-section retro-section-brown">
        <div class="retro-watermark-bg">BARBERBOR</div>
        <div class="container position-relative">
            <div class="retro-section-num">/ 02</div>
            <h2 class="retro-section-title">SERVICES</h2>
            <div class="retro-kicker mb-5">
                <span class="retro-line"></span> SERVICE GUARANTEE
            </div>

            <div class="row gy-4">
                <!-- Service 1 -->
                <div class="col-md-6">
                    <div class="retro-service-item d-flex gap-3">
                        <div class="retro-service-icon">✂</div>
                        <div>
                            <h4 class="retro-service-name">HAIRCUTS PRO <span class="badge retro-price-badge">Rp 30.000</span></h4>
                            <p class="retro-text mb-0">Potong rambut profesional dengan berbagai macam fasilitas treatment terbaik untuk pria, termasuk keramas dan pijat kepala.</p>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6">
                    <div class="retro-service-item d-flex gap-3">
                        <div class="retro-service-icon">🪒</div>
                        <div>
                            <h4 class="retro-service-name">HAIRCUT KIDS <span class="badge retro-price-badge">Rp 25.000</span></h4>
                            <p class="retro-text mb-0">Potong rambut anak profesional dengan pendekatan ramah dan rapi. Barberbor Support Generasi Bangsa.</p>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6">
                    <div class="retro-service-item d-flex gap-3">
                        <div class="retro-service-icon">🧔</div>
                        <div>
                            <h4 class="retro-service-name">SHAVES, BEARD & MUSTACHE TRIM <span class="badge retro-price-badge">Rp 20.000</span></h4>
                            <p class="retro-text mb-0">Cukur dan treatment bulu rambut di area wajah dengan handuk hangat serta razor blade steril 1x pakai.</p>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6">
                    <div class="retro-service-item d-flex gap-3">
                        <div class="retro-service-icon">👟</div>
                        <div>
                            <h4 class="retro-service-name">SHOESCARE <span class="badge retro-price-badge">Rp 25.000</span></h4>
                            <p class="retro-text mb-0">Layanan cuci sepatu dengan metode Deep Cleaning serta treatment perawatan sepatu lainnya agar kembali bersih.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="booking.php" class="btn retro-btn-primary">→ PILIH SERVICE & BOOKING</a>
            </div>
        </div>
    </section>

    <!-- SECTION / 03 PRICING -->
    <section id="section-pricing" class="retro-section retro-section-dark">
        <div class="container">
            <div class="retro-section-num">/ 03</div>
            <h2 class="retro-section-title">PRICING</h2>
            <div class="retro-kicker mb-4">
                <span class="retro-line"></span> BEST BARBER EXPERIENCE
            </div>

            <div class="row gy-4 align-items-center">
                <div class="col-lg-7">
                    <p class="retro-text mb-2">
                        Dengan kapster profesional yang telah melalui proses seleksi ketat, jaminan kepuasan bagi kamu pelanggan setia Barberbor & Shoescare.
                    </p>
                    <p class="fw-bold text-mustard mb-4">#NyamanTampanBarberbor</p>

                    <div class="retro-price-list">
                        <div class="retro-price-row">
                            <span>Haircuts Pro (Reguler Haircut)</span>
                            <span class="price-val">Rp 30.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Haircut Kids</span>
                            <span class="price-val">Rp 25.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Shaves, Beard & Mustache Trim</span>
                            <span class="price-val">Rp 20.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Shoescare Deep Cleaning</span>
                            <span class="price-val">Rp 25.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Hair Coloring Basic</span>
                            <span class="price-val">Rp 45.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Hair Coloring Fashion</span>
                            <span class="price-val">Rp 65.000</span>
                        </div>
                        <div class="retro-price-row">
                            <span>Haircare Treatment</span>
                            <span class="price-val">Rp 60.000</span>
                        </div>
                    </div>

                    <a href="booking.php" class="btn retro-btn-outline mt-4">→ BOOKING SEKARANG (DP 50%)</a>
                </div>

                <div class="col-lg-5">
                    <div class="retro-frame-box">
                        <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=800&q=80" alt="Kapster Barberbor" class="img-fluid retro-img">
                        <div class="retro-frame-caption">QUALITY PRECISION CUT</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION / 04 BARBERS -->
    <section id="section-barbers" class="retro-section retro-section-brown">
        <div class="retro-watermark-bg">BARBERS</div>
        <div class="container position-relative">
            <div class="retro-section-num">/ 04</div>
            <h2 class="retro-section-title">BARBERS</h2>
            <div class="retro-kicker mb-3">
                <span class="retro-line"></span> HIGHLY QUALIFIED BARBERS
            </div>
            <p class="retro-text col-lg-7 mb-5">
                <strong>good ATTITUDE more SKILL.</strong> Seluruh barberman kami sudah pasti ahli dan berstandar kualitas sesuai kualifikasi tinggi kami. Tak hanya itu, yang terpenting bagi kami adalah good attitude dalam melayani setiap pelanggan Barberbor.
            </p>

            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="retro-barber-card">
                        <img src="https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=600&q=80" alt="Expert Barberman" class="img-fluid retro-barber-photo">
                        <div class="pt-3">
                            <h5 class="retro-card-heading">EXPERT BARBERMAN</h5>
                            <p class="retro-text small mb-0">Best qualified barber man. Pelanggan adalah aset utama kami, dilayani sepenuh hati.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="retro-barber-card">
                        <img src="https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=600&q=80" alt="Good Attitude" class="img-fluid retro-barber-photo">
                        <div class="pt-3">
                            <h5 class="retro-card-heading">GOOD ATTITUDE</h5>
                            <p class="retro-text small mb-0">Attitude is the one thing that makes a big difference in every haircut session.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="retro-barber-card">
                        <img src="https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=600&q=80" alt="Happy Customer" class="img-fluid retro-barber-photo">
                        <div class="pt-3">
                            <h5 class="retro-card-heading">HAPPY CUSTOMER</h5>
                            <p class="retro-text small mb-0">The best service guarantee for all customers with classic retro comfort.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>