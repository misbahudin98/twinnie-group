# 🌸 Twinnie Group — Panduan Teknis & Dokumentasi Arsitektur Proyek
### Khusus Junior Web Developer: Dari Nol Menjadi Website Produksi Berstandar Internasional

> **Status Proyek**: Produksi (v3.0)  
> **Tech Stack**: Semantic HTML5, Modular Vanilla JavaScript, Tailwind CSS (Precompiled CLI)  
> **Standar Mutu**: Kecepatan Muat < 1.0 Detik, Zero Silent Failure, Aksesibilitas WCAG 2.1 AA Compliant, SEO Terstruktur JSON-LD.

---

## 1. Kata Pengantar & Mindset Rekayasa Perangkat Lunak

Halo Rekan Junior Web Developer! 👋  
Selamat datang di repositori resmi **Twinnie Group**. Dokumen ini ditulis secara khusus sebagai panduan komprehensif agar kamu memahami bukan hanya *bagaimana* kode ini bekerja, melainkan *mengapa* setiap keputusan teknis dan desain diambil sejak baris pertama diketik.

### Filosofi Utama: Mengapa Murni HTML5 & Vanilla JavaScript?
Di era tren framework berat (React, Vue, Next.js), banyak developer tergoda menggunakan stack besar untuk segala kebutuhan. Namun, untuk website layanan kesehatan lokal seperti Twinnie Group:
1. **Kecepatan Adalah Empati**: Pengunjung situs ini sering kali adalah ibu pascamelahirkan yang sedang lelah, orang tua yang bayinya demam/batuk pilek, atau kakek-nenek (*baby boomers*) yang mencari terapis bekam. Mereka tidak boleh menunggu loading bundler JavaScript 5MB berputar-putar. Website ini dirancang agar **tampil utuh dalam waktu kurang dari 1 detik (< 1s)** bahkan pada sinyal 4G yang lemah di pelosok Malang Raya.
2. **Nol Kompilasi Runtime Server (Dilarang Membuat File PHP)**: Seluruh arsitektur berjalan secara statis murni di sisi browser. Keamanan terjamin (nol risiko SQL injection atau eksploitasi server PHP), biaya hosting mendekati nol rupiah (bisa di-host di CDN statis mana pun), dan integrasi transaksi dilakukan langsung melalui *Direct WhatsApp Deep-Linking*.
3. **Zero Silent Failure**: Setiap tombol yang ditekan oleh pengunjung **pasti** memberikan umpan balik reaktif seketika. Tidak ada tombol "mati" tanpa respon.

---

## 2. Struktur Direktori Proyek

Berikut susunan file dan folder yang perlu kamu pahami:

```text
twinnie-group/
├── index.html                   # Halaman Utama (Beranda & Katalog 4 Pilar Layanan)
├── tentang-kami.html            # Profil Perusahaan, Dewan Tenaga Ahli Medis, Visi-Misi
├── kemitraan.html               # Proposal Investasi Syariah, Metode Sukuk & Skema Modal
├── components/                  # File Komponen Modular Terpisah (Reusable)
│   ├── navbar.html              # Navigasi utama + tombol Pesan Layanan
│   ├── footer.html              # Master footer 9 mitra resmi, alamat cabang & kontak WA
│   ├── booking-modal.html       # Modal formulir pemesanan responsif
│   └── floating-action.html     # Floating buttons WhatsApp Kemitraan & Reservasi
├── assets/
│   ├── css/
│   │   ├── input.css            # Source Tailwind CSS + custom layer parallax & glass
│   │   └── style.css            # Hasil kompilasi Tailwind minified (~48 KB)
│   ├── js/
│   │   ├── services-data.js     # Single Source of Truth (SSOT) data seluruh paket layanan
│   │   ├── booking.js           # Mesin reaktif form pemesanan, kalkulasi harga & WA builder
│   │   ├── main.js              # Controller utama: Parallax, mobile drawer, scrollspy, lightbox
│   │   └── partnership.js       # Kalkulator simulasi bagi hasil kemitraan syariah
│   ├── img/                     # Foto aset teroptimasi, foto terapis, dan logo mitra
│   └── videos/                  # Video MP4 layanan & video testimoni autentik
├── design.md                    # Dokumen resmi Design System & panduan estetika UI/UX
├── llms.txt                     # Konteks ringkas terstruktur untuk asisten kecerdasan buatan (AI)
├── tailwind.config.js           # Konfigurasi token tema, palet warna Rose, dan font
└── package.json                 # Skrip build Tailwind CLI
```

---

## 3. Kronologi Evolusi Proyek: Dari Awal Hingga Versi Final

Bagaimana proyek ini bermula dan bertransformasi hingga menjadi kode produksi yang elegan seperti sekarang? Berikut 7 fase evolusinya:

```
[FASE 1: Analisis Starter Legacy 'ref.php']
                     ⬇
[FASE 2: Pemisahan Komponen Modular & Migrasi Statis]
                     ⬇
[FASE 3: Pembangunan Engine Katalog & Dual-Pricing]
                     ⬇
[FASE 4: Rekayasa Modal Pemesanan (Desktop vs Mobile)]
                     ⬇
[FASE 5: Arsitektur Parallax & Tirai Bergantian]
                     ⬇
[FASE 6: Resolusi Bug Kritis GPU & Stacking Context]
                     ⬇
[FASE 7: Kontras Rose Tajam, Aksesibilitas WCAG & Zero Failure]
```

### Fase 1: Bedah Starter Legacy (`ref.php`) & Rahasia Keanggunannya
Proyek ini diawali dari sebuah file acuan monolit PHP bernama `ref.php`. Kami menganalisis mengapa tampilan visualnya terasa sangat anggun, tenang, dan berkelas (*high-end editorial*):
- **Tipografi Unboxed Editorial**: Teks di sisi hero tidak dikurung dalam boks abu-abu kaku, melainkan mengapung bebas (*airy*) dengan *whitespace* lega.
- **Floating Island Media Frame**: Menampilkan kartu media putih bersih dengan bayangan lembut yang kontras terhadap latar belakang mawar.
- **Kontrol Taktil Melingkar**: Tombol navigasi slide berbentuk lingkaran kaca putih (`w-12 h-12 rounded-full`) yang memanjakan jari.

*Kelemahan Starter Legacy*: File tersebut mencampurkan PHP, script inline yang redundan, belum ramah WCAG, dan tidak modular.

---

### Fase 2: Pemisahan Komponen Modular & Eliminasi PHP
Kami memecah elemen-elemen berulang menjadi komponen terpisah di folder `components/`:
- **`components/footer.html`**: Master footer yang memuat strip 9 mitra resmi lengkap dengan logo lingkaran dan nama, 4 kolom navigasi, detail 3 cabang outlet, dan tautan sosial.
- **Pola Penggunaan Ulang (Reuse)**: Footer ini digunakan secara konsisten pada [`index.html`](file:///D:/laragon/www/twinnie-group/index.html), [`tentang-kami.html`](file:///D:/laragon/www/twinnie-group/tentang-kami.html), dan [`kemitraan.html`](file:///D:/laragon/www/twinnie-group/kemitraan.html). Di samping itu, disediakan helper `loadModularComponents()` di [`assets/js/main.js`](file:///D:/laragon/www/twinnie-group/assets/js/main.js) yang dapat memuat placeholder `<div data-component="components/footer.html"></div>` secara otomatis jika dijalankan di server HTTP.

---

### Fase 3: Katalog Layanan Reaktif & Dual-Pricing (`services-data.js` & `booking.js`)
Layanan Twinnie Group dibagi menjadi 4 pilar resmi:
1. **Twinnie Care (`baby-spa`)**: Perawatan bayi baru lahir (*newborn care*), pijat bayi/anak, terapi batuk pilek, tindik steril, serta **seluruh perawatan ibu maternal** (pijat laktasi oksitosin, bendungan ASI, dan pijat relaksasi pascasalin).
2. **Allura Woman Spa (`woman-spa`)**: Spa eksklusif wanita dengan kebijakan khusus **Visit Outlet & Langsung Chat WhatsApp** di Jl. Kadaka No.11 Malang. Seluruh paket komersial pelatihan terapis telah dieliminasi 100%.
3. **Nimpuna Terapi Holistik (`holistic`)**: Terapi otot akupresur, bekam medik steril, dan penanganan skoliosis/saraf kejepit.
4. **Biro Psikologi Rumah Ameera (`psikolog`)**: Konseling keluarga, pendampingan *baby blues*, hipnoterapi klinis, dan Mental Health Check-Up (MHCU).

**Sistem Tarif Ganda (Dual-Pricing)**:
Setiap paket memiliki harga berbeda antara **Di Outlet** vs **Home Visit** (Home Visit mencakup radius Kota Malang, Kab. Malang & Kota Batu maks. 10 km). Ketika pengguna memilih tab radio "Home Visit", formulir otomatis membuka kolom alamat dan menghitung estimasi biaya secara instan.

---

### Fase 4: Modal Pemesanan Responsif (Desktop 3-Kolom vs Mobile 1-Tampilan)
- **Pada Laptop / Layar Lebar**: Modal memenuhi 94% tinggi layar (`lg:h-[94vh]`) dan terbagi menjadi **3 kolom lega**:
  - Kolom 1 (`lg:col-span-4`): Khusus Gambar & Video Display, galeri thumbnail, dan jaminan klinis.
  - Kolom 2 (`lg:col-span-4`): Keterangan paket terpilih, rincian manfaat, dan rincian tarif transparan.
  - Kolom 3 (`lg:col-span-4`): Formulir interaktif (tempat, add-ons, identitas, tanggal/jam) dan tombol kirim WhatsApp.
- **Pada Smartphone**: Pengguna mobile sangat enggan melakukan *scrolling* panjang di dalam modal. Solusinya, modal dibagi menjadi **2 section yang dirancang menyatu dalam 1 tampilan layar utuh**:
  - Section 1 (Atas): Banner foto/video berukuran proporsional (~18% tinggi layar).
  - Section 2 (Bawah): Formulir rapat grid 2-kolom di mana nama paket dan harga total langsung terpampang berdampingan dengan tombol WhatsApp.

---

### Fase 5: Efek Tirai Parallax Bergantian (*Alternating Curtain Parallax*)
Untuk menciptakan kesan anggun, mewah, dan menenangkan, seluruh halaman menerapkan scroll selang-seling antara gambar berkedalaman dan warna solid hangat:
- **Section Gambar (`.parallax-section`)**: Memiliki gambar foto dengan pergerakan `translate3d` halus melalui GPU compositor, dilapisi kaca merah muda (*rose glass*).
- **Section Warna Solid (`.curtain-solid-section`)**: Memiliki warna solid hangat (`#FFFDF9` atau `bg-white`) dan bayangan lembut.
- **Efek Tirai**: Saat pengguna menggulir layar, section warna solid meluncur mulus di atas section foto layaknya tirai panggung teater, lalu menyibak foto berikutnya secara megah.

---

### Fase 6: Studi Kasus Penyelesaian Bug Kritis (Penting untuk Junior Developer!)

Sebagai junior developer, kamu wajib mempelajari dua bug rumit perenderan browser yang berhasil kami selesaikan di proyek ini:

#### Kasus A: Gambar Parallax Tidak Muncul / Putih Saja
- **Masalah**: Gambar parallax tertutup warna putih polos kanvas `<body>`.
- **Akar Masalah**: Container `.parallax-section` sebelumnya tidak memiliki *stacking context* mandiri (`z-index: auto` dan tanpa `isolation: isolate`). Akibatnya, elemen anak dengan `z-index: -20` / `-z-10` ditempatkan browser **di belakang kanvas `<body>`**.
- **Solusi**:
  ```css
  .parallax-section {
    position: relative;
    overflow: hidden;
    isolation: isolate; /* KUNCI: Membuat stacking context mandiri */
    z-index: 1;
  }
  .parallax-bg-layer {
    position: absolute;
    z-index: 1; /* Foto dirender di dalam section, di atas kanvas body */
  }
  ```

#### Kasus B: Menghindari Noda / Bercak Hitam GPU (*Black Patches Artifact*)
- **Masalah**: Di area hero muncul bercak atau kotak hitam aneh saat dibuka di Google Chrome / Microsoft Edge di Windows.
- **Akar Masalah**: Penggunaan CSS `mix-blend-mode: multiply` yang digabungkan bersamaan dengan `backdrop-filter: blur(...)` pada elemen yang sama memicu bug perhitungan *alpha-channel clamping* pada kartu grafis (GPU compositor DirectX/ANGLE).
- **Solusi**: Menghapus `backdrop-filter: blur` dari elemen multiply blend mode. Menggunakan formula murni persis seperti di `ref.php` (`background: rgba(236, 72, 153, 0.92); mix-blend-mode: multiply;`) yang terbukti 100% stabil, halus, dan bebas noda hitam.

---

### Fase 7: Penyelarasan Layer Rose Seperti ref.php & Footer Memenuhi Layar
- **Layer Penutup Rose Persis `ref.php` (Instruction 6)**:
  * Menggunakan formula warna asli `ref.php`: `background: rgba(236, 72, 153, 0.92); mix-blend-mode: multiply;` pada `.accent-overlay` dan `.hero-pink-glass-layer`.
  * Dilengkapi `.hero-readability`: gradien putih lembut ke bawah (`linear-gradient(to bottom, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.05) 50%, rgba(255, 253, 249, 0.55) 85%, rgba(255, 253, 249, 0.95) 100%)`).
  * **Diterapkan Konsisten**: Diterapkan secara seragam di `index.html`, `tentang-kami.html`, dan `kemitraan.html`. Seluruh teks putih di hero terlihat sangat tajam, bersinar, dan tidak samar.
- **Setting Footer Semula di `index.html` & Memenuhi Layar (Instruction 7)**:
  * Warna: Agak gelap berkelas (`bg-slate-900 border-t border-slate-800 text-slate-300`).
  * Lebar: Memenuhi seluruh layar viewport (`w-full px-4 sm:px-8 lg:px-12 xl:px-16`) sehingga strip partner 9 mitra dan 4 kolom navigasi terbentang luas, mewah, dan simetris tanpa terkurung batas sempit.

---

## 4. Panduan Praktik Harian untuk Junior Developer

### A. Cara Menjalankan Proyek di Komputer Lokal
Karena proyek ini berbasis static HTML murni, kamu bisa menjalankannya dengan beberapa cara:
1. **Menggunakan Laragon / XAMPP**: Tempatkan folder di `D:\laragon\www\twinnie-group`, buka browser dan akses `http://localhost/twinnie-group/` atau `http://twinnie-group.test/`.
2. **Menggunakan VS Code Live Server**: Klik kanan `index.html` → Pilih *Open with Live Server*.
3. **Menggunakan Terminal Python**:
   ```bash
   python -m http.server 8080
   # Buka http://localhost:8080 di browser
   ```

### B. Cara Mengompilasi CSS (Tailwind CLI)
Ketika kamu mengubah utility class di HTML atau menambahkan aturan CSS di `assets/css/input.css`, jalankan perintah berikut:
```bash
# Kompilasi minifikasi untuk produksi:
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/style.css --minify

# Mode watch (otomatis mengompilasi saat file disimpan):
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/style.css --watch
```

### C. Cara Menambah atau Mengubah Paket Layanan Baru
Jangan mengedit HTML secara manual untuk daftar paket! Cukup buka [`assets/js/services-data.js`](file:///D:/laragon/www/twinnie-group/assets/js/services-data.js):
1. Cari kategori yang sesuai (misal: `baby-spa`, `holistic`, dll).
2. Tambahkan objek paket ke dalam array `packages`:
   ```javascript
   {
     id: 'paket-baru',
     name: 'Nama Paket Baru',
     duration: '60 Menit',
     age: '0 - 2 Tahun',
     outletPrice: 95000,
     homePrice: 110000,
     homevisitAllowed: true,
     desc: 'Deskripsi manfaat medis paket ini...',
     notes: 'Persiapan sebelum terapis datang...'
   }
   ```
3. Simpan file. Modal pemesanan dan kalkulasi harga akan memperbarui data secara otomatis tanpa reload!

### D. Cara Mengubah Footer
Master footer berada di [`components/footer.html`](file:///D:/laragon/www/twinnie-group/components/footer.html). Jika ada perubahan nomor WhatsApp atau penambahan mitra resmi:
1. Perbarui file [`components/footer.html`](file:///D:/laragon/www/twinnie-group/components/footer.html).
2. Salin bagian `<footer id="siteFooter">...</footer>` ke `index.html`, `tentang-kami.html`, dan `kemitraan.html`.

---

## 5. Checklist Mutu Sebelum Rilis (Quality Assurance)

Sebelum kamu melakukan *push* atau *deploy* perubahan baru, pastikan mencentang checklist ini:
- [x] **Zero Silent Failure**: Pastikan setiap tombol baru memiliki event listener atau atribut yang terikat.
- [x] **Aksesibilitas (A11y)**: Semua `<button>` dan `<a>` tanpa teks harus memiliki atribut `aria-label`.
- [x] **Integritas Gambar**: Semua elemen `<img>` wajib memiliki atribut `alt` yang deskriptif dan `loading="lazy"`.
- [x] **No Multiply Blend Bug**: Jangan gunakan `mix-blend-mode: multiply` bersamaan dengan `backdrop-filter: blur`.
- [x] **Parallax Stacking Context**: Pastikan setiap section parallax baru memiliki kelas `parallax-section` dan `isolation: isolate`.
- [x] **Kecepatan Muat**: Ukuran `style.css` harus tetap terkompresi (< 50 KB).

---
*Dokumen ini disusun dengan dedikasi tinggi oleh Senior Frontend Engineer Twinnie Group. Selamat berkarya dan terus belajar!* 🚀
