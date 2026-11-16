document.addEventListener("DOMContentLoaded", function () {
    // 1. LOGIKA SWITCH TAB LOGIN (CUSTOMER vs OWNER) di index.php
    const btnTabCustomer = document.getElementById("btnTabCustomer");
    const btnTabOwner = document.getElementById("btnTabOwner");
    const formCustomer = document.getElementById("formCustomer");
    const formOwner = document.getElementById("formOwner");

    if (btnTabCustomer && btnTabOwner && formCustomer && formOwner) {
        btnTabCustomer.addEventListener("click", function () {
            btnTabCustomer.classList.add("active");
            btnTabOwner.classList.remove("active");
            formCustomer.style.display = "block";
            formOwner.style.display = "none";
        });

        btnTabOwner.addEventListener("click", function () {
            btnTabOwner.classList.add("active");
            btnTabCustomer.classList.remove("active");
            formOwner.style.display = "block";
            formCustomer.style.display = "none";
        });
    }

    // 2. LOGIKA PERHITUNGAN & VALIDASI DP 50% QRIS di booking.php
    const selectService = document.getElementById("selectService");
    const inputHargaService = document.getElementById("inputHargaService");
    const labelHargaService = document.getElementById("labelHargaService");
    const labelMinimalDp = document.getElementById("labelMinimalDp");
    const inputJumlahDp = document.getElementById("inputJumlahDp");
    const formBooking = document.getElementById("formBooking");

    function formatRupiah(angka) {
        return "Rp " + Number(angka).toLocaleString("id-ID");
    }

    if (selectService && inputHargaService && labelHargaService && labelMinimalDp) {
        selectService.addEventListener("change", function () {
            const opsiTerpilih = selectService.options[selectService.selectedIndex];
            const harga = parseInt(opsiTerpilih.getAttribute("data-harga")) || 0;
            const minimalDp = harga * 0.5;

            inputHargaService.value = harga;
            labelHargaService.textContent = formatRupiah(harga);
            labelMinimalDp.textContent = formatRupiah(minimalDp);

            if (inputJumlahDp && minimalDp > 0) {
                inputJumlahDp.value = minimalDp;
            }
        });
    }

    if (formBooking && inputHargaService && inputJumlahDp) {
        formBooking.addEventListener("submit", function (e) {
            const harga = parseInt(inputHargaService.value) || 0;
            const dp = parseInt(inputJumlahDp.value) || 0;
            const minimalDp = harga * 0.5;

            if (harga <= 0) {
                e.preventDefault();
                alert("Silakan pilih layanan (Services) terlebih dahulu!");
                return;
            }

            if (dp <= 0 || dp < minimalDp) {
                e.preventDefault();
                alert("Booking GAGAL! Pembayaran QRIS wajib DP minimal 50% (" + formatRupiah(minimalDp) + ") dari harga service.");
                inputJumlahDp.focus();
            }
        });
    }

    // 3. MODAL PREVIEW FOTO di gallery.php
    const galleryCards = document.querySelectorAll(".retro-gallery-card");
    const modalGalleryEl = document.getElementById("modalGallery");

    if (galleryCards.length > 0 && modalGalleryEl) {
        const modalGallery = new bootstrap.Modal(modalGalleryEl);
        const modalJudul = document.getElementById("modalGalleryJudul");
        const modalFoto = document.getElementById("modalGalleryFoto");
        const modalKat = document.getElementById("modalGalleryKat");

        galleryCards.forEach(function (card) {
            card.addEventListener("click", function () {
                modalJudul.textContent = card.getAttribute("data-judul");
                modalFoto.src = card.getAttribute("data-foto");
                modalKat.textContent = card.getAttribute("data-kat");
                modalGallery.show();
            });
        });
    }
});