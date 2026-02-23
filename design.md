# Twinnie Group - Konsep Desain, Design System & Panduan Arsitektur UI/UX (v2.7)

> Dokumen acuan resmi desain antarmuka, arsitektur visual, sistem tipografi, warna, tata letak, dan interaktivitas website Twinnie Group.

---

## 1. Tujuan Desain (Design Objectives)

1. **Arus Informasi Keterbacaan (Clear Information Flow & Scannability)**:
   - Pengunjung dapat memahami penawaran utama Twinnie Group dalam 3 detik pertama (*3-second rule*).
   - Pola baca berarah Z dan F yang natural: Logo & Identitas → Slogan Emosional ("Ketulusan Hati Membawa Keajaiban") → Bukti Kredibilitas Layanan → Pilihan Tindakan (Reservasi atau Kemitraan).
2. **Terstruktur (Logical Information Architecture)**:
   - Navigasi disederhanakan menjadi 3 pilar esensial: **Beranda**, **Tentang Kami**, dan **Kemitraan**.
   - Setiap halaman memiliki hierarki tajuk tunggal (H1) yang jelas, didukung H2 per section dan H3 untuk modul layanan.
3. **Simplicity (Kesederhanaan Visual & Zero Clutter)**:
   - Menghilangkan elemen visual dekoratif yang berlebihan atau memecah konsentrasi.
   - Mengalihkan fokus pengunjung langsung pada demonstrasi kualitas layanan nyata (kartu multimedia, video terapis, dan testimoni autentik).
4. **Memorable (Ciri Khas & Kepercayaan Tinggi)**:
   - Memadukan nuansa kehangatan pengasuhan ibu & anak (*maternal warmth*) dengan standar higienis medis berlisensi (*clinical credibility*).
   - Pengalaman visual ramah untuk segala usia (*multigenerational design*), termasuk generasi *baby boomer* (orang tua/kakek-nenek pemesan layanan).

---

## 2. Analisis Keanggunan (Elegance Analysis) Website Sebelumnya (`ref.php`)

Mengapa starter website sebelumnya (`ref.php`) terasa begitu elegan, mewah, dan menenangkan (*high-end, serene & airy*)? Berikut 5 pilar estetika utamanya:

1. **Fotografi Bernapas dengan Multiply Blend Mode (`mix-blend-mode: multiply`)**:
   - `ref.php` tidak mengurung konten dalam kotak gelap pekat atau lapisan solid kusam yang mematikan foto.
   - `ref.php` menggabungkan foto fotografi bertekstur hangat (`assets/img/hero-3.jpg`) dengan lapisan warna rose maternal (`rgba(236, 72, 153, 0.90)`) menggunakan teknik blending `mix-blend-mode: multiply`.
   - *Hasil Estetika*: Area bayangan foto tetap memiliki kedalaman beludru (*velvety photographic depth*), sedangkan area terang menyerap rona merah jambu hangat keibuan yang hidup dan bercahaya. Foto tidak tertutup, melainkan "bernapas" secara organik.

2. **Tipografi Editorial Terapung & Whitespace Lega (Airy Unboxed Editorial Typography)**:
   - Sisi kiri hero pada `ref.php` **tidak dikurung dalam kartu kotak kaca buatan (*unboxed*)**.
   - Teks dibiarkan mengapung secara bebas (*free-floating*) dengan ruang bernapas (*whitespace*) yang lapang.
   - Slogan emosional *“Ketulusan Hati Membawa Keajaiban”* menggunakan tipografi berukuran megah dengan bayangan teks lembut (`hero-text-shadow`), menghadirkan impresi editorial majalah kecantikan & kesehatan premium ala Jepang (*editorial serenity*).
   - Label kategori berbentuk pil semi-transparan (`bg-white/20 backdrop-blur-md`) yang menyatu dengan harmonis tanpa batas garis yang kaku.

3. **Floating Island Media Frame (Pulau Media Bersih Berbayangan Dalam)**:
   - Di sisi kanan, showcase multimedia dibingkai dalam kartu putih bersih berbayangan lembut dalam (`.floating-island` dengan `bg-white/95 rounded-3xl shadow-2xl`).
   - Kartu ini berperan bagaikan bingkai lukisan di galeri seni modern: bersih, kontras tinggi terhadap latar belakang mawar, dan menonjolkan video interaksi bidan/bayi sebagai daya tarik utama tanpa dekorasi berlebihan (*zero visual noise*).

4. **Mikro-Interaksi Mewah & Sentuhan Taktil (Boutique Luxury Micro-Interactions)**:
   - **Garis Bawah Navigasi Meluncur (`.menu-underline`)**: Pada desktop navbar, tautan menu memiliki animasi garis gradien rose (`linear-gradient(90deg, #ec4899, #f43f5e)`) yang meluncur mulus dari kiri ke kanan saat kursor diarahkan, menghadirkan nuansa butik kelas atas.
   - **Tombol Navigasi Kaca Melingkar (`prevService` & `nextService`)**: Berupa lingkaran kaca putih melayang (`w-12 h-12 rounded-full bg-white/90 shadow-lg hover:shadow-xl active:scale-95`) yang sangat taktil dan menyenangkan saat diklik.
   - **Titik Navigasi Dinamis (`#dots`)**: Indikator titik yang membesar halus (*scale-125*) saat layanan aktif berganti.

5. **Ketiadaan Polusi Visual (Absence of Visual Clutter & Heavy Borders)**:
   - Menghindari penggunaan garis tepi tebal berganda, efek gradien gelap yang berat, atau elemen badge yang saling bertumpuk.
   - Setiap elemen memiliki tujuan fungsional dan emosional yang jelas.

---

## 3. Elemen Desain (Design Elements)

### A. Palet Warna (Consistent Color Palette)
Warna dirancang untuk memancarkan cinta kasih, ketenangan medis, dan kenyamanan:
- **Primary Brand Rose**: `#ff3ba5` (Tailwind Pink 500) & `#f43f5e` (Tailwind Rose 500) — Melambangkan kelembutan bayi, sentuhan kasih ibu, dan keramahan.
- **Deep Rose Accent**: `#e11d48` (Tailwind Rose 600) & `#9f1239` (Tailwind Rose 800) — Digunakan untuk status aktif navigasi, tombol penting, dan penekanan visual.
- **Medical / Holistic Teal**: `#0d9488` (Tailwind Teal 600) & `#10b981` (Tailwind Emerald 500) — Melambangkan kesembuhan alami, terapi holistik TCM, dan stabilitas kesehatan.
- **Warm Surface Base**: `#FFFDF9` (Stone-50/Ivory Warm) — Menggantikan warna putih menyilaukan (*harsh white*) dengan permukaan hangat yang nyaman di mata lansia (*anti-eye strain*).
- **Text & Contrast Slate**:
  - Judul & Body Teks Utama: `#0f172a` (Slate 900) — Memberikan rasio kontras maksimal (> 12:1).
  - Teks Deskriptif: `#475569` (Slate 600) / `#334155` (Slate 700) — Memenuhi standar WCAG AA (rasio kontras > 4.5:1).
- **Hero Multiply & Readability Overlays**:
  - Latar Belakang Parallax: `assets/img/hero-3.jpg`.
  - `.accent-overlay`: `rgba(236, 72, 153, 0.90)` dipadukan `linear-gradient(135deg, rgba(236, 72, 153, 0.90) 0%, rgba(225, 29, 72, 0.86) 100%)` dengan `mix-blend-mode: multiply`.
  - `.hero-readability`: Gradien pudar lembut ke bawah (`rgba(255, 253, 249, 1)`) yang menyatukan section hero ke latar belakang halaman secara mulus (*seamless transition*).
  - Slogan Hero: `“Ketulusan Hati <span class="text-rose-200">Membawa Keajaiban</span>”` dengan bayangan teks `hero-text-shadow`.

### B. Tipografi (Strict 2 Font System & Normalized Form Typography)
Hanya menggunakan **2 font pilihan** berstandar global:
1. **Font Heading**: `'Plus Jakarta Sans', sans-serif`
   - Karakter: Modern, bersahabat, tegas, geometris dengan sentuhan humanis.
   - Ketebalan: Bold (700), Extra Bold (800), Black (900).
   - Penerapan: Semua judul (`h1`, `h2`, `h3`, `h4`), angka tarif, dan badge penting.
2. **Font Body & Interface**: `'Inter', system-ui, -apple-system, sans-serif`
   - Karakter: Keterbacaan ultra-tinggi pada layar digital kecil hingga besar, *tall x-height*.
   - Ketebalan: Regular (400), Medium (500), Semi Bold (600).
   - **Normalkan Ukuran Tulisan Form**: Seluruh label form dinormalkan ke `text-xs font-semibold text-slate-700` atau `text-sm font-semibold text-slate-800`, input field nyaman dengan padding proporsional `px-2.5 py-1.5` hingga `px-3.5 py-2.5`, menghindari teks mikro yang sulit dibaca.

### C. Bentuk & Sudut (Geometry & Shapes)
- **Sudut Lengkung Halus (Soft Curvature)**:
  - Tombol aksi & badge: `rounded-full` (Pills format).
  - Kartu kontainer & modal: `rounded-3xl` (24px) dan `rounded-2xl` (16px).
  - Menghindari sudut tajam kaku (*sharp corners*) guna mencerminkan rasa aman (*psychological safety*) bagi ibu dan bayi.
- **Hero Multimedia Controls & Full Mobile Responsive Width**:
  - Pada layar smartphone/mobile, kartu multimedia didesain **penuh selebar layar ponsel** (`w-full lg:w-[420px] xl:w-[440px]`).
  - Kontrol navigasi mobile (`prevServiceMobile` dan `nextServiceMobile`) mengisi lebar penuh secara seimbang (`w-full flex gap-2.5 sm:gap-3`, masing-masing `flex-1 py-3 sm:py-3.5`) seperti perilaku pada starter `ref.php`.
  - Frame media menggunakan rasio proporsional `aspect-[16/10] max-h-[250px] sm:max-h-[280px]` sehingga video dan foto terapis tampil tajam tanpa memakan tinggi berlebih.
  - Teks deskripsi di bawah frame (`#serviceTitle`, `#serviceSubtitle`, `#serviceCaption`) berada di dalam container `bg-rose-50/70 border border-rose-100` dengan kontras tinggi sehingga 100% terbaca jelas.

### D. Tata Letak, Margin & Jarak (Spacing System)
- Mengadopsi sistem grid kelipatan 8 (8pt spacing system):
  - Padding section: `py-16 lg:py-24`
  - Gutter grid kartu: `gap-6 lg:gap-8`
  - Spasi vertikal antar elemen teks: `space-y-4`
- Whitespace lega (*breathing room*) mencegah kelelahan visual pengunjung saat menelusuri katalog layanan.

---

## 3. Penerapan Prinsip Desain (Design Principles)

### A. Kontras (Contrast)
- Seluruh teks memenuhi atau melampaui standar **WCAG 2.1 AA** (rasio minimal 4.5:1 untuk teks normal dan 3.0:1 untuk teks besar).
- Pada Hero section, teks putih dan aksen rose lembut diletakkan di dalam kontainer *rose frosted glass* (`rose-glass-card`), menghasilkan kontras rasio melebihi 11:1.

### B. Hierarki Visual (Visual Hierarchy)
- **Primary Anchor**: H1 ("Ketulusan Hati Membawa Keajaiban") langsung menarik atensi pertama.
- **Secondary Anchor**: Kategori layanan yang dapat diklik (`👶 Twinnie Care`, `💆‍♀️ Allura Spa`, `🌿 Terapi Holistik`, `🧠 Biro Psikologi`).
- **Tertiary Anchor**: Smartphone media showcase interaktif dengan video terapis, thumbnail reel, dan detail keunggulan klinis.
- **Conversion Anchor**: Tombol Pesan Layanan (warna Rose cerah) dan Tombol Kemitraan WA.

### C. Rule of Proximity (Hukum Kedekatan)
- Elemen-elemen yang saling berkaitan dikelompokkan secara rapat dalam satu kartu:
  - Contoh kartu outlet: Peta iframe, badge kategori, alamat cabang, jam operasional, dan tombol aksi (Buka Rute & Chat WhatsApp) dikurung dalam satu container kartu terpadu.
  - Form reservasi: Pilihan tempat (Outlet vs Home Visit) diletakkan bersisian dengan alamat/pilihan cabang yang bersangkutan.

### D. Keseimbangan Simetris vs Asimetris
- **Keseimbangan Simetris (Harmoni & Kesetaraan)**:
  - Diterapkan pada **Jaringan Outlet 3 Kolom (`#lokasi`)**: Ketiga outlet (Twinnie Care, Allura Woman Spa, dan Biro Psikologi Rumah Ameera) memiliki kartu berukuran sama, tinggi iframe peta sama (`h-52`), dan tata letak tombol aksi yang setara.
  - Diterapkan pada Footer 4-kolom dan Grid 9 Mitra Resmi.
- **Keseimbangan Asimetris (Penekanan & Visual Interest)**:
  - Diterapkan pada **Hero Section (Split 60/40)**: Sisi kiri berperan sebagai pilar tekstual dan pesan emosional, sedangkan sisi kanan menyajikan demonstrasi visual multimedia dinamis kartu media.

---

## 4. Pemisahan Komponen Modular (Reusable Components)

Seluruh komponen berulang dipisahkan dalam folder `components/` agar seragam, DRY (*Don't Repeat Yourself*), dan mudah dikelola:
1. `components/navbar.html`: Header navigasi bersih dengan 3 menu utama (*Beranda*, *Tentang Kami*, *Kemitraan*), logo brand, dan tombol Pesan.
2. `components/floating-action.html`: Floating Action Buttons compact (`bottom-4 right-4`) berisi tombol WhatsApp Kemitraan dan Reservasi Layanan.
3. `components/booking-modal.html`: Modal pemesanan responsif memenuhi layar laptop (3-kolom) & terbagi 2 section dalam 1 tampilan cohesive pada HP.
4. `components/footer.html` (Master Footer Reusable):
   - Dipisahkan sebagai *Single Source of Truth (SSOT)* master footer.
   - Digunakan secara seragam dan konsisten di halaman `index.html`, `tentang-kami.html`, dan `kemitraan.html`.
   - Menggunakan wrapper `<footer id="siteFooter" class="curtain-solid-section bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-900 text-sm relative z-20">`.
   - Didukung helper JavaScript `loadModularComponents()` di `main.js` untuk resolusi otomatis komponen berbasis atribut `data-component`.

---

## 5. Integrasi Layanan Twinnie Care & Kebijakan Allura Woman Spa (Instructions 5 & 6)

### A. Pengalihan Paket Perawatan Ibu ke Twinnie Care & Eliminasi Pelatihan
- **Seluruh paket perawatan ibu (maternal care) dialihkan sepenuhnya ke Twinnie Care (`baby-spa`)**:
  1. *Pijat ASI Lancar & Stimulasi Oksitosin* (90 Menit, Outlet Rp 130.000 / Home Visit Rp 145.000)
  2. *Pijat Bendungan ASI & Drainase Payudara Keras* (90-120 Menit, Outlet Rp 170.000 / Home Visit Rp 185.000)
  3. *Pijat Relaksasi Full Body Ibu Pascasalin* (60 Menit, Outlet Rp 135.000 / Home Visit Rp 150.000)
  4. *Pijat Relaksasi Aromaterapi Full Body Ibu* (90 Menit, Outlet Rp 165.000 / Home Visit Rp 180.000)
- **Paket Pelatihan Dihapuskan (Zero Training Packages)**:
  - Seluruh paket komersial pelatihan/diklat terapis baby spa berbayar Allura telah dieliminasi 100% dari katalog layanan dan antarmuka pemesanan.
  - Fokus dipusatkan murni pada pelayanan kesehatan, kenyamanan, dan terapi keluarga.

### B. Allura Woman Spa: Visit Outlet & Langsung Chat WhatsApp (Instruction 6)
- **Model Layanan Allura Daily Spa**:
  - Allura diposisikan khusus sebagai spa eksklusif wanita dengan skema **Visit Outlet** langsung di Jl. Kadaka No.11 Malang.
  - Menghilangkan kerumitan form bertingkat untuk Allura; seluruh kartu showcase dan tombol aksi menyediakan akses langsung:
    1. **Buka Rute**: Menampilkan navigasi peta Google Maps langsung menuju outlet.
    2. **Chat WhatsApp**: Langsung membuka tautan obrolan WhatsApp terverifikasi (`+62 897-270-3833`) untuk konsultasi dan booking jadwal secara personal.
- **Dalam Modal Pemesanan**:
  - Jika pengunjung memilih kategori "Allura Woman Spa", sistem secara otomatis menetapkan paket *Visit Outlet & Langsung Chat WhatsApp* dengan tarif *Visit Outlet*, menonaktifkan Home Visit, dan menyusun pesan WhatsApp reservasi kunjungan secara otomatis.

---

## 6. Arsitektur Modal Pemesanan Responsif

### A. Tampilan Laptop (Expansive Screen Viewport - 3 Kolom Penuh Layar)
- Modal memenuhi layar secara luas (`fixed inset-0 sm:p-3 lg:p-5 xl:p-6 w-full h-full sm:h-auto lg:h-[94vh] lg:max-h-[96vh]`).
- Terbagi menjadi **3 kolom lega berdampingan** (`lg:grid lg:grid-cols-12 lg:divide-x divide-slate-200`):
  1. **Kolom 1 (`lg:col-span-4`, latar `bg-stone-50/70`)**: Khusus Gambar dan Video Display, galeri thumbnail dokumentasi, dan 3 poin standar mutu klinis berlisensi.
  2. **Kolom 2 (`lg:col-span-4`, latar `bg-white`)**: Keterangan paket terpilih, badge durasi & usia, deskripsi manfaat medis, dan rincian tarif transparan (tarif pokok, add-ons terpilih, total estimasi).
  3. **Kolom 3 (`lg:col-span-4`, latar `bg-slate-50/50`)**: Formulir reservasi interaktif dengan kontrol lokasi, add-ons, tanggal/jam, dan pengiriman WhatsApp otomatis.

### B. Tampilan HP (2 Section dalam 1 Tampilan Cohesive Viewport Tanpa Scroll Panjang)
- Pada perangkat mobile, arsitektur modal dirancang **1 tampilan utuh (cohesive single-view)** tanpa membebani jari pengguna untuk melakukan scroll panjang:
  - **Section 1 (Khusus Gambar & Video Display)**:
    * Dibuat selebar layar penuh (`w-full`), namun tingginya dibatasi secara elegan menjadi siluet banner visual **15% - 20% tinggi layar ponsel** (`h-[16vh] sm:h-[18vh] min-h-[110px] max-h-[135px]`).
    * Dilengkapi gradien siluet gelap rose sinematik, badge lokasi di outlet, dan jaminan higienis medis.
  - **Section 2 (Formulir, Keterangan Paket & Detail Harga Terintegrasi)**:
    * Meminimalkan ukuran input form dan memangkas teks redundan.
    * Input disusun rapat dalam grid 2-kolom (`grid grid-cols-2 gap-2` untuk Kategori/Paket, Nama/WhatsApp, Tanggal/Jam).
    * Pilihan tempat (Di Outlet / Home Visit) disajikan ringkas berdampingan.
    * **Harga Total Langsung Terpampang di Section 2**: Judul paket diletakkan bersisian dengan total harga estimasi (`#previewTotalPriceMobile`), sehingga pengguna mobile dapat langsung melihat harga terkini, memasukkan identitas, dan menekan tombol WhatsApp dalam **1 tampilan layar tanpa scroll**.

---

## 7. Aksesibilitas Baby Boomer & Standar WCAG 2.1 AA

1. **Touch Targets Ramah Lansia**:
   - Tombol memiliki tinggi minimal 48px–54px dengan padding horizontal longgar.
   - Ukuran teks form disesuaikan agar tidak memicu *auto-zoom* browser pada perangkat mobile (`text-sm` / 16px).
2. **Zero Silent Failure**:
   - Seluruh event handler tombol terikat secara reaktif.
   - Validasi formulir real-time dengan pesan toast ramah pengguna.
3. **Motion Safe**:
   - Dilengkapi media query `@media (prefers-reduced-motion: reduce)` yang mematikan transisi berlebihan bagi pengguna yang sensitif terhadap gerakan.

---

## 8. Optimasi Kecepatan & SEO Internasional

- **Sub-Second Element Load (< 1s)**:
  - Precompiled Tailwind CSS terkompresi (`assets/css/style.css` ~48 KB).
  - Gambar menggunakan format teroptimasi lokal dengan atribut `loading="lazy"`.
  - Font Google Plus Jakarta Sans & Inter preloaded dengan `font-display: swap`.
- **Best Practice SEO**:
  - Semantic HTML5 lengkap (`<main>`, `<header>`, `<nav>`, `<section>`, `<article>`, `<aside>`, `<footer>`).
  - Metadata OpenGraph (Facebook/WhatsApp) & Twitter Card dengan gambar hero resolusi tinggi.
  - Skema Terstruktur JSON-LD:
    * `MedicalBusiness` & `LocalBusiness`
    * Geocoordinates Malang Raya
    * Layanan kesehatan ibu, anak, psikologi, dan spa
  - Struktur link internal yang bersih dan ramah mesin pencari.

---

## 9. Arsitektur Efek Parallax & Tirai Bergantian (Alternating Parallax & Curtain System)

Untuk menghadirkan estetika website yang benar-benar elegan, tenang, hangat, dan mewah (*luxurious, serene & warm*), seluruh halaman (`index.html`, `tentang-kami.html`, `kemitraan.html`) menerapkan sistem transisi **selang-seling antara gambar latar dan warna solid**:

### A. Pola Cadence Selang-Seling Berkontras Tinggi per Halaman
1. **`index.html` (Beranda)**:
   - **Section 1 [GAMBAR]**: Hero Utama (`assets/img/hero-3.jpg` + `.hero-pink-glass-layer`)
   - **Section 2 [WARNA]**: Katalog 4 Pilar Layanan (`#layanan`, Solid White `bg-white` border `border-rose-100`)
   - **Section 3 [GAMBAR]**: Bukti Sosial & Testimoni Pasien (`#testimonials`, `assets/img/Bekam.jpg` + `.parallax-rose-veil`)
   - **Section 4 [WARNA]**: Tenaga Ahli & Dokter Praktisi (Warm Ivory `#FFFDF9` dengan kartu putih bersih)
   - **Section 5 [GAMBAR]**: Jaringan Outlet & Peta Cabang (`#lokasi`, `assets/img/woman-allura.jpg` + `.parallax-glass-veil`)
   - **Section 6 [WARNA]**: Pertanyaan Umum (`#faq`, Solid White `bg-white`)
   - **Section 7 [WARNA]**: Master Footer (`bg-slate-950`)

2. **`tentang-kami.html`**:
   - **Section 1 [GAMBAR]**: Hero Profil Twinnie Group (`hero-3.jpg` + `.hero-pink-glass-layer`)
   - **Section 2 [WARNA]**: Sejarah Perjalanan & Milestone Bidan Indah (`bg-white`)
   - **Section 3 [GAMBAR]**: Visi, Misi & Komitmen Medis (`baby-4.jpg` + `.parallax-glass-veil`)
   - **Section 4 [WARNA]**: 5 Nilai Utama Pelayanan (Warm Ivory `#FFFDF9`)
   - **Section 5 [GAMBAR]**: Dewan Tenaga Ahli Medis (`#tenaga-ahli`, `Bekam.jpg` + `.parallax-rose-veil`)
   - **Section 6 [WARNA]**: Afiliasi & Kolaborasi Klinis (`bg-slate-50`)
   - **Section 7 [GAMBAR]**: Peta Lokasi & Cabang Outlet (`#lokasi`, `woman-allura.jpg` + `.parallax-rose-veil`)
   - **Section 8 [WARNA]**: Call-to-Action & Master Footer (`bg-rose-500` & `bg-slate-950`)

3. **`kemitraan.html`**:
   - **Section 1 [GAMBAR]**: Hero Sukuk Syariah & Investasi Twinnie (`hero-3.jpg` + `.hero-pink-glass-layer`)
   - **Section 2 [WARNA]**: 4 Pilar Model Kemitraan & Proteksi Modal (`bg-white`)
   - **Section 3 [GAMBAR]**: Jaringan Outlet & Fasilitas Fisik (`#lokasi`, `woman-allura.jpg` + `.parallax-rose-veil`)
   - **Section 4 [WARNA]**: Master Footer (`bg-slate-950`)

### B. Resolusi Teknis: Bug Gambar Putih & Artefak Bercak Hitam GPU
1. **Penyebab Gambar Tidak Muncul / Putih**:
   - Sebelumnya, `.parallax-section` tidak memiliki `isolation: isolate` atau `z-index` lokal.
   - Elemen gambar anak dengan `z-index: -20` atau `-z-10` ditempatkan oleh engine perender browser di belakang latar belakang `<body>` (yang berwarna padat `#FFFDF9`). Akibatnya, gambar tertutup 100% oleh warna body.
   - Selain itu, veil sebelumnya menggunakan opasitas 90% (`rgba(..., 0.90)`) yang mematikan detail foto.
2. **Penyebab Noda / Bercak Hitam (*Black Patches*)**:
   - Kombinasi `mix-blend-mode: multiply` bersamaan dengan `backdrop-filter: blur(...)` memicu bug *GPU alpha-channel clamping* pada engine Chromium (DirectX/ANGLE di Windows). Alpha channel backdrop di-clamp ke hitam legam, menghasilkan noda/kotak hitam di atas area hero.
3. **Solusi Arsitektur Bertingkat (*Isolated Stacking Context*)**:
   - **Container (`.parallax-section`)**: Diberikan `isolation: isolate; z-index: 1; position: relative; overflow: hidden;`. Ini menciptakan stacking context mandiri sehingga z-index elemen anak terkunci di dalam section dan tidak bocor ke belakang body.
   - **Layer Foto (`.parallax-bg-layer`)**: Diberikan `z-index: 1; position: absolute; pointer-events: none;` untuk menjamin foto dirender tajam dan pasti terlihat.
   - **Layer Kaca Merah Muda (`.hero-pink-glass-layer`, `.parallax-glass-veil`, `.parallax-rose-veil`)**: Diberikan `z-index: 2;` dengan opasitas seimbang (`rgba(255, 240, 245, 0.72)` hingga `0.75`), `backdrop-filter: blur(4px)`, dan **seluruh `mix-blend-mode: multiply` dihapus 100%** sehingga bebas artefak hitam GPU.
   - **Layer Konten (`relative z-10`)**: Teks, judul, dan tombol ditaruh pada z-index 10 di atas seluruh layer kaca.
   - **Tirai Solid (`.curtain-solid-section`)**: Diberikan `position: relative; z-index: 20; background-color: #fffdf9;` dengan *box-shadow* lembut, sehingga saat digulir, section warna solid meluncur mulus di atas section foto bagai tirai teater.

### C. Performa Parallax Ringan & Bebas Jank (GPU Accelerated)
- Pergerakan lapisan foto menggunakan `transform: translate3d(0, Y, 0)` yang dijadwalkan hemat daya melalui `requestAnimationFrame`.
- Loop multi-section parallax di `main.js` mengecualikan `hero-bg` untuk menghindari komputasi ganda atau flickering.
- Kecepatan offset parallax diset lembut (`0.15`–`0.22`) untuk kenyamanan visual (*subtle motion*) dan menghormati media query `prefers-reduced-motion`.

### D. Penyelarasan Layer Rose Sesuai Best Practice & Footer Ergonomis (Instructions 6, 7 & 8)
- **Layer Penutup Gambar Berwarna Rose (Formula Gradien & Opasitas Terbaik - Best Practice)**:
  * **Kombinasi Warna & Sudut Gradien**: Menggunakan gradien maternal multidimensi `linear-gradient(135deg, rgba(225, 29, 72, 0.88) 0%, rgba(236, 72, 153, 0.84) 50%, rgba(244, 63, 94, 0.82) 100%)` (desktop: `0.86` s/d `0.80`) dengan `mix-blend-mode: multiply;`.
  * **Alasan Desain & Aksesibilitas**:
    1. *Fotografi Tetap Bernapas*: Opasitas 0.82–0.88 memastikan subjek foto (ibu, bayi, terapis klinis) tetap tampak jelas, hangat, dan hidup tanpa tertutup blok warna kaku (menghindari opasitas 0.99 yang mematikan foto).
    2. *Kontras Teks Putih Maksimal*: Menghasilkan latar dengan luminansi yang cukup gelap sehingga teks putih (`#FFFFFF`) dan aksen rose muda (`#FECDD3`) mencapai rasio kontras prima > 8.5:1 (melampaui standar WCAG AAA).
    3. *Bebas Artefak GPU*: Menghilangkan `backdrop-filter: blur` pada layer multiply blend untuk menjamin bebas rendering glitch di segala perangkat.
  * **Lapisan Keterbacaan Dua Arah (`.hero-readability`)**:
    * Menggunakan `position: absolute; inset: 0; pointer-events: none; z-index: 3;`.
    * Latar gradien: `linear-gradient(to bottom, rgba(15, 23, 42, 0.18) 0%, rgba(15, 23, 42, 0.00) 40%, rgba(255, 253, 249, 0.35) 85%, rgba(255, 253, 249, 0.95) 100%)`.
    * Menghadirkan bayangan tipis di bagian atas agar header transparan tetap terbaca, dan larut mulus (*soft dissolve*) ke latar belakang warm ivory (`#FFFDF9`) di bagian bawah.
  * **Penerapan Konsisten**: Diterapkan secara identik pada section hero di `index.html`, `tentang-kami.html`, dan `kemitraan.html`.

- **Komponen Footer Sesuai Kombinasi Warna & Best Practice (Warm Maternal Obsidian - Instruction 5 & 7)**:
  * **Warna Background Maternal Obsidian & Ambient Rose Glow (`.footer-warm-dark`)**:
    * Menggantikan latar slate kebiruan dingin (`bg-slate-900`) yang bertabrakan dengan palet Warm Ivory (`#FFFDF9`) dan Maternal Rose.
    * Menggunakan formula khusus: `background-color: #0e0912 !important;` dipadukan `radial-gradient(ellipse 90% 50% at 50% 0%, rgba(225, 29, 72, 0.16) 0%, transparent 75%)` dan `linear-gradient(180deg, #140d18 0%, #0c0710 100%) !important;` dengan garis batas atas hangat `border-top: 1px solid rgba(244, 63, 94, 0.25) !important;`.
    * Dilengkapi halo ambient cahaya mawar halus di puncak footer (`absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-5xl h-36 bg-rose-500/10 blur-3xl pointer-events-none`).
  * **Kanvas Memenuhi Layar Penuh (Edge-to-Edge Canvas)**: Menggunakan `<footer id="siteFooter" class="curtain-solid-section footer-warm-dark text-slate-200 pt-16 pb-12 text-sm relative z-20 w-full overflow-hidden">` yang mengisi 100% lebar layar viewport tanpa celah tepi.
  * **Kontainer Konten Ergonomis**: Menggunakan pembatas dalam `w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8` agar pada resolusi ultrawide (1440p, 4K) kolom informasi tidak terlempar ke sudut ekstrem, menjaga kenyamanan pemindaian mata manusia (*visual ergonomics*).
  * **Kartu Mitra Translusen Mewah (Translucent Glass Partner Cards)**: Menggunakan permukaan kaca lembut `bg-white/[0.04] hover:bg-white/[0.08] border border-white/[0.08] hover:border-pink-400/50 backdrop-blur-2xs shadow-2xs` dengan wadah logo putih bersih (`w-11 h-11 sm:w-12 sm:h-12 bg-white p-1 rounded-xl shadow-md`), memastikan seluruh logo mitra tampil tajam, bersih, dan berwibawa.
  * **Harmoni Warna Aksen**:
    - Twinnie Care: Aksen Pink/Rose (`text-white group-hover:text-pink-300`)
    - Allura Spa: Aksen Pink/Rose (`text-white group-hover:text-pink-300`)
    - Nimpuna & Kemitraan: Aksen Emerald/Teal (`text-white group-hover:text-emerald-300`)
    - Biro Psikologi: Aksen Indigo (`text-white group-hover:text-indigo-300`)

- **Harmoni Elemen Halaman dan Tulisan Lintas Halaman (Instruction 8)**:
  * **Prinsip Kontras Latar vs Teks**:
    - Section berlatar foto dengan veil rose gelap (`.parallax-rose-veil`, seperti `#lokasi` dan `#tenaga-ahli`): Tajuk section menggunakan teks putih (`text-white font-black tracking-tight hero-text-shadow`) dengan badge pil transparan (`bg-white/20 text-white border border-white/30`).
    - Kartu konten di atasnya menggunakan gaya *floating white island* (`bg-white rounded-3xl shadow-xl`) dengan teks arang gelap (`text-slate-900`) untuk kontras tajam > 12:1.
    - Section berlatar tirai solid (`#FFFDF9` atau `#ffffff`): Tajuk menggunakan `text-slate-900` dengan badge berwarna rose muda (`bg-pink-100 text-pink-700`).
  * **Keselarasan Tipografi Antar Halaman**: Judul Hero di `index.html`, `tentang-kami.html`, dan `kemitraan.html` menggunakan formula seragam: `text-white`, aksen span `text-rose-200`, dan bayangan `hero-text-shadow`. Strip 9 logo mitra di footer memiliki nama teks yang terbaca jelas di semua halaman.

---

## 10. Kurasi Testimoni & Bukti Sosial Eksklusif (3 Video & 3 Chat Autentik - Refinement v2.9)

Section Testimoni didesain ulang menyeluruh guna menghapus kesan lusuh, buram, dan suram dengan standar estetika butik kesehatan Jepang (*Japanese editorial aesthetic*):

### A. Arsitektur Latar Belakang & Suasana Parallax (Maternal Velvet Rose)
1. **Penggantian Foto Parallax Bernapas**: Menggantikan latar lama (`Bekam.jpg`) dengan foto bernuansa kasih sayang ibu dan anak beresolusi tinggi (`assets/img/baby-6.jpg`, 1200x1600).
2. **Maternal Rose Veil Kontras Tinggi (`.parallax-rose-veil`)**: Menggantikan veil putih susu 90% yang membuat latar berkabut/lusuh dengan gradien mawar beludru (*velvety rose multiply*).
3. **Tipografi Judul Putih Menyala (`hero-text-shadow`)**: Judul utama menggunakan `text-white font-heading font-black tracking-tight hero-text-shadow` dengan rasio kontras > 9:1, dilengkapi badge pil mengambang kaca semi-transparan (`bg-white/20 backdrop-blur-md border border-white/30 text-white`).
4. **Floating Island Cards**: Seluruh kartu video dan testimoni diangkat menjadi modul pulau putih bercahaya (`bg-white/95 backdrop-blur-md rounded-3xl border border-white/80 shadow-xl hover:shadow-2xl hover:-translate-y-1.5 transition-all`).

### B. Peningkatan Poster Preview Video Menjadi True HD Widescreen (16:10 / 800x500)
Ekstraksi dan rekayasa ulang frame native 720p langsung dari file master video MP4:
1. **Video 1: Sambutan Resmi Bupati Malang (Bpk. H. Sanusi)**:
   - File Poster: `assets/img/testi-3.jpg` (di-upgrade dari 334x342 buram menjadi 800x500 HD widescreen).
   - Visual: Menampilkan Bpk. H. Sanusi dengan peci hitam dan seragam dinas ber-lencana resmi di meja pameran kesehatan, didukung efek kedalaman ruang (*bokeh depth of field*) dan pencahayaan hangat.
   - Kutipan: *"Derajat kesehatan masyarakat itu sangat penting dengan cek kesehatan dini dan pola hidup sehat mulai dari diri sendiri" — H. Sanusi. (Bupati Malang)*.
2. **Video 2: Kasus Rehabilitasi Bell's Palsy (Nimpuna Terapi)**:
   - File Poster: `assets/img/testi-4.jpg` (di-upgrade dari 355x383 menjadi 800x500 HD dual-view komparatif).
   - Visual: Komposisi sisi-kiri terapi akupresur aktif pada titik saraf wajah dipadukan diagram medis Bell's palsy vs normal di sisi kanan, memberikan edukasi klinis yang kredibel.
3. **Video 3: Penanganan Skoliosis Punggung Berat**:
   - File Poster: `assets/img/testi-1.jpg` (di-upgrade dari 286x254 abu-abu lusuh menjadi 800x500 HD side-by-side).
   - Visual: Pasien membungkuk tanpa nyeri saat traksi medis di sisi kiri dan berdiri tegak seimbang saat berjalan di sisi kanan, membuktikan pemulihan secara visual instan.

### C. Galeri Tangkapan Layar Chat Autentik (Full Square 1:1 Preservation)
1. **Preservasi Rasio Gambar Tanpa Pemotongan**: Menggantikan kontainer lama (`aspect-4/3`) yang memotong teks atas dan nomor kontak bawah dengan frame `aspect-square` (`p-1 object-contain`), menjaga integritas visual grafik 1080x1080 secara utuh.
2. **Tiga Chat Autentik Terpilih**:
   - **Chat 1 (`testi-massage.jpg`)**: Pijat relaksasi ibu & bayi usia 1 bulan — *Kolik Membaik & Tidur Pulas*.
   - **Chat 2 (`testi-bapil.jpg`)**: Terapi balita batuk pilek — *1x Terapi Batuk Pilek Sembuh*.
   - **Chat 3 (`testi-laktasi.jpg`)**: Konsultasi & drainase payudara — *Pijat Laktasi & ASI Lancar Melimpah*.
3. **Fitur Zoom Lightbox Interaktif**: Setiap kartu dilengkapi tombol pembesar interaktif dengan ikon `🔍 Perbesar` dan label aksesibel.

---

## 11. Ketentuan Jangkauan Layanan Home Visit

Informasi jangkauan Home Visit ditampilkan secara jelas dan terkemuka (*prominently displayed*) di seluruh penjuru situs:
- **Wilayah Cakupan**: *"Area Kota Malang, Kab. Malang & Kota Batu (Maks. 10km)"*.
- **Penempatan Konsisten**:
  1. *Top Announcement Bar* di seluruh halaman situs.
  2. *Hero Section Pill Badge* berdampingan dengan penawaran utama.
  3. *Kartu Keunggulan Layanan* dengan rincian tanpa biaya transport tambahan dalam radius 10 km.
  4. *Modul FAQ* yang menjelaskan prosedur reservasi bidan/terapis ke kediaman pasien.

---

## 12. Desain Ergonomis Peta Jaringan Outlet & Footer Proporsional (v2.8 Refinement)

### A. Arsitektur Kartu Peta Lokasi & Fasilitas Pelayanan (`#lokasi`)
Untuk menghadirkan estetika yang anggun, hangat, dan sangat terpercaya bagi calon pasien keluarga:
1. **Floating Island Glass Container**:
   - Kartu menggunakan `bg-white/95 backdrop-blur-md rounded-3xl p-5 sm:p-6 border border-white/80 shadow-xl hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group`.
   - Mengapung di atas lapisan foto parallax ber-veil mawar hangat, memberikan kedalaman ruang (*visual depth*) tanpa silau.
2. **Pita Aksen Identitas Cabang (Top Brand Ribbon)**:
   - Outlet 1 (Twinnie Care): Gradien Rose/Pink (`from-pink-500 via-rose-500 to-rose-600`).
   - Outlet 2 (Allura Woman Spa): Gradien Emerald/Teal (`from-emerald-500 via-teal-500 to-emerald-600`).
   - Outlet 3 (Biro Rumah Ameera): Gradien Indigo/Purple (`from-indigo-500 via-purple-500 to-indigo-600`).
3. **Bingkai Peta Interaktif (App-Framed Map Embed)**:
   - Iframe peta Google Maps beresolusi tinggi (`h-52 rounded-2xl overflow-hidden border border-slate-200/80 shadow-inner`).
   - Dilengkapi **Badge Mengambang Kaca** di sudut atas:
     * Sudut Kiri Atas: Pill status operasional dengan titik animasi berdenyut (`Cabang Lowokwaru`, `Cabang Jatimulyo`, `Cabang Blimbing`).
     * Sudut Kanan Atas: Penanda interaktivitas `Peta Interaktif`.
     * Menghilangkan kesan iframe mentah tanpa konteks dan mengubahnya menjadi modul antarmuka aplikasi modern (*app-like interface*).
4. **Kotak Alamat Jelas & Rincian Fasilitas Penunjang**:
   - Alamat terkurung rapi dalam kontainer `bg-slate-50/90 p-2.5 rounded-xl border border-slate-100` dengan ikon pin lokasi.
   - Baris metadata fasilitas terstruktur:
     * 🕒 **Jam Operasional**: Jadwal buka jelas.
     * ✨ **Layanan Unggulan**: Ringkasan tindakan utama.
     * 🚗 **Fasilitas Penunjang**: Parkir nyaman, ruang ber-AC steril UV-C, dan ruang konsultasi privat kedap suara.
5. **Tombol Aksi Simetris Bergradien**:
   - Tombol Kiri: `Buka Rute` dengan ikon peta Google Maps berbingkai lembut.
   - Tombol Kanan: Aksi utama bergradasi tajam (`Reservasi` dengan `data-open-booking`, `WhatsApp` khusus Allura, dan `Konsultasi` psikologi).

### B. Arsitektur Master Footer Proporsional & Harmonis
1. **Grid Simetris 3x3 pada Smartphone**:
   - 9 mitra resmi diatur dengan pola `grid-cols-3 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-9 gap-2.5 sm:gap-3 lg:gap-3.5`.
   - Pada layar smartphone/mobile, sistem menghasilkan **3 baris berisi tepat 3 kartu** (matriks 3x3 simetris sempurna), menghilangkan bug visual kartu ke-9 yang berdiri sendiri (*orphan item*).
2. **Wadah Logo & Teks Anti-Wrap**:
   - Logo diletakkan dalam kontainer putih bersih seragam (`w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white p-1 shadow-xs`).
   - Teks nama brand dan subkategori menggunakan utility `truncate` satu baris rapi, mencegah ketidaksamaan tinggi kartu akibat pembungkusan kata.
3. **Kartu Kontak WhatsApp Terpisah & Berkontras Tinggi**:
   - Saluran kontak dibagi menjadi 3 kartu terisolasi dengan ikon SVG dan kode warna domain:
     * 👶 **Ibu & Bayi**: Teks Rose (`text-pink-400`).
     * 📈 **Investor Relations**: Teks Emerald (`text-emerald-400`).
     * 🧠 **Psikologi Klinis**: Teks Indigo (`text-indigo-400`).
4. **Palet Warna Background Hangat (Warm Obsidian vs Cool Slate)**:
   - Menghilangkan kesan kusam dari warna `bg-slate-900` yang dingin dan kebiruan.
   - Mengadopsi kelas `.footer-warm-dark` dengan latar hitam obsidian hangat `#0e0912` dan gradien vertikal ke `#0c0710`, dipadukan radial rose glow `rgba(225, 29, 72, 0.16)` dan border atas hangat `rgba(244, 63, 94, 0.25)`.
   - Menghadirkan transisi visual yang alami dan elegan dari latar Warm Ivory (`#FFFDF9`) di section atasnya ke area footer.
5. **Atmospheric Ambient Rose Glow & Glassmorphism Translusen**:
   - Di puncak footer terpasang layer blur atmosferik (`h-36 bg-rose-500/10 blur-3xl`) yang memberikan kedalaman mewah bagai pencahayaan panggung teater (*ambient backstage glow*).
   - Seluruh kartu partner dan link menggunakan permukaan semi-transparan `bg-white/[0.04]` dengan batas `border-white/[0.08]` yang berpendar lembut saat disentuh kursor (`hover:bg-white/[0.08] hover:border-pink-400/50`).



---

## 13. Harmonisasi Warna Antar-Section Lintas Seluruh Halaman (Alternating Cadence Harmony)

Untuk menjamin alur pandang mata yang tenang, mewah, dan bebas disonansi visual (*zero color clash*), diterapkan sistem selang-seling konsisten:

1. **Rhythm Section Parallax (GAMBAR)**:
   - Selalu menggunakan foto bertema kehangatan ibu, anak, atau relaksasi (`hero-3.jpg`, `baby-6.jpg`, `baby.jpg`, `woman-allura.jpg`, `baby-4.jpg`).
   - Dilapisi Maternal Rose Multiply Veil (`.parallax-rose-veil` / `.accent-overlay`).
   - Seluruh teks tajuk section berwarna putih menyala megah dengan bayangan (`hero-text-shadow`), badge kaca transparan (`bg-white/20 border-white/30`), dan kartu konten berupa pulau putih mengambang (`bg-white/95 rounded-3xl shadow-xl`).
2. **Rhythm Section Tirai Solid (WARNA)**:
   - Selalu menggunakan kanvas dasar Warm Ivory (`#FFFDF9` / Stone-50) yang anti-silau dan nyaman untuk mata segala usia.
   - Seluruh teks tajuk section berwarna arang gelap Slate-900 (kontras > 12:1) dengan badge rose muda (`bg-pink-100 text-pink-700`).
   - Menghilangkan warna dingin (`bg-white` tajam atau `bg-slate-50` kebiruan) yang memecah kehangatan maternal.
3. **Komponen Footer (WARNA GELAP MEWAH)**:
   - Menggunakan Warm Luxury Obsidian (`.footer-warm-dark`, `#0e0912`) dengan Ambient Rose Halo di bagian atas, menghadirkan transisi alami dari section warm ivory di atasnya.
