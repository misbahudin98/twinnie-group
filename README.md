# 🌸 Twinnie Group — Panduan Teknis & Dokumentasi Arsitektur Sistem

> **Status Proyek**: Produksi (v3.0)  
> **Tech Stack**: Semantic HTML5, Modular Vanilla JavaScript, Tailwind CSS (Precompiled CLI)  
> **Standar Mutu**: Kecepatan Muat < 1.0 Detik, Zero Silent Failure, Aksesibilitas WCAG 2.1 AA Compliant, SEO Terstruktur JSON-LD.

---

## 1. Ikhtisar Arsitektur & Prinsip Rekayasa

Dokumen ini merupakan spesifikasi acuan teknis resmi repositori **Twinnie Group**, mencakup arsitektur sistem, struktur komponen, standar performa, dan pedoman pemeliharaan kode.

### Filosofi Rekayasa: Pure Semantic HTML5 & Vanilla JavaScript
1. **Kecepatan Adalah Empati**: Pengunjung situs sering kali adalah ibu pascamelahirkan yang sedang lelah, orang tua yang bayinya membutuhkan stimulasi atau penanganan batuk pilek, atau keluarga yang mencari layanan terapi. Website dirancang agar **tampil utuh dalam waktu kurang dari 1 detik (< 1s)** pada jaringan seluler di seluruh wilayah Malang Raya.
2. **Nol Kompilasi Runtime Server**: Seluruh arsitektur berjalan secara statis murni di sisi browser. Keamanan terjamin (nol risiko SQL injection atau eksploitasi server PHP), beban hosting sangat ringan, dan integrasi transaksi dilakukan secara langsung melalui *Direct WhatsApp Deep-Linking*.
3. **Zero Silent Failure**: Setiap tombol dan elemen interaktif terikat ke handler event terverifikasi dengan feedback visual instan.

---

## 2. Struktur Direktori Proyek

Susunan file dan folder dalam repositori:

```text
twinnie-group/
├── index.html                   # Halaman Utama (Beranda & Katalog 4 Pilar Layanan)
├── tentang-kami.html            # Profil Perusahaan, Dewan Tenaga Ahli Medis, Visi-Misi
├── kemitraan.html               # Proposal Investasi Syariah, Metode Sukuk & Skema Modal
├── components/                  # File Komponen Modular Terstandarisasi (SSoT)
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

## 3. Arsitektur Komponen & Fitur Kunci

### A. Komponen Modular Terstandarisasi (`components/`)
Elemen antarmuka berulang dikelola dalam folder `components/` sebagai Single Source of Truth (SSoT):
- **`components/navbar.html`**: Header sticky dengan logo, navigasi utama, link media sosial, dan pemicu modal pemesanan.
- **`components/footer.html`**: Master footer yang memuat strip 9 mitra resmi lengkap dengan logo dan nama, 4 kolom navigasi, detail 3 cabang outlet, dan kontak resmi.
- **`components/booking-modal.html`**: Formulir pemesanan terpadu dengan kalkulasi harga transparan (*Outlet vs Home Visit*).
- **`components/floating-action.html`**: Tombol tindakan cepat mengambang di pojok kanan bawah.

### B. Katalog Layanan Reaktif & Dual-Pricing (`services-data.js` & `booking.js`)
Layanan Twinnie Group dibagi menjadi 4 pilar resmi:
1. **Twinnie Care (`baby-spa`)**: Perawatan bayi baru lahir (*newborn care*), pijat bayi/anak, terapi batuk pilek, tindik steril, serta seluruh perawatan ibu maternal (pijat laktasi oksitosin, bendungan ASI, dan pijat relaksasi pascasalin).
2. **Allura Woman Spa (`woman-spa`)**: Spa eksklusif wanita dengan kebijakan Visit Outlet & Langsung Chat WhatsApp di Jl. Kadaka No.11 Malang.
3. **Nimpuna Terapi Holistik (`holistic`)**: Terapi otot akupresur, bekam medik steril, dan penanganan skoliosis/saraf kejepit.
4. **Biro Psikologi Rumah Ameera (`psikolog`)**: Konseling keluarga, pendampingan *baby blues*, hipnoterapi klinis, dan Mental Health Check-Up (MHCU).

**Sistem Tarif Ganda (Dual-Pricing)**:
Setiap paket memiliki kalkulasi tarif terpisah antara **Di Outlet** vs **Home Visit** (Home Visit mencakup radius Kota Malang, Kab. Malang & Kota Batu maks. 10 km).

### C. Modal Pemesanan Responsif
- **Pada Desktop / Layar Lebar**: Layout 3 kolom terpadu:
  - Kolom 1 (`lg:col-span-4`): Media display, galeri dokumentasi, dan jaminan klinis.
  - Kolom 2 (`lg:col-span-4`): Keterangan paket terpilih, rincian manfaat, dan rincian tarif transparan.
  - Kolom 3 (`lg:col-span-4`): Formulir interaktif (tempat, add-ons, identitas, tanggal/jam) dan pemicu WhatsApp.
- **Pada Smartphone**: Tampilan terintegrasi kompak yang memprioritaskan keterbacaan data, formulir terarah, dan tombol pemesanan WhatsApp langsung.

### D. Arsitektur Parallax & Tirai Bergantian (*Alternating Curtain Parallax*)
- **Section Parallax (`.parallax-section`)**: Lapisan foto berkedalaman dengan pergerakan `translate3d` halus via GPU compositor, dilapisi frosted veil. Menggunakan `isolation: isolate` untuk menjamin stacking context lokal mandiri.
- **Section Tirai Solid (`.curtain-solid-section`)**: Warna solid hangat (`#FFFDF9`) yang meluncur di atas section foto untuk kenyamanan membaca.

---

## 4. Panduan Pemeliharaan & Operasional

### A. Menjalankan Proyek di Komputer Lokal
Proyek berbasis file HTML statis:
1. **Menggunakan Laragon / XAMPP**: Tempatkan folder di direktori web root (misal `D:\laragon\www\twinnie-group`), buka browser dan akses URL lokal.
2. **Menggunakan Local HTTP Server**:
   ```bash
   # Menggunakan Python:
   python -m http.server 8080
   # Buka http://localhost:8080 di browser
   ```

### B. Kompilasi Stylesheet (Tailwind CLI)
Ketika menambahkan utility class baru atau mengubah `assets/css/input.css`:
```bash
# Kompilasi minifikasi produksi:
npm run build:css

# Atau via Tailwind CLI langsung:
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/style.css --minify
```

### C. Menambah atau Mengubah Paket Layanan
Daftar paket dikelola terpusat di [`assets/js/services-data.js`](file:///D:/laragon/www/twinnie-group/assets/js/services-data.js):
1. Buka kategori layanan yang relevan (`baby-spa`, `woman-spa`, `holistic`, `psikolog`).
2. Tambahkan atau perbarui data paket dalam array `packages`:
   ```javascript
   {
     id: 'paket-baru',
     name: 'Nama Paket Baru',
     duration: '60 Menit',
     age: '0 - 2 Tahun',
     outletPrice: 95000,
     homePrice: 110000,
     homevisitAllowed: true,
     desc: 'Deskripsi manfaat klinis paket...',
     notes: 'Persiapan sebelum terapis hadir...'
   }
   ```
3. Simpan berkas; modal pemesanan dan kalkulasi harga terhubung secara otomatis.

---

## 5. Checklist Verifikasi Rilis (Quality Assurance)

Sebelum rilis atau sinkronisasi pembaruan, verifikasi kriteria berikut:
- [x] **Zero Silent Failure**: Seluruh tombol interaktif memiliki event listener dan atribut terkait.
- [x] **Aksesibilitas (A11y)**: Seluruh elemen interaktif memiliki atribut `aria-label` yang jelas.
- [x] **Integritas Gambar**: Semua tag `<img>` memiliki atribut `alt` deskriptif dan `loading="lazy"`.
- [x] **Bebas Artefak GPU**: Tidak menggabungkan `mix-blend-mode: multiply` dengan `backdrop-filter: blur`.
- [x] **Parallax Stacking Context**: Container parallax menyertakan kelas `parallax-section` dan `isolation: isolate`.
- [x] **Minifikasi Stylesheet**: `style.css` terkompresi bersih (< 50 KB).
- [x] **Sinkronisasi Komponen**: Komponen inline pada `index.html`, `tentang-kami.html`, dan `kemitraan.html` selaras dengan file di `components/`.
