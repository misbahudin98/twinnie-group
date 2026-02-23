<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Twinnie Group</title>
  <link rel="icon" type="image/x-icon" href="assets/img/logo-twinnie.jpg">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    :root {
      --brand: #ff3ba5;

      /* ---------- Replace these URLs with your actual images ---------- */
      --hero-bg-desktop: url('assets/img/hero-3.jpg');
      --hero-bg-mobile: var(--brand);
      /* url('https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=900&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder'); */

      /* Brand accent (RGB) and overlay opacity per breakpoint */
      --accent-rgb: 236, 72, 153;
      /* brand color in RGB (no alpha) */
      --accent-opacity-desktop: 0.99;
      /* overlay opacity on desktop/tablet */
      --accent-opacity-mobile: 0.99;
      /* stronger overlay on mobile (adjust as needed) */

      /* Additional visual tuning */
      --hero-dark-gradient: linear-gradient(to bottom, rgba(255, 255, 255, 0.00), rgba(255, 255, 255, 0.55));
      --z-hero: 10;
      --z-header: 50;
      --z-modal: 60;
      --header-h: 50px;
      --radius: 12px;
    }

    #siteHeader {
      z-index: var(--z-header);
    }

    #modal {
      z-index: var(--z-modal) !important;
    }

    /* ---------- HERO background: use var-based image so we can swap per breakpoint ---------- */
    #hero-bg {
      background-image: var(--hero-bg-desktop);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      filter: saturate(0.95) contrast(1);
      /* optional subtle blur on very large screens */
      /* backface-visibility: hidden; */
      will-change: transform;
    }

    /* Mobile override: use mobile image and stronger overlay if desired */
    @media (max-width: 768px) {
      #hero-bg {
        background-image: var(--hero-bg-mobile);
        background-position: center 40%;
      }
    }

    /* Accent overlay uses RGB var + opacity that changes with media queries */
    .accent-overlay {
      background: rgba(var(--accent-rgb), var(--accent-opacity-desktop));
      mix-blend-mode: multiply;
    }

    @media (max-width: 768px) {
      .accent-overlay {
        background: rgba(var(--accent-rgb), var(--accent-opacity-mobile));
      }
    }

    /* Light gradient overlay for readability */
    .hero-readability {
      background: var(--hero-dark-gradient);
    }

    /* small helpers */
    .glass-bg {
      background: rgba(255, 255, 255, 0.04);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }

    .logo-circle {
      width: 44px;
      height: 44px;
      border-radius: 9999px;
      overflow: hidden;
      border: 1px solid rgba(0, 0, 0, 0.06);
      background: white;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .logo-circle img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .fade-in {
      animation: fadeIn .32s ease both;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(6px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    /* Modal tweaks */
    .modal-backdrop {
      transition: opacity .18s ease;
    }

    .modal-panel {
      transition: transform .18s cubic-bezier(.2, .9, .3, 1), opacity .18s ease;
    }

    /* small accessibility helper for focus */
    .focus-ring:focus {
      outline: none;
      box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.12);
      border-radius: .5rem;
    }
  </style>

  <!-- Styles for menu animation, ripple, and FABs -->
  <style>
    /* Menu underline slide + press bounce */
    .menu-item {
      padding: .25rem .25rem;
      position: relative;
      overflow: visible;
      display: inline-flex;
      align-items: center;
    }

    .menu-label {
      position: relative;
      z-index: 2;
      transition: transform .14s cubic-bezier(.2, .9, .3, 1);
    }

    .menu-underline {
      position: absolute;
      left: 0;
      right: 0;
      bottom: -6px;
      height: 3px;
      background: linear-gradient(90deg, rgba(236, 72, 153, 0.95), rgba(253, 164, 175, 0.9));
      transform-origin: left center;
      transform: scaleX(0);
      transition: transform .26s cubic-bezier(.2, .9, .3, 1), opacity .18s ease;
      border-radius: 999px;
      opacity: 0;
    }

    .menu-item:hover .menu-underline,
    .menu-item:focus .menu-underline {
      transform: scaleX(1);
      opacity: 1;
    }

    .menu-item:active .menu-label {
      transform: scale(.96) translateY(1px);
    }

    /* mobile menu item touch ripple */
    .menu-item-mobile {
      position: relative;
      overflow: hidden;
    }

    .ripple {
      position: absolute;
      border-radius: 999px;
      transform: scale(0);
      animation: ripple .6s linear;
      background: rgba(236, 72, 153, 0.14);
      pointer-events: none;
    }

    @keyframes ripple {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }
  </style>
  <style>
    :root {
      --brand: #ff3ba5;
      --brand-dark: #e03392;
      --muted: #6b7280;
      --accent: #5C6B5A;
      --text: #2B2B2B;
      --radius: 12px;
    }

    /* html,body { height:100%; } */
    /* body { -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; } */

    /* Header */
    /* .site-header { backdrop-filter: blur(6px); } */


    /* Cards */
    .service-card {
      display: flex;
      flex-direction: column;
      height: 100%;
      padding-top: 1.25rem;
    }

    .service-card .card-body {
      flex: 1 1 auto;
      padding-top: 0.5rem;
    }

    .service-card .card-actions {
      margin-top: auto;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }


    /* Testimonials */
    .testi-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }

    .testi-card {
      background: #fff;
      border-radius: 12px;
      padding: 0.75rem;
      box-shadow: 0 8px 24px rgba(2, 6, 23, 0.06);
    }

    .testi-card img {
      width: 100%;
      height: 240px;
      object-fit: cover;
      border-radius: 8px;
    }

    .testi-meta {
      margin-top: 0.5rem;
      font-size: 0.9rem;
      color: var(--muted);
    }


    /* Buttons */
    .open-gallery {
      background: var(--brand);
      color: #fff;
      border: none;
      font-weight: 600;
    }

    #previewTour {
      background: rgba(255, 255, 255, 0.92);
      color: var(--brand);
      border: 1px solid rgba(255, 255, 255, 0.6);
      font-weight: 700;
    }

    /* Modal + Overlay higher than header */
    #overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      opacity: 0;
      transition: opacity .25s;
      z-index: 10020;
      pointer-events: none;
      display: none;
    }

    #sideForm,
    #partnerModal {
      position: fixed;
      inset: 0;
      display: none;
      align-items: center;
      justify-content: center;
      pointer-events: none;
      z-index: 10030;
    }

    #sideFormInner,
    #partnerInner {
      width: 100%;
      max-width: 720px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 20px 50px rgba(2, 6, 23, 0.2);
      max-height: 90vh;
      overflow: auto;
      pointer-events: auto;
    }

    #galleryModal {
      position: fixed;
      inset: 0;
      display: none;
      align-items: center;
      justify-content: center;
      pointer-events: none;
      z-index: 10030;
    }

    #galleryModal .panel {
      width: 100%;
      max-width: 900px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 20px 50px rgba(2, 6, 23, 0.2);
      max-height: calc(100vh - 96px);
      overflow: auto;
      pointer-events: auto;
    }

    /* Footer */
    footer {
      background: linear-gradient(180deg, rgba(255, 59, 165, 0.1), rgba(255, 59, 165, 0.06));
    }


    @media (max-width: 768px) {

      /* :root { --header-h:60px; } */
      /* .hero-content { padding:1.25rem; } */
      /* h1#hero-heading { font-size:1.6rem; line-height:1.15; } */
      .service-card .card-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 0.5rem;
      }

      .service-card .card-actions button {
        width: 100%;
        justify-content: center;
      }

      .logo-small {
        width: 36px;
        height: 36px;
        top: 0.75rem;
        left: 0.75rem;
      }

      #sideFormInner,
      #partnerInner {
        max-width: 96%;
        height: 100%;
        border-radius: 10px;
        max-height: 100vh;
      }

      #galleryModal .panel {
        max-width: 96%;
        height: 100%;
        border-radius: 10px;
        max-height: 100vh;
      }

      .card-media {
        height: 160px;
      }

      .hero-content .p-3 {
        padding: 0.75rem;
      }

      /* .site-header nav { padding-left:12px; padding-right:12px; } */
      #mobileMenu {
        position: fixed;
        top: var(--header-h);
        left: 0;
        right: 0;
        z-index: 10050;
      }

      .fixed-ctas {
        right: 12px;
        bottom: 12px;
      }
    }

    @media (min-width: 769px) {
      .card-media {
        height: 210px;
      }
    }

    /* Responsive smaller devices */
    @media (max-width:1024px) {
      .testi-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width:768px) {

      /* .fixed-ctas { right:12px; bottom:12px; } */
      /* .site-header nav { padding-left:12px; padding-right:12px; } */
      #sideFormInner,
      #partnerInner,
      #galleryModal .panel {
        max-width: 96%;
        height: 100%;
        border-radius: 10px;
      }

      .service-card .card-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 0.5rem;
      }

      /* .nav-links { gap:0.6rem; }
      .nav-links a, .nav-links button { font-size:0.9rem; } */
      .testi-card img {
        height: 180px;
      }

      .testi-grid {
        grid-template-columns: 1fr;
      }
    }

    /* Utility small improvements */
    /* .muted { color:var(--muted); } */
  </style>
</head>

<body class="bg-stone-50 text-slate-900 antialiased">
  <!-- ===== HEADER: copy-paste THIS before your <section id="hero"> ===== -->
  <!-- ===== HEADER (tanpa Pesan Sekarang / Jalin Kemitraan) ===== -->
  <header id="siteHeader" class="w-full sticky top-0 z-40">
    <div class="bg-white/90 backdrop-blur-sm border-b border-white/10">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- bar utama: logo kiri, nav di tengah-kanan (ml-auto) dan tombol mobile paling kanan -->
        <div class="flex items-center text-sm py-2 gap-28" style="height:var(--header-h);">
          <!-- LOGO (tetap di kiri, tidak mengecil) -->
          <div class="flex items-center gap-3 flex-shrink-0">
            <a href="#" class="flex items-center gap-3">
              <!-- logo / avatar -->
              <!-- <img src="logo-nimpuna.jpg" alt="Nimpuna" class="w-10 h-10 rounded-full object-cover shadow-sm" /> -->
              <div class="sm:block">
                <div class="font-extrabold">Twinne Group</div>
                <div class="text-xs muted">Perawatan Keluarga</div>
              </div>
            </a>
          </div>

          <!-- NAV: gunakan ml-auto untuk mendorong ke kanan. atur gap kecil supaya 'mepet' -->
          <nav
            class="hidden md:flex md:items-center md:gap-4 ml-auto whitespace-nowrap"
            aria-label="Main navigation">
            <!-- kecilkan padding link agar 'mepet' kanan -->
            <a href="#hero" class="px-1 text-slate-700 hover:text-[var(--brand)]">Home</a>
            <a href="#layanan" class="px-1 text-slate-700 hover:text-[var(--brand)]">Tentang Kami</a>
            <a href="#partnership" class="px-1 text-slate-700 hover:text-[var(--brand)]">Kemitraan</a>
          </nav>

          <!-- tombol mobile: berada paling kanan di layout (tampil hanya md:hidden) -->
          <div class="ml-4 flex items-center ">
            <button id="mobileMenuBtn"
              class="md:hidden px-8 inline-flex items-center justify-center w-10 h-10 rounded-md bg-white border border-slate-200 focus:outline-none"
              aria-expanded="false" aria-controls="mobileMenu" aria-label="Buka menu">
              <!-- boleh pakai icon hamburger di sini -->
              Menu
            </button>
          </div>
        </div>
      </div>

      <!-- mobile menu (toggle dengan JS) -->
      <div id="mobileMenu" class="md:hidden bg-white/95 border-t border-white/10 hidden">
        <div class="px-4 py-4 space-y-3">
          <a href="#hero" class="block text-slate-800 font-medium">Home</a>
          <a href="#layanan" class="block text-slate-800 font-medium">Tentang Kami</a>
          <a href="#partnership" class="block text-slate-800 font-medium">Kemitraan</a>
        </div>
      </div>
    </div>
  </header>
  <!-- ===== end header ===== -->


  <!-- ===== End header snippet ===== -->

  <!-- HERO -->
  <section id="hero" class="hero min-h-[72vh] md:min-h-screen flex items-center relative" aria-labelledby="hero-heading">
    <!-- Responsive background (uses CSS variables set above) -->
    <div id="hero-bg" class="absolute inset-0 -z-20"></div>

    <!-- Accent overlay (opacity differs between mobile & desktop via media queries) -->
    <div class="absolute inset-0 -z-10 accent-overlay"></div>

    <!-- Readability gradient on top to ensure text contrast -->
    <div class="absolute inset-0 -z-5 hero-readability pointer-events-none"></div>

    <div class="hero-content w-full max-w-6xl mx-auto p-5 md:p-8 relative z-10">
      <div class="flex flex-col-reverse lg:flex-row items-start lg:items-center gap-6">
        <!-- TEXT -->
        <div class="flex-1 text-center lg:text-left  ">
          <h1 id="hero-heading" class="text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight hidden lg:block"> "Ketulusan Hati Membawa Keajaiban"</h1>
          <!-- <p class="mt-3 text-sm text-white max-w-xl mx-auto lg:mx-0"> Perawatan hangat berbasis keahlian &amp; empati.</p> -->
          <!-- <p class="mt-3 text-lg md:text-sm text-slate-700 bg-rose-100/70 inline-block p-2 rounded-lg lg:hidden sm:block">"Ketulusan Hati Membawa Keajaiban"</p> -->
          <div class="service-meta mt-4 max-w-2xl mx-auto lg:mx-0 hidden lg:block">
            <h2 id="serviceTitle" class="text-lg md:text-xl font-semibold text-white">Newborn &amp; Perawatan Khusus</h2>
            <p id="serviceSubtitle" class="mt-1 text-xs md:text-sm text-white">Perawatan lembut untuk bayi baru lahir &amp; anak berkebutuhan khusus.</p>
            <p id="serviceCaption" class="mt-3 text-xs md:text-sm text-slate-700 bg-rose-100/70 inline-block p-2 rounded-lg">Perawatan personal, aman, dan penuh empati.</p>
          </div>

          <div class="mt-5 flex flex-col sm:flex-row gap-3 items-center sm:items-start justify-center lg:justify-start hidden lg:block">
            <a href="#services" class="text-sm inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-rose-500 hover:bg-rose-600 text-white font-semibold shadow-md focus-ring" aria-label="Pesan via WhatsApp">Pesan Sekarang</a>
            <button id="ctaPartner" class="inline-flex items-center gap-2 px-4 py-3 rounded-lg bg-white text-slate-900 border border-white/10 hover:bg-white/95 text-sm font-medium focus-ring">Ajukan Kemitraan</button>
          </div>

          <div class="mt-6 hidden lg:flex items-center gap-4">
            <button id="prevService" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/90 hover:bg-white transition shadow-md focus:outline-none" title="Layanan sebelumnya">
              <svg class="w-5 h-5 text-slate-900" viewBox="0 0 24 24" fill="none">
                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>

            <div id="dots" class="flex items-center gap-2"></div>

            <button id="nextService" class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/90 hover:bg-white transition shadow-md focus:outline-none" title="Layanan berikutnya">
              <svg class="w-5 h-5 text-slate-900" viewBox="0 0 24 24" fill="none">
                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
        </div>

        <!-- MEDIA CARD -->
        <div class="w-full lg:w-96">
          <div class="rounded-2xl overflow-hidden shadow-2xl bg-white p-3 relative">
            <!-- brand logo top-left -->
            <!-- <div class="absolute top-3 left-3 z-20">
              <div class="w-10 h-10 rounded-full overflow-hidden border border-slate-200 bg-white">
                <img src="logo-nimpuna.jpg" alt="Logo Nimpuna" class="w-full h-full object-cover" loading="lazy" />
              </div>
            </div> -->

            <div class="relative">
              <video id="serviceVideo" class="w-full h-56 sm:h-64 md:h-56 lg:h-64 object-cover rounded-lg bg-white" playsinline webkit-playsinline muted preload="metadata" autoplay crossorigin="anonymous" aria-label="Preview layanan">
                <source id="videoSource" src="" type="video/mp4" />
                Your browser does not support the video tag.
              </video>

              <!-- overlay -->
              <button id="playOverlay" aria-hidden="true" class="absolute inset-0 m-auto rounded-full bg-white/30 flex items-center justify-center transition-opacity opacity-0 touch-manipulation focus:outline-none" title="Ketuk untuk suara / putar" type="button">
                <svg id="playIcon" class="w-14 h-14 text-slate-900" viewBox="0 0 24 24" fill="none">
                  <path d="M8 5v14l11-7z" fill="currentColor" />
                </svg>
              </button>
            </div>

            <div id="thumbs" class="mt-3 flex gap-2 overflow-x-auto px-1 py-1 touch-pan-y"></div>

            <!-- logos strip -->
            <div id="logosStrip" class="mt-3 flex items-center justify-start logos-wrapper"></div>

            <div class="p-3 text-slate-800">
              <h3 id="mediaCaptionTitle" class="font-semibold text-slate-900">Baby Spa</h3>
              <p id="mediaCaptionSub" class="text-sm text-slate-700">Perawatan lembut untuk bayi &amp; ibu.</p>
            </div>

            <!-- mobile arrows -->
            <div class="mt-2 flex items-center justify-between gap-3 lg:hidden">
              <button id="prevServiceMobile"
                class="relative flex-1 py-3 rounded-xl bg-white/90 text-slate-900 text-sm font-medium shadow-md hover:shadow-2xl transform transition duration-200 hover:-translate-y-1 active:translate-y-0 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-indigo-200 overflow-hidden">
                ← Sebelumnya
              </button>

              <button id="nextServiceMobile"
                class="relative flex-1 py-3 rounded-xl bg-gradient-to-r from-rose-600 to-pink-600 text-white text-sm font-semibold shadow-md hover:shadow-2xl transform transition duration-200 hover:-translate-y-1 active:translate-y-0 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-violet-300 overflow-hidden">
                Berikutnya →
              </button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- UNIVERSAL MODAL -->
  <div id="modal" class="fixed inset-0 z-50  items-center justify-center modal-backdrop modal-backdrop-bg p-4 hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <div id="modalPanel" class="modal-panel w-full max-w-3xl mx-auto rounded-xl shadow-2xl overflow-hidden focus:outline-none">
      <div class="flex items-center justify-between p-4 border-b" id="modalHeader">
        <h3 id="modalTitle" class="text-lg font-semibold">Preview</h3>
        <div class="flex items-center gap-2">
          <button id="modalAction" class="inline-flex items-center gap-2 px-3 py-2 rounded-md bg-rose-500 hover:bg-rose-600 text-white text-sm" hidden>Action</button>
          <button id="modalClose" class="inline-flex items-center justify-center w-10 h-10 rounded-md bg-white/90 hover:bg-white text-slate-900">&times;</button>
        </div>
      </div>

      <div id="modalContent" class="p-4 max-h-[75vh] overflow-auto bg-white text-slate-900"></div>

      <div id="modalFooter" class="flex items-center justify-end gap-3 p-3 border-t bg-white">
        <button id="modalCloseFooter" class="px-4 py-2 rounded-md bg-stone-100 hover:bg-stone-200 text-slate-900 text-sm">Tutup</button>
      </div>
    </div>
  </div>


  <!-- =========================
     TESTIMONIALS (distinct bg)
     ========================= -->
  <!-- Testimonials minimal + GSAP animations (Tailwind) -->
  <section id="testimonials" class="bg-pink-100/100 py-10">
    <div class="max-w-5xl mx-auto px-4">
      <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-slate-800">Testimoni Pelanggan</h2>
        <p class="mt-1 text-sm text-slate-500">Klik thumbnail untuk melihat media ukuran penuh. Mendukung gambar & video.</p>
      </header>

      <div class="flex justify-center mb-6">
        <span class="w-12 h-0.5 rounded-full bg-rose-500/90"></span>
      </div>

      <!-- Grid -->
      <div id="testiGrid" class="testi-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" role="list">
        <!-- cards injected by JS -->
      </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="media-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
      <div id="lb-backdrop" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
      <div class="relative z-10 w-full  h-auto mx-auto">
        <div class="relative bg-transparent rounded-lg overflow-hidden max-h-[85vh]">

          <div id="lb-media" class="w-full h-full bg-black grid place-items-center"></div>

        </div>

        <div class="flex items-center justify-between gap-3 p-3 bg-white/90 mt-5">

          <div id="lb-caption" class="text-sm text-slate-700"></div>
          <div class="flex items-center gap-2 ">
            <button id="prevBtn" class="px-2 py-1 text-sm rounded-md bg-rose-500 text-white ">Sebelumnya</button>
            <button id="nextBtn" class="px-2 py-1 text-sm rounded-md bg-rose-500 text-white ">Berikutnya</button>
            <button id="closeBtn" class=" px-2 py-1 text-sm rounded-md bg-black  text-white   hover:scale-[1.1]">Tutup</button>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- GSAP CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

  <script>
    /* ===== Contoh data testimoni (ganti src sesuai kebutuhan) =====
   - type: 'image' atau 'video'
   - src: URL gambar/video (bisa CDN atau file di server)
   - poster: untuk video (opsional)
  */
    const testimonialsData = [{
        id: 1,
        name: "",
        text: "Berdiri sudah bisa lama dan tidak sakit. Dulu miring dikit saja sudah sakit",
        type: "video",
        src: "assets/videos/testi-skoliosis-punggung-berat.mp4",
        poster: "assets/img/testi-1.png"

      },
      {
        id: 2,
        name: "Vania (Jerman)",
        text: "Setelah mengikuti pengobatan akhir zaman, saya didiagnosa beberapa pengakit salah satunya kaki panjang sebelah. Kemudian disini saya dibetulkan dan diajarkan cara berjalan yang bener. Yaa alhamdulillah so far so good.",
        type: "video",
        src: "assets/videos/testi-jerman.mp4",
        poster: "assets/img/testi-2.png"
      },
      {
        id: 3,
        name: "H. Sanusi. (Bupati Malang)",
        text: "Derajat kesehatan masyarakat itu sangat penting dengan cek kesehatan dini dan pola hidup sehat mulai dari diri sendiri",
        type: "video",
        src: "assets/videos/testi-sanusi.mp4",
        poster: "assets/img/testi-3.png"

      },

      // {
      //   id: 4,
      //   name: "",
      //   text: "",
      //   type: "video",
      //   src: "assets/videos/testi-bell's palsy.mp4",
      //   poster: "assets/img/testi-4.png"

      // },
      {
        id: 5,
        name: "",
        text: "Alhamdulillah sudah sembuh, ini sudah nggak batuk mbak, terima kasih yaa treatmentnya alhamdulillah cocok.",
        type: "image",
        src: "assets/img/testi-bapil.jpg"
      },
      {
        id: 6,
        name: "",
        text: "Terima kasih tim twinnie. Ya alloh aku seneng banget dari awal nya pumping dapat 20 ml sekarang sekali pumping sudah dapat 2 kantong ukuran 100ml. Sudah diajari cara dbf dan pumping yang bener. Pokoknya saya bener bener berterimakasih, tanpa twinnie mungkin aku gbs kasig asi buat anakku, mungkin udah aku kasih sufor.",
        type: "image",
        src: "assets/img/testi-laktasi.jpg"
      },
      {
        id: 7,
        name: "",
        text: "Alhamdulillah tadi malam tidur ga rewel dan ga mintik gendong terus. Kondisi adek alhamdulillah baik mbak.",
        type: "image",
        src: "assets/img/testi-massage.jpg"
      }

    ];

    // Render card grid
    const grid = document.getElementById('testiGrid');
    testimonialsData.forEach((t, idx) => {
      const card = document.createElement('article');
      card.className = 'testimonial-card bg-white rounded-xl shadow-sm p-3 flex flex-col gap-2 transform';
      card.setAttribute('role', 'listitem');

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'media-thumb relative overflow-hidden rounded-lg block aspect-[16/9] w-full bg-slate-100';
      btn.setAttribute('aria-label', `Lihat media testimoni ${idx+1}`);
      btn.dataset.index = idx;

      if (t.type === 'image') {
        const img = document.createElement('img');
        img.src = t.src;
        img.alt = `Testimoni ${t.name}`;
        img.loading = 'lazy';
        img.className = 'w-full h-full object-cover transition-transform duration-200 transform';
        btn.appendChild(img);
      } else {
        // video thumbnail (poster)
        const img = document.createElement('img');
        img.src = t.poster || t.src;
        img.alt = `Video testimoni ${t.name}`;
        img.loading = 'lazy';
        img.className = 'w-full h-full object-cover';
        const play = document.createElement('span');
        play.className = 'absolute inset-0 grid place-items-center pointer-events-none';
        play.innerHTML = '<svg class="w-12 h-12 text-white/90" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg>';
        btn.appendChild(img);
        btn.appendChild(play);
      }

      btn.addEventListener('click', () => openGallery(idx));
      // hover micro-interaction (GSAP)
      btn.addEventListener('mouseenter', () => gsap.to(btn, {
        scale: 1.02,
        boxShadow: '0 10px 25px rgba(0,0,0,0.08)',
        duration: 0.25
      }));
      btn.addEventListener('mouseleave', () => gsap.to(btn, {
        scale: 1,
        boxShadow: '0 6px 12px rgba(0,0,0,0.04)',
        duration: 0.25
      }));

      const quote = document.createElement('blockquote');
      quote.className = 'text-slate-700 italic text-sm';
      quote.textContent = t.text;

      const author = document.createElement('div');
      author.className = 'text-xs font-medium text-slate-500';
      author.textContent = `— ${t.name}`;

      card.appendChild(btn);
      card.appendChild(quote);
      card.appendChild(author);
      grid.appendChild(card);
    });

    // Entrance animation for cards (stagger)
    gsap.from('.testimonial-card', {
      y: 18,
      opacity: 0,
      duration: 0.6,
      stagger: 0.08,
      ease: 'power2.out'
    });

    /* ===== Lightbox logic with GSAP animation ===== */
    let currentIndex = 0;
    const lb = document.getElementById('media-lightbox');
    const lbBackdrop = document.getElementById('lb-backdrop');
    const lbMedia = document.getElementById('lb-media');
    const lbCaption = document.getElementById('lb-caption');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const closeBtn = document.getElementById('closeBtn');

    function openGallery(index = 0) {
      currentIndex = index;
      renderItem();
      lb.classList.remove('hidden');
      lb.classList.add('flex');
      // Animate in
      gsap.fromTo('#media-lightbox > .relative', {
        scale: 0.96,
        opacity: 0
      }, {
        scale: 1,
        opacity: 1,
        duration: 0.35,
        ease: 'power2.out'
      });
      document.documentElement.style.overflow = 'hidden';
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      // animate out then hide
      gsap.to('#media-lightbox > .relative', {
        scale: 0.96,
        opacity: 0,
        duration: 0.25,
        ease: 'power2.in',
        onComplete: () => {
          lb.classList.add('hidden');
          lb.classList.remove('flex');
          // cleanup
          lbMedia.innerHTML = '';
          document.documentElement.style.overflow = '';
          document.body.style.overflow = '';
        }
      });
    }

    function renderItem() {
      const item = testimonialsData[currentIndex];
      lbMedia.innerHTML = '';
      lbCaption.textContent = item.text ? item.text : `${currentIndex+1} / ${testimonialsData.length}`;

      if (item.type === 'video') {
        const video = document.createElement('video');
        video.controls = true;
        video.playsInline = true;
        video.preload = 'metadata';
        if (item.poster) video.poster = item.poster;
        video.style.maxWidth = '100%';
        video.style.maxHeight = '85vh';
        const src = document.createElement('source');
        src.src = item.src;
        // type optional, browser infers
        video.appendChild(src);
        lbMedia.appendChild(video);
        // small entrance for media
        gsap.from(video, {
          scale: 0.98,
          opacity: 0,
          duration: 0.28
        });
      } else {
        const img = document.createElement('img');
        img.src = item.src;
        img.alt = item.name || 'Media';
        img.loading = 'lazy';
        img.style.maxWidth = '100%';
        img.style.maxHeight = '85vh';
        lbMedia.appendChild(img);
        gsap.from(img, {
          scale: 0.98,
          opacity: 0,
          duration: 0.28
        });
      }
    }

    // controls
    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + testimonialsData.length) % testimonialsData.length;
      renderItem();
    });
    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % testimonialsData.length;
      renderItem();
    });
    closeBtn.addEventListener('click', closeLightbox);

    // backdrop click to close
    lbBackdrop.addEventListener('click', closeLightbox);

    // keyboard nav
    document.addEventListener('keydown', (e) => {
      if (lb.classList.contains('hidden')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') prevBtn.click();
      if (e.key === 'ArrowRight') nextBtn.click();
    });
  </script>
  <!-- =========================
     SEPARATOR / SVG (optional)
     ========================= -->
  <!-- small SVG wave divider to make sections feel separated (optional) -->
  <div class="w-full -mt-1">
    <svg viewBox="0 0 1440 40" class="w-full block" preserveAspectRatio="none">
      <path d="M0,40 C360,0 1080,0 1440,40 L1440,0 L0,0 Z" fill="white"></path>
    </svg>
  </div>

  <!-- =========================
     SERVICES (white bg, no negative margin)
     ========================= -->
  <!-- PLACEHOLDER SECTION: tempat cards -->
  <section id="services" class="w-full bg-white py-16">
    <div class="max-w-6xl mx-auto px-6">
      <header class="mb-8 text-center">
        <h2 class="text-3xl font-semibold">Layanan Kami</h2>
        <p class="text-sm text-slate-600 mt-2">Pilihan perawatan ramah keluarga & ABK — pilih paket dan pesan langsung.</p>
      </header>

      <div id="servicesGrid" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>
    </div>
  </section>

  <!-- Gallery / Preview overlay (mendukung gambar + video poster + thumbs + logos) -->
  <div id="tw-servicePreviewOverlay" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="relative max-w-4xl mx-auto my-12 bg-white rounded-lg overflow-hidden shadow-xl">
      <div class="flex flex-col md:flex-row">
        <!-- MEDIA -->
        <div class="md:w-2/3 bg-slate-100">
          <div id="mediaWrap" class="relative">
            <!-- video (jika ada) -->
            <video id="tw-previewVideo" class="w-full h-80 object-cover hidden" controls playsinline></video>
            <!-- gambar -->
            <img id="tw-previewImage" class="w-full h-80 object-cover" src="" alt="">
            <!-- play icon for video -->
            <button id="tw-playVideoBtn" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 hidden bg-white/80 rounded-full p-3">▶</button>
          </div>

          <!-- thumbs -->
          <div id="tw-thumbs" class="flex gap-2 p-3 overflow-auto"></div>
        </div>

        <!-- INFO -->
        <div class="md:w-1/3 p-4 flex flex-col">
          <div class="flex items-start justify-between">
            <h3 id="tw-previewTitle" class="text-lg font-semibold">Judul</h3>
            <button id="tw-previewClose" class="text-slate-500 hover:text-slate-900" aria-label="Tutup">✕</button>
          </div>
          <p id="tw-previewSubtitle" class="text-xs text-slate-500 mt-1"></p>
          <p id="tw-previewCaption" class="text-sm text-slate-600 mt-3 flex-1"></p>

          <div id="tw-logoRow" class="flex gap-2 items-center mt-4 flex-wrap"></div>

          <div class="mt-4 flex gap-2">
            <button id="tw-previewPesan" class="flex-1 px-4 py-2 rounded-full bg-gradient-to-r from-[#ff3ba5] to-[#f06aa8] text-white">Pesan</button>
            <!-- <button id="tw-previewGalleryFull" class="px-4 py-2 rounded-full bg-white border">Lihat Lainnya</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Optional small CSS for better visuals (place in your stylesheet) -->
  <style>
    /* slightly stronger shadow on service cards for depth */
    .service-card {
      transition: transform .18s ease, box-shadow .18s ease;
    }

    .service-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 36px rgba(15, 23, 42, 0.12);
    }

    .testimonial-card img {
      aspect-ratio: 16/9;
    }
  </style>


  <!-- Panels: overlay + booking + partner + gallery -->
  <div id="panel">
    <div id="overlay" aria-hidden="true"></div>

    <!-- booking modal -->
    <div id="sideForm" aria-hidden="true">
      <div id="sideFormInner" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="p-5">
          <div class="flex items-start justify-between">
            <h3 id="modalTitle" class="text-xl font-semibold">Pemesanan</h3>
            <button id="closeForm" aria-label="Tutup" class="text-slate-600">&times;</button>
          </div>
          <div id="formWrapper" class="mt-4"></div>
        </div>
      </div>
    </div>

    <!-- partnership modal -->
    <div id="partnerModal" aria-hidden="true">
      <div id="partnerInner" role="dialog" aria-modal="true" aria-labelledby="partnerTitle">
        <div class="p-6">
          <div class="flex items-start justify-between">
            <h3 id="partnerTitle" class="text-xl font-semibold">Form Kemitraan</h3>
            <button id="closePartner" aria-label="Tutup Kemitraan" class="text-slate-600">&times;</button>
          </div>
          <div id="partnerWrapper" class="mt-4"></div>
        </div>
      </div>
    </div>

    <!-- gallery modal -->
    <div id="galleryModal" aria-hidden="true">
      <div class="panel">
        <div class="p-4">
          <div class="flex justify-between items-center mb-3">
            <h3 id="galleryTitle" class="font-semibold text-lg">Galeri</h3>
            <button id="closeGallery" class="text-slate-600">Tutup</button>
          </div>
          <div id="galleryContent" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
        </div>
      </div>
    </div>

  </div>


  <!-- FAQ -->
  <!-- FAQ Section (visible) -->
  <section id="faq" class="max-w-6xl mx-auto p-6 bg-pink-50">
    <h2 class="text-2xl font-semibold mb-4">Pertanyaan Umum</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <details class="p-4 border border rounded">
        <summary class="font-semibold">Bagaimana cara memesan layanan?</summary>
        <div class="mt-2 muted">Klik tombol 'Pesan' pada layanan yang diinginkan, isi form singkat lalu kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi dan penjadwalan.</div>
      </details>
      <details class="p-4 border rounded">
        <summary class="font-semibold">Apakah Twinne Group menerima partnership?</summary>
        <div class="mt-2 muted">Ya. Klik tombol 'Jalin kemitraan' di pojok kanan bawah untuk mengisi formulir partnership. Tim bisnis kami akan menghubungi Anda kembali.</div>
      </details>
      <details class="p-4 border rounded">
        <summary class="font-semibold">Apakah layanan untuk anak berkebutuhan khusus tersedia?</summary>
        <div class="mt-2 muted">Layanan kami mencakup perawatan khusus dan program rehabilitasi yang disesuaikan. Hubungi kami lewat WhatsApp untuk diskusi kebutuhan spesifik.</div>
      </details>
      <details class="p-4 border rounded">
        <summary class="font-semibold">Apakah ada pelatihan untuk terapis?</summary>
        <div class="mt-2 muted">Kami menyediakan pelatihan berkala untuk meningkatkan skill terapis, kontak kami untuk jadwal dan pendaftaran.</div>
      </details>
    </div>
  </section>

  <!-- Footer -->
  <footer class="mt-12 text-slate-700" role="contentinfo">
    <div class="max-w-6xl mx-auto p-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        <!-- Partnership (ambil 2 kolom di md ke atas) -->
        <div class="md:col-span-2">
          <div class="font-semibold mb-2">Partnership</div>
          <p class="text-sm muted mb-3">Bergabunglah dengan jaringan mitra kami.</p>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <a href="https://maps.app.goo.gl/ajVfA4pEG4XMduem8" type="button" onclick="openPartnerForm()" aria-label="Partner Baby & Mom Spa" class="           hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center">
              <img
                src="assets/img/logo-twinnie.jpg"
                alt="Logo Twinnie"
                class="w-14 h-14 rounded-full shadow object-cover"
                loading="lazy" />
              <div class="text-xs  bg-white p-1 rounded-lg">Twinnie</div>
            </a>

            <a href="https://maps.app.goo.gl/ajVfA4pEG4XMduem8" type="button" onclick="openPartnerForm()" aria-label="Partner Woman Spa" class="           hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center ">
              <img
                src="assets/img//logo-allura.jpg"
                alt="Logo Allura"
                class="w-14 h-14 rounded-full shadow object-cover "
                loading="lazy" />
              <div class=" text-xs bg-white p-1 rounded-lg">Allura</div>
            </a>

            <a href="https://maps.app.goo.gl/ajVfA4pEG4XMduem8" type="button" onclick="openPartnerForm()" aria-label="Partner Terapi Holistik" class="           hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center ">
              <img
                src="assets/img//logo-nimpuna.jpg"
                alt="Logo Nimpuna"
                class="w-14 h-14 rounded-full shadow object-cover"
                loading="lazy" />
              <div class=" text-xs bg-white p-1 rounded-lg">Nimpuna</div>
            </a>

            <a href="https://maps.app.goo.gl/ajVfA4pEG4XMduem8" type="button" onclick="openPartnerForm()" aria-label="Partner Kemitraan Bisnis" class="           hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center">
              <img
                src="assets/img//logo-rumah-ameera.jpg"
                alt="Logo rumah-ameera"
                class="w-14 h-14 rounded-full shadow object-cover"
                loading="lazy" />
              <div class=" text-xs bg-white p-1 rounded-lg">Rumah Ameera</div>
            </a>

            <a href="https://maps.app.goo.gl/Uxt2RmpgcXxz429Y9" type="button" onclick="openPartnerForm()" aria-label="Partner Kemitraan Bisnis" class="           hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center">
              <img
                src="assets/img/logo-psikolog.jpg"
                alt="Logo Psikolog"
                class="w-14 h-14 rounded-full shadow object-cover"
                loading="lazy" />
              <div class=" text-xs bg-white p-1 rounded-lg">Psikolog </div>
              </button>
              <a href="https://maps.app.goo.gl/jLzjpVshDXAX8FUz9" type="button" onclick="openPartnerForm()" aria-label="UK Family Care" class="            hover:scale-[2.2] active:scale-95 flex flex-col items-center gap-2 text-center">
                <img
                  src="assets/img/logo-uk-family-care.jpeg"
                  alt="Logo UK Family Care"
                  class="w-14 h-14 rounded-full shadow object-cover"
                  loading="lazy" />
                <div class=" text-xs bg-white p-1 rounded-lg">UK Family Care</div>
              </a>
              <a href="https://maps.app.goo.gl/MinJcdb7MsSPSSNh9" type="button" onclick="openPartnerForm()" aria-label="SMK Taruna Bhakti" class="flex flex-col items-center gap-2 text-center 
           hover:scale-[2.2] active:scale-95
           ">
                <img
                  src="assets/img/logo-stabha.png"
                  alt="Logo SMK Taruna Bhakti"
                  class="w-14 h-14 rounded-full shadow object-cover"
                  loading="lazy" />
                <div class=" text-xs bg-white p-1 rounded-lg">SMK Taruna Bhakti</div>
              </a>

              <a href="" type="button" onclick="openPartnerForm()" aria-label="Mufi Journey" class="flex flex-col items-center gap-2 text-center 
           hover:scale-[2.2] active:scale-95
           ">
                <img
                  src="assets/img/logo-mufi.jpg"
                  alt="Logo Mufti Journey"
                  class="w-14 h-14 rounded-full shadow object-cover"
                  loading="lazy" />
                <div class=" text-xs bg-white p-1 rounded-lg">Mufi Journey</div>
              </a>
          </div>
        </div>

        <!-- Kontak (pada md+ akan berada di kanan) -->
        <!-- Kontak (rata kiri di dalam blok yang didorong ke kanan) -->
        <div class="md:col-span-1 flex md:justify-end">
          <div class="text-sm text-left w-full max-w-xs">
            <div class="font-semibold mb-2">Kontak</div>
            <div class="text-sm muted mb-2">Customer Service (WA):</div>
            <div class="text-sm">Baby &amp; Mom Spa: <a href="https://wa.me/628972703833" class="text-[var(--brand)]">+62 897-270-3833</a></div>
            <div class="text-sm">Woman Spa: <a href="https://wa.me/628972703833" class="text-[var(--brand)]">+62 897-270-3833</a></div>
            <div class="text-sm">Terapi Holistik: <a href="https://wa.me/+62895327268977" class="text-[var(--brand)]">+62 895-327-268977</a></div>
            <div class="text-sm">Psikolog: <a href="https://wa.me/+6281333430080" class="text-[var(--brand)]">+62 813-334-300-80</a></div>


          </div>
        </div>

      </div>

      <div class="border-t pt-4 mt-4 border-slate-100 text-sm text-slate-500 flex items-center justify-between">
        <div>© <strong>Twinnie Group</strong> — Semua hak dilindungi.</div>
        <!-- <div><a href="/sitemap.xml">Sitemap</a> • <a href="/terms">Syarat & Ketentuan</a></div> -->
      </div>
    </div>
  </footer>

  <!-- HTML: 3 tombol pemesanan -->
  <!--<div class="space-x-3">-->
  <!--  <button class="order-btn inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-[#ff3ba5] to-[#f06aa8] text-white shadow"-->
  <!--    data-service="woman-spa">Pesan Woman Spa</button>-->

  <!--  <button class="order-btn inline-flex items-center px-4 py-2 rounded-full bg-white text-slate-800 border border-[rgba(255,59,165,0.12)] shadow-sm"-->
  <!--    data-service="family-care">Pesan Perawatan Keluarga</button>-->

  <!--  <button class="order-btn inline-flex items-center px-4 py-2 rounded-full bg-white text-slate-800 border border-[rgba(99,102,241,0.06)] shadow-sm"-->
  <!--    data-service="massage">Pesan Pijat</button>-->
  <!--</div>-->

  <!-- Fullscreen modal (initially hidden) -->
  <div id="bookingModal" class="fixed inset-0 z-50 hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <!-- overlay -->
    <div id="modalOverlay" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <!-- modal panel full-screen -->
    <div class="relative inset-0 h-full w-full flex items-center justify-center">
      <div class="absolute inset-0 overflow-auto">
        <div class="min-h-full flex flex-col sm:flex-row bg-white/95 mx-2 sm:mx-6 lg:mx-auto rounded-lg shadow-xl max-w-5xl"
          style="backdrop-filter: blur(6px);">
          <!-- LEFT: FORM (full width on mobile) -->
          <div class="w-full sm:w-1/2 p-6 sm:p-8">
            <div class="flex items-start justify-between">
              <h2 id="modalTitle" class="text-lg font-semibold">Pesan Layanan</h2>
              <div class="flex gap-2">
                <button id="modalCloseBtn" aria-label="Tutup" class="text-slate-600 hover:text-slate-900">
                  <!-- X icon -->
                  <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                    <path d="M6 6l12 12M6 18L18 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>

            <p id="modalSubtitle" class="text-sm text-slate-600 mt-1 mb-4">Isi data pemesanan berikut untuk menyelesaikan reservasi.</p>

            <form id="bookingForm" class="space-y-4">
              <input type="hidden" name="service" id="serviceInput">

              <label class="block">
                <span class="text-sm font-medium">Nama</span>
                <input name="name" id="nameInput" required type="text" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300" />
              </label>

              <label class="block">
                <span class="text-sm font-medium">No. HP</span>
                <input name="phone" id="phoneInput" required type="tel" inputmode="tel" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300" />
              </label>

              <div class="grid grid-cols-2 gap-3">
                <label class="block">
                  <span class="text-sm font-medium">Tanggal Reservasi</span>
                  <input name="date" id="dateInput" required type="date" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300" />
                </label>
                <label class="block">
                  <span class="text-sm font-medium">Jam Reservasi</span>
                  <input name="time" id="timeInput" required type="time" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300" />
                </label>
              </div>

              <label class="block">
                <span class="text-sm font-medium">Alamat / Catatan</span>
                <textarea name="notes" id="notesInput" rows="2" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300"></textarea>
              </label>

              <label class="block">
                <span class="text-sm font-medium">Tempat Outlet</span>
                <select name="outlet" id="outletSelect" class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300">
                  <!-- contoh option; ganti sesuai outletmu -->
                  <option value="outlet-1">Outlet - Jalan Merpati 12</option>
                  <option value="outlet-2">Outlet - Jalan Kenanga 3</option>
                  <option value="outlet-3">Home Service</option>
                </select>
              </label>

              <label class="block">
                <span class="text-sm font-medium">Paket</span>
                <select name="package" id="packageSelect" required class="mt-1 block w-full rounded-md border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300">
                  <!-- option akan diisi oleh JS berdasarkan layanan -->
                </select>
              </label>

              <!-- Paket tambahan: hanya muncul untuk woman-spa -->
              <div id="extrasSection" class="hidden">
                <span class="text-sm font-medium">Paket Tambahan</span>
                <div id="extrasContainer" class="mt-2 space-y-2">
                  <!-- checkbox extra akan di-insert oleh JS -->
                </div>
              </div>

              
              <div class="flex items-center gap-3 pt-4">
                <button type="button" id="cancelBtn" class="px-4 py-2 rounded-md border bg-white text-slate-800">Batal</button>
                <button type="submit" class="ml-auto px-4 py-2 rounded-md bg-gradient-to-r from-[#ff3ba5] to-[#f06aa8] text-white font-semibold shadow">Pesan</button>
              </div>
            </form>
          </div>

          <!-- RIGHT: PREVIEW (gambar + detail + harga) -->
          <aside class="w-full sm:w-1/2 p-6 sm:p-8 bg-[linear-gradient(135deg,#fff,#fff)] rounded-b-lg sm:rounded-r-lg sm:rounded-bl-none">
            <div class="flex flex-col h-full">
              <div id="previewImageWrap" class="w-full rounded-md overflow-hidden shadow-sm bg-slate-100">
                <img id="previewImage" src="" alt="Preview paket" class="w-full h-48 object-cover" />
              </div>

              <div class="mt-4 flex flex-col gap-2">
                <h3 id="previewTitle" class="text-lg font-semibold">Nama Paket</h3>
                <p id="previewDesc" class="text-sm text-slate-600">Deskripsi singkat paket akan muncul di sini.</p>


                <div class="mt-3 flex items-center justify-between">
                  <div class="text-sm text-slate-500">Harga Awal </div>

                  <div id="previewPrice" class="text-sm font-bold text-slate-900 ">Rp 0</div>

                </div>
                <div class="mt-3 flex items-start justify-between">
                  <div class="text-sm text-slate-500">Tambahan</div>
                  <div id="selectedExtras" class="flex items-center justify-between text-sm text-slate-600"></div>
                </div>
                <div class="mt-3 flex items-center justify-between">
                  <div class="text-sm text-slate-500">Total </div>

                  <div id="totalPrice" class="text-sm font-bold text-slate-900 ">Rp 0</div>

                </div>

              </div>

              <div class="mt-auto text-xs text-slate-500 pt-4">
                <p>Pastikan data sudah benar sebelum menekan tombol <strong>Pesan</strong>. Kamu akan dihubungi melalui nomor yang tercantum untuk konfirmasi.</p>
              </div>
            </div>
          </aside>

        </div>
      </div>
    </div>
  </div>

  <!-- small toast -->
  <div id="toast" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 hidden">
    <div class="bg-slate-900 text-white px-4 py-2 rounded-md shadow">Reservasi berhasil dikirim</div>
  </div>

  <!-- JavaScript: kontrol modal & isi dinamis -->
  <script>
    (function() {
      // contoh data layanan & paket (sesuaikan ke data nyata)

      const SERVICES = {
        "woman-spa": {
          title: "Woman Spa",
          subtitle: "Perawatan khusus wanita",
          cs: "628972703833",

          packages: [{
              id: "ws-basic",
              name: "Langsung ke outlet",
              price: 0,
              desc: "Langsung ke outlet",
              img: svgDataUrl("Langsung ke outlet")
            },
            // {
            //   id: "ws-premium",
            //   name: "Premium Glow",
            //   price: 300000,
            //   desc: "Perawatan wajah + pijat 90 menit + masker",
            //   img: svgDataUrl("Premium Glow")
            // },
            // {
            //   id: "ws-deluxe",
            //   name: "Deluxe Retreat",
            //   price: 450000,
            //   desc: "Full package 120 menit + minuman & lounge",
            //   img: svgDataUrl("Deluxe Retreat")
            // }
          ],
          outlets: [{
            id: "allura",
            name: "Jl. Kadaka No.11, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141",
          }]
        },
        "baby-spa": {
          title: "Perawatan Keluarga",
          subtitle: "Layanan perawatan untuk keluarga",
          cs: "628972703833",

          outlets: [{
            id: "twinnie",
            name: "Villa Bunga Sepatu No.B-3, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141",
          }],
          packages: [{
              id: "BM-0-12",
              name: "Baby Massage -- 0-12 bulan -- Durasi 45-60 Menit -- Langsung ke Outlet",
              price: 50000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Baby Massage 0-12 bulan -- Langsung ke Outlet")
            },
            {
              id: "BM-0-12-",
              name: "Baby Massage -- 0-12 bulan -- Durasi 45-60 Menit -- Home Visit",
              price: 64000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Baby Massage 0-12 bulan -- Langsung ke Outlet -- Home Visit")
            },
            {
              id: "BM-0-24",
              name: "Baby Massage -- 0-24 bulan -- Durasi 45-60 Menit -- Langsung ke Outlet",
              price: 60000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Baby Massage 13-24 bulan -- Langsung ke Outle")
            },
            {
              id: "BM-0-24-",
              name: "Baby Massage -- 0-24 bulan -- Durasi 45-60 Menit -- Home Visit",
              price: 74000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Baby Massage 13-24 bulan -- Home Visit")
            },
            {
              id: "KM-2-4",
              name: "Kids Massage -- 2-4 tahun -- Durasi 60-90 Menit -- Langsung ke Outlet",
              price: 70000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Kids Massage 2-4 tahun -- Langsung ke Outlet")
            },
            {
              id: "KM-2-4-",
              name: "Kids Massage -- 2-4 tahun -- Durasi 60-90 Menit -- Home Visit",
              price: 84000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Kids Massage 2-4 tahun -- Home Visit")
            },
            {
              id: "KM-4-6",
              name: "Kids Massage -- 4-6 tahun -- Durasi 60-90 Menit -- Langsung ke Outlet",
              price: 80000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil  ",
              img: svgDataUrl("Kids Massage 4-6 tahun -- Langsung ke Outlet")
            },
            {
              id: "KM-4-6",
              name: "Kids Massage -- 4-6 tahun -- Durasi 60-90 Menit -- Home Visit",
              price: 94000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil  ",
              img: svgDataUrl("Kids Massage 4-6 tahun -- Home Visit")
            },
            {
              id: "KM-6-8",
              name: "Kids Massage -- 6-8 tahun -- Durasi 60-90 Menit -- Langsung ke Outlet",
              price: 90000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Kids Massage 6-8 tahun")
            },
            {
              id: "KM-6-8",
              name: "Kids Massage -- 6-8 tahun -- Durasi 60-90 Menit -- Home Visit",
              price: 104000,
              desc: "Bentuk simulasi raba (taktik) dan gerak (kinestetik), Tujuannya untuk optimalisasi pertumbuhan dan perkembangan si kecil ",
              img: svgDataUrl("Kids Massage 6-8 tahun -- Home Visit")
            },
            {
              id: "BS",
              name: "Baby Spa -- Berat min 5 kg & sudah kuat angkat kepala  -- Durasi 60-90 Menit -- Langsung ke Outlet",
              price: 120000,
              desc: "Perawatan bayi dengan menggabungkan layanan gym, gym ball, swim, baby bath dan massage",
              img: svgDataUrl("Baby Spa -- Berat min 5 kg & sudah kuat angkat kepala  -- Durasi 60-90 Menit -- Langsung ke Outlet")
            },
            {
              id: "BS-",
              name: "Baby Spa -- Berat min 5 kg & sudah kuat angkat kepala  -- Durasi 60-90 Menit -- Home Visit",
              price: 140000,
              desc: "Perawatan bayi dengan menggabungkan layanan gym, gym ball, swim, baby bath dan massage",
              img: svgDataUrl("Baby Spa -- Berat min 5 kg & sudah kuat angkat kepala  -- Durasi 60-90 Menit -- Home Visit")
            },
            {
              id: "BSw",
              name: "Baby Swim -- Durasi 30 Menit -- Tidak Bisa Home Visit",
              price: 70000,
              desc: "Bentuk terapi simulasi air pada bayi dengan fasilitas whirlpool dilengkapi dengan neckring berstandart internasional",
              img: svgDataUrl("Baby Swim Tidak Bisa Home Visit")
            },
            {
              id: "CR",
              name: "Cukur Rambut --Durasi  5-10 Menit -- New born, Baby & Kids",
              price: 25000,
              desc: "Layanan cukur rambut bayi menggunakan Hair Clipper Vacuum khusus baby (anti lecet).",
              img: svgDataUrl("Cukur Rambut -- 5-10 Menit -- New born & Kids")
            },
            {
              id: "CR",
              name: "Cukur Rambut --Durasi  5-10 Menit -- New born, Baby & Kids -- Home Visit",
              price: 35000,
              desc: "Layanan cukur rambut bayi menggunakan Hair Clipper Vacuum khusus baby (anti lecet).",
              img: svgDataUrl("Cukur Rambut -- 5-10 Menit -- New born & Kids -- Home Visit")
            },
            {
              id: "TB",
              name: "Tindik Bayi -- Durasi 30 Menit -- New born s/d 9 bulan -- Langsung ke Outlet",
              price: 50000,
              desc: "Layanan tindik telinga bayi perempuan menggunakan jarum steril sekali pakai.",
              img: svgDataUrl("Tindik Bayi -- Durasi 30 Menit -- New born s/d 9 bulan")
            },
            {
              id: "TB",
              name: "Tindik Bayi -- Durasi 30 Menit -- New born s/d 9 bulan -- Home Visit",
              price: 64000,
              desc: "Layanan tindik telinga bayi perempuan menggunakan jarum steril sekali pakai.",
              img: svgDataUrl("Tindik Bayi -- Durasi 30 Menit -- New born s/d 9 bulan -- Home Visit")
            },
            {
              id: "STK",
              name: "Screening Tumbuh Kembang -- Durasi 15-20 Menit -- New born, Baby, & Kids -- Langsung Ke Outlet",
              price: 50000,
              desc: "Pemantauan tumbuh kembang si kecil sesuai usia oleh Bidan/Dokter.",
              img: svgDataUrl("Screening Tumbuh Kembang -- Durasi 15-20 Menit -- New born, Baby, & Kids")
            },
            {
              id: "STK",
              name: "Screening Tumbuh Kembang -- Durasi 15-20 Menit -- New born, Baby, & Kids -- Home Visit",
              price: 65000,
              desc: "Pemantauan tumbuh kembang si kecil sesuai usia oleh Bidan/Dokter.",
              img: svgDataUrl("Screening Tumbuh Kembang -- Durasi 15-20 Menit -- New born, Baby, & Kids -- Home Visit")
            },
            {
              id: "TW",
              name: "Terapi Wicara -- Durasi 60 Menit -- Baby, Todler & Usia pra sekolah -- 1 x pertemuan -- Langsung ke Outlet",
              price: 150000,
              desc: "Layanan terapi oleh terapis wicara untuk membantu si kecil yang mengalami gangguan komunikasi & pemahaman bahasa.",
              img: svgDataUrl("Terapi Wicara -- Durasi 60 Menit -- Baby, Todler & Usia pra sekolah -- 1 x pertemuan")
            },
            {
              id: "TW",
              name: "Terapi Wicara -- Durasi 60 Menit -- Baby, Todler & Usia pra sekolah -- 1 x pertemuan -- Home Visit",
              price: 164000,
              desc: "Layanan terapi oleh terapis wicara untuk membantu si kecil yang mengalami gangguan komunikasi & pemahaman bahasa.",
              img: svgDataUrl("Terapi Wicara -- Durasi 60 Menit -- Baby, Todler & Usia pra sekolah -- 1 x pertemuan -- Home Visit")
            },
            {
              id: "MB",
              name: "Massage Bapil Baby -- Durasi 60-90 Menit -- Bayi usia 1-12 Bulan -- Langsung Ke Outlet",
              price: 85000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Baby -- Durasi 60-90 Menit -- Kids 1-12 Bulan -- Langsung Ke Outlet")
            },
            {
              id: "MB",
              name: "Massage Bapil Baby -- Durasi 60-90 Menit -- Bayi usia 1-12 Bulan -- Home Visit",
              price: 99000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Baby -- Durasi 60-90 Menit -- Kids 1-12 Bulan -- Home Visit")
            },
            {
              id: "MB1-2",
              name: "Massage Bapil Baby -- Durasi 60-90 Menit -- Bayi usia  1-2 Tahun -- Langsung Ke Outlet",
              price: 95000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Baby -- Durasi 60-90 Menit -- Kids 1-2 Tahun -- Langsung Ke Outlet")
            },
            {
              id: "MB1-2",
              name: "Massage Bapil Baby -- Durasi 60-90 Menit -- Bayi usia  1-2 Tahun -- Home Visit",
              price: 109000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Baby -- Durasi 60-90 Menit -- Kids 1-2 Tahun -- Home Visit")
            },
            {
              id: "MBK2",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 2-4 Tahun -- Langsung ke Outlet",
              price: 105000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 2-4 Tahun -- Langsung ke Outlet")
            },
            {
              id: "MBK2",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 2-4 Tahun -- Home Visit",
              price: 119000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 2-4 Tahun -- Home Visit")
            },
            {
              id: "MBK4",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 4-6 Tahun -- Langsung ke Outlet",
              price: 115000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 4-6 Tahun -- Langsung ke Outlet")
            },
            {
              id: "MBK4",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 4-6 Tahun -- Home Visit ",
              price: 129000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 4-6 Tahun -- Home Visit")
            },
            {
              id: "MBK6",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 6-8 Tahun -- Langsung ke Outlet",
              price: 125000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 6-8 Tahun")
            },

            {
              id: "MBK6",
              name: "Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 6-8 Tahun -- Home Visit",
              price: 139000,
              desc: "Layanan pijat menggunakan teknik dan oil khusus batuk pilek yang dikombinasikan dengan sinar IR. Tujuannya untuk meringankan gejala batuk pilek. ",
              img: svgDataUrl("Massage Bapil Kids -- Durasi 60-90 Menit -- Kids 6-8 Tahun")
            },
            {
              id: "PLB",
              name: "Paket Lengkap Baby -- Durasi 60-90 Menit -- Bayi usia 1 bulan - 2 Tahun -- 1 kali Terapi -- Langsung Ke Outlet",
              price: 120000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Baby -- Durasi 60-90 Menit -- Kids usia 1 bulan - 2 Tahun -- 1 kali Terapi -- Langsung Ke Outlet")
            },
            {
              id: "PLB",
              name: "Paket Lengkap Baby -- Durasi 60-90 Menit -- Bayi usia 1 bulan - 2 Tahun -- 1 kali Terapi -- Home Visit",
              price: 134000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Baby -- Durasi 60-90 Menit -- Kids usia 1 bulan - 2 Tahun -- 1 kali Terapi -- Home Visit")
            },

            {
              id: "PLB1",
              name: "Paket Lengkap Baby -- Durasi 60-90 Menit -- Bayi usia 1 bulan - 2 Tahun -- 3 kali Terapi -- Langsung ke Outlet",
              price: 345000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Baby -- Durasi 60-90 Menit -- Kids usia 1 bulan - 2 Tahun -- 3 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLB1",
              name: "Paket Lengkap Baby -- Durasi 60-90 Menit -- Bayi usia 1 bulan - 2 Tahun -- 3 kali Terapi -- Home Visit",
              price: 387000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Baby -- Durasi 60-90 Menit -- Kids usia 1 bulan - 2 Tahun -- 3 kali Terapi -- Home Visit")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 1 kali Terapi -- Langsung Ke Outlet",
              price: 150000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 1 kali Terapi -- Langsung Ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 1 kali Terapi -- Home Visit",
              price: 164000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 1 kali Terapi -- Home Visit")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 3 kali Terapi -- Langsung ke Outlet",
              price: 435000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 3 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 3 kali Terapi -- Home Visit",
              price: 477000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 2-4 Tahun -- 3 kali Terapi -- Home Visit")
            },



            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 1 kali Terapi -- Langsung ke Outlet",
              price: 160000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 1 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 1 kali Terapi -- Home Visit",
              price: 174000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 1 kali Terapi -- Home Visit")
            },

            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 3 kali Terapi -- Langsung ke Outlet",
              price: 465000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 3 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 3 kali Terapi -- Home Visit",
              price: 507000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 4-6 Tahun -- 3 kali Terapi -- Home Visit")
            },


            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 1 kali Terapi -- Langsung ke Outlet",
              price: 170000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 1 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 1 kali Terapi -- Home Visit",
              price: 184000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 1 kali Terapi -- Home Visit")
            },

            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 3 kali Terapi -- Langsung ke Outlet",
              price: 495000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 3 kali Terapi -- Langsung ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 3 kali Terapi -- Home Visit",
              price: 537000,
              desc: "Layanan Terapi batuk pilek lengkap terdiri atas massage bapil. Nebulizer dan sinar IR. Tujuannya untuk mengencerkan lendir dahak supaya lebih mudah dikeluarkan.",
              img: svgDataUrl("Paket Lengkap Kids -- Durasi 70-90 Menit -- Kids usia 6-8 Tahun -- 3 kali Terapi -- Home Visit")
            },

            {
              id: "PLK2.1",
              name: "Paket New Born Care  3 kali Terapi -- Harga Belum Termasuk Transport",
              price: 199000,
              desc: "Memandikan baby 1x Sehari -- Menjemur bayi -- Perawatan tali pusar -- oral core dan Potong Kuku -- Message Newborn 1x.",
              img: svgDataUrl("Paket New Born Care -- 3 kali Terapi -- Harga Belum Termasuk Transport")
            },


            {
              id: "PLK2.1",
              name: "Paket New Born Care  7 x Terapi -- Harga Belum Termasuk Transport",
              price: 349000,
              desc: "Memandikan baby 1x Sehari -- Menjemur bayi -- Perawatan tali pusar -- oral core dan Potong Kuku -- Message Newborn 2x.",
              img: svgDataUrl("Paket New Born Care  7 x Terapi -- Harga Belum Termasuk Transport")
            },
            {
              id: "PLK2.1",
              name: "Paket New Born Care  7 x Terapi -- Harga Belum Termasuk Transport",
              price: 499000,
              desc: "Memandikan baby 1x Sehari -- Menjemur bayi -- Perawatan tali pusar -- oral core dan Potong Kuku -- Message Newborn 3x.",
              img: svgDataUrl("Paket New Born Care  7 x Terapi -- Harga Belum Termasuk Transport")
            },
            {
              id: "PLK2.1",
              name: "Paket Selapanan -- 90 - 120 Menit-- Home Visit",
              price: 219000,
              desc: "Paket layanan home visit untuk ibu dan bayi saat bayi berusia 5/35 hari. Paket terdiri dari: Baby Massage, Cukur Rambut  bayi dengan baby hair clipper, Oral care dan gunting kuku, dan massage laktasi ibu untuk pelancar ASI.",
              img: svgDataUrl("Paket Selapanan -- 90 - 120 Menit-- Home Visit")
            },

            {
              id: "PLK2.1",
              name: "Pijat Asi Lancar -- 90 menit -- Langsung Ke Outlet",
              price: 130000,
              desc: "Terdiri dari Pijat payudara, pijat oksitosin, relaksasi punggung dan sinar Ir. Total durasi layanan 90 menit.",
              img: svgDataUrl("Pijat Asi Lancar -- 90 menit -- Langsung Ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Pijat Asi Lancar -- 90 menit -- Home Visit",
              price: 149000,
              desc: "Terdiri dari Pijat payudara, pijat oksitosin, relaksasi punggung dan sinar Ir. Total durasi layanan 90 menit.",
              img: svgDataUrl("Pijat Asi Lancar -- 90 menit -- Home Visit")
            },

            {
              id: "PLK2.1",
              name: "Pijat Bendungan Asi -- 90-120 menit -- Langsung Ke Outlet",
              price: 170000,
              desc: "Membantu mengurai keluhan sumbatan/bendungan ASI .",
              img: svgDataUrl("Pijat Bendungan Asi -- 90-120 menit -- Langsung Ke Outlet")
            },
            {
              id: "PLK2.1",
              name: "Pijat Bendungan Asi -- 90-120 menit -- Home Visit",
              price: 184000,
              desc: "Membantu mengurai keluhan sumbatan/bendungan ASI .",
              img: svgDataUrl("Pijat Bendungan Asi -- 90-120 menit -- Home Visit")
            },
            
            {
              id: "PLK2.2",
              name: "Pijat Relaksasi Full Body -- 60 menit -- Langsung Ke Outlet",
              price: 135000,
              desc: "Layanan massage seluruh badan untuk ibu agar tubuh lenih rileks.",
              img: svgDataUrl("Pijat Relaksasi Full Body -- 60 menit -- Langsung Ke Outlet")
            },
                 {
              id: "PLK2.3",
              name: "Pijat Relaksasi Full Body -- 60 menit -- Home Visit",
              price: 150000,
              desc: "Layanan massage seluruh badan untuk ibu agar tubuh lenih rileks.",
              img: svgDataUrl("Pijat Relaksasi Full Body -- 60 menit -- Home Visit")
            },
          ],
          extras: [{
              id: "Additional bath untuk cukur rambut",
              name: "Additional bath",
              price: 15000,

            },

            {
              id: "Pergantian Air ",
              name: "Pergantian Air Kolam Khusus Spa",
              price: 30000,

            },
            {
              id: "Cuci Hidung ",
              name: "Cuci Hidung Bapil",
              price: 35000,

            },
            {
              id: "Masker Nebul Bapil ",
              name: "Masker Nebul Bapil",
              price: 30000,

            },
            {
              id: "Tambah durasi Pijat relaksasi -- 30 menit ",
              name: "Tambah durasi Pijat relaksasi -- 30 menit",
              price: 30000,

            }
          ]
        },
        "holistic": {
          title: "Terapi",
          subtitle: "Relaksasi dan terapi otot <br> Ongkir 25-50k dilihat dari jauh dekatnya",
          cs: "62895327268977",

          outlets: [{
            id: "nimpuna",
            name: "Villa Bunga Sepatu No.B-3, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141",
          }],
          packages: [{
              id: "1-jam",
              name: "Terapi 1 jam",
              price: 120000,
              desc: "Terapi 60 menit - ongkir dari 25k sampai 50k ",
              img: svgDataUrl("Terapi 60")
            },
            {
              id: "1,5-jam",
              name: "Terapi 90 Menit",
              price: 150000,
              desc: "Terapi 90 Menit - ongkir dari 25k sampai 50k ",
              img: svgDataUrl("Terapi 90 Menit")
            },
            {
              id: "2-jam",
              name: "Terapi 120 Menit",
              price: 200000,
              desc: "Terapi 120 Menit - ongkir dari 25k sampai 50k ",
              img: svgDataUrl("Terapi 120 Menit")
            }

          ],
          extras: [{
            id: "Cek darah",
            name: "Cek Darah",
            price: 50000,

          }]
        },
        "psikolog": {
          title: "Pendampingan Kondisi Mental",
          subtitle: "Konsultasi dan Terapi",
          cs: "6281333430080",

          outlets: [{
            id: "Psikolog",
            name: "Jl. Sebuku No.19, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65126",
          }],
          packages: [{
              id: "Konseling",
              name: "Konseling",
              price: 150000,
              desc: "Konsultasi 1 jam (waktu bisa lebih dari 1 jam)",
              img: svgDataUrl("Konseling")
            },
            {
              id: "Psikoterapi",
              name: "Psikoterapi",
              price: 200000,
              desc: "Psikoterapi 1,5 jam (waktu bisa lebih dari 1,5 jam)",
              img: svgDataUrl("Psikoterapi")
            },
            {
              id: "Hipnoterapi",
              name: "Hipnoterapi",
              price: 250000,
              desc: "Hipnoterapi",
              img: svgDataUrl("Hipnoterapi")
            },
            {
              id: " MHCU-awal",
              name: "Mental Health Check-Up Awal + Konseling",
              price: 250000,
              desc: " (Mental Health Check-Up) awal + konseling",
              img: svgDataUrl("MHCU Awal + Konseling")
            },
            {
              id: "MHCU-lengkap",
              name: "Mental Health Check-Up) lengkap + Konseling ",
              price: 400000,
              desc: "HipnoteMental Health Check-Up) lengkap + Konseling ",
              img: svgDataUrl("MHCU Lengkap + Konseling")
            }
          ],
          // extras: [{
          //     id: "extra-jacuzzi",
          //     name: "Jacuzzi 30 menit",
          //     price: 50000
          //   },
          //   {
          //     id: "extra-aromatherapy",
          //     name: "Aromatherapy",
          //     price: 35000
          //   },
          //   {
          //     id: "extra-mask",
          //     name: "Masker Collagen",
          //     price: 75000
          //   }
          // ]
        }
      };

      // helper: buat data URI SVG sederhana (placeholder image)
      function svgDataUrl(text) {
        const svg = `<svg xmlns='http://www.w3.org/2000/svg' width='1200' height='600'><defs><linearGradient id='g' x1='0' x2='1' y1='0' y2='1'><stop offset='0' stop-color='#ff3ba5'/><stop offset='1' stop-color='#f06aa8'/></linearGradient></defs><rect width='100%' height='100%' fill='url(#g)'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' font-size='48' font-family='Arial' fill='#fff'>${escapeXml(text)}</text></svg>`;
        return 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
      }

      function escapeXml(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&apos;');
      }

      // DOM refs
      const orderBtns = document.querySelectorAll('.order-btn');
      const modal = document.getElementById('bookingModal');
      const overlay = document.getElementById('modalOverlay');
      const closeBtn = document.getElementById('modalCloseBtn');
      const cancelBtn = document.getElementById('cancelBtn');
      const serviceInput = document.getElementById('serviceInput');
      const modalTitle = document.getElementById('modalTitle');
      const modalSubtitle = document.getElementById('modalSubtitle');
      const packageSelect = document.getElementById('packageSelect');
      const outletSelect = document.getElementById('outletSelect');

      const previewImage = document.getElementById('previewImage');
      const previewTitle = document.getElementById('previewTitle');
      const previewDesc = document.getElementById('previewDesc');
      const previewPrice = document.getElementById('previewPrice');
      const extrasSection = document.getElementById('extrasSection');
      const extrasContainer = document.getElementById('extrasContainer');
      const selectedExtras = document.getElementById('selectedExtras');
      const toast = document.getElementById('toast');
      const bookingForm = document.getElementById('bookingForm');

      // show modal
      function openModal(serviceKey) {
        const svc = SERVICES[serviceKey];
        if (!svc) return console.warn('Service not found', serviceKey);

        // fill header
        modalTitle.textContent = `Pesan — ${svc.title}`;
        modalSubtitle.textContent = svc.subtitle || '';

        // fill hidden service input
        serviceInput.value = serviceKey;

        // populate outlet select
        outletSelect.innerHTML = '';
        svc.outlets.forEach(p => {
          const opt = document.createElement('option');
          opt.value = p.id;
          opt.textContent = `${p.name} `;
          outletSelect.appendChild(opt);
        });

        // populate paket select
        packageSelect.innerHTML = '';
        svc.packages.forEach(p => {
          const opt = document.createElement('option');
          opt.value = p.id;
          opt.textContent = `${p.name} — Rp ${formatPrice(p.price)}`;
          packageSelect.appendChild(opt);
        });


        // extras
        if (svc.extras && svc.extras.length) {
          extrasSection.classList.remove('hidden');
          extrasContainer.innerHTML = '';
          svc.extras.forEach(extra => {
            const id = `extra-${extra.id}`;
            const wrapper = document.createElement('label');
            wrapper.className = 'flex items-center gap-2';
            wrapper.innerHTML = `<input type="checkbox" data-extra-id="${extra.id}" data-extra-price="${extra.price}" class="form-extra h-4 w-4 rounded border" /><span class="text-sm">${extra.name} (+Rp ${formatPrice(extra.price)})</span>`;
            extrasContainer.appendChild(wrapper);
          });
        } else {
          extrasSection.classList.add('hidden');
          extrasContainer.innerHTML = '';
        }

        // set initial preview to first package
        packageSelect.selectedIndex = 0;
        updatePreviewFromPackage(serviceKey, packageSelect.value);

        // show modal
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');

        // trap scroll on body
        document.documentElement.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';

        // focus first input
        setTimeout(() => document.getElementById('nameInput')?.focus(), 120);
      }

      // hide modal and reset if asked
      function closeModal(reset = false) {
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.style.overflow = '';
        document.body.style.overflow = '';
        if (reset) bookingForm.reset();
      }

      // update preview when package changes
      function updatePreviewFromPackage(serviceKey, packageId) {
        const svc = SERVICES[serviceKey];
        if (!svc) return;
        const pkg = svc.packages.find(p => p.id === packageId) || svc.packages[0];
        if (!pkg) return;

        previewImage.src = pkg.img;
        previewTitle.textContent = pkg.name;
        previewDesc.textContent = pkg.desc || '';
        previewPrice.textContent = 'Rp ' + formatPrice(pkg.price);


        // update selected extras display
        updateSelectedExtrasDisplay();
      }

      // update selected extras display and total
      function updateSelectedExtrasDisplay() {
        const svcKey = serviceInput.value;
        const svc = SERVICES[svcKey];
        if (!svc) return;

        const checked = Array.from(extrasContainer.querySelectorAll('input[type=checkbox]:checked'));
        if (checked.length === 0) {
          selectedExtras.textContent = '';
          return;
        }

        const names = checked.map(c =>
          c.nextElementSibling?.textContent || ''); // text includes price suffix

        selectedExtras.innerHTML = names.map(n => escapeHtml(n)).join('<br>');
      }

      // price formatting
      function formatPrice(n) {
        return String(n).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      // events: open modal based on button
      orderBtns.forEach(b => {
        b.addEventListener('click', (e) => {
          const svc = b.dataset.service;
          openModal(svc);
        });
      });

      // close handlers
      closeBtn.addEventListener('click', () => closeModal(false));
      cancelBtn.addEventListener('click', () => {
        closeModal(true);
      });

      // clicking outside (overlay) closes
      overlay.addEventListener('click', () => closeModal(true));

      // esc key closes
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) closeModal(true);
      });

      // when package select changes
      packageSelect.addEventListener('change', (e) => {
        const serviceKey = serviceInput.value;
        updatePreviewFromPackage(serviceKey, e.target.value);
        let total = totalPrice();
        document.getElementById("totalPrice").innerHTML = `Rp ${formatPrice(total.total)}`

      });

      // extras change
      extrasContainer.addEventListener('change', (e) => {
        if (e.target && e.target.matches('input[type=checkbox]')) {
          updateSelectedExtrasDisplay();
        }
        let total = totalPrice();

        document.getElementById("totalPrice").innerHTML = `Rp ${formatPrice(total.total)}`

      });


      // small utility: when modal hidden, restore focus to first order button
      const observer = new MutationObserver(() => {
        if (modal.classList.contains('hidden')) {
          (document.querySelector('.order-btn') || document.body).focus();
        }
      });
      observer.observe(modal, {
        attributes: true,
        attributeFilter: ['class']
      });

      // expose for debugging
      window._booking = {
        openModal,
        closeModal,
        SERVICES
      };




      // --- mulai potongan baru: WA forwarding (ganti/letakkan di script utama) ---

      function getCsNumberForService(serviceKey) {

        return SERVICES[serviceKey].cs || null;
      }

      function buildWhatsappMessage(payload, pkgDetail, extrasList, totalPrice) {
        // Susun pesan dengan format yang ramah pembaca
        const lines = [];
        lines.push("📩 *Reservasi Baru*");
        lines.push("");
        lines.push(`*Layanan:* ${payload.serviceTitle || payload.service}`);
        lines.push(`*Paket:* ${pkgDetail.name} — Rp ${formatPrice(pkgDetail.price)}`);
        if (extrasList.length) {
          lines.push(`*Tambahan:* ${extrasList.map(e => `${e.name} (+Rp ${formatPrice(e.price)})`).join(", ")}`);
        } else {
          lines.push(`*Tambahan:* Tidak ada`);
        }
        lines.push(`*Outlet:* ${payload.outlet}`);
        lines.push("");
        lines.push(`*Nama:* ${payload.name}`);
        lines.push(`*No. HP:* ${payload.phone}`);
        lines.push(`*Tanggal:* ${payload.date}`);
        lines.push(`*Jam:* ${payload.time}`);
        if (payload.notes) {
          lines.push(`*Alamat/Catatan:* ${payload.notes}`);
        }
        lines.push("");
        lines.push(`*Total estimasi:* Rp ${formatPrice(totalPrice)}`);
        lines.push("");
        lines.push("Mohon konfirmasi ketersediaan dan langkah selanjutnya. Terima kasih 🙏");

        return lines.join("\n");
      }

      function totalPrice() {

        // Ambil input form
        const form = new FormData(bookingForm);
        const name = form.get('name')?.trim();
        const phone = form.get('phone')?.trim();
        const date = form.get('date')?.trim();
        const time = form.get('time')?.trim();
        const notes = form.get('notes')?.trim();
        const outlet = form.get('outlet')?.trim();
        const packageId = form.get('package')?.trim();
        const serviceKey = form.get('service')?.trim();

        // validasi sederhana
        const requiredFields = [{
            v: name,
            label: 'Nama'
          },
          {
            v: phone,
            label: 'No. HP'
          },
          {
            v: date,
            label: 'Tanggal'
          },
          {
            v: time,
            label: 'Jam'
          },
          {
            v: packageId,
            label: 'Paket'
          },
          {
            v: serviceKey,
            label: 'Layanan'
          }
        ];
        const missing = requiredFields.filter(x => !x.v).map(x => x.label);
        if (missing.length) {
          alert('Mohon lengkapi field: ' + missing.join(', '));
          return;
        }

        // cari data paket dari SERVICES (pastikan SERVICES ada di scope)
        const svc = window._booking?.SERVICES?.[serviceKey] || (typeof SERVICES !== 'undefined' ? SERVICES[serviceKey] : null);
        if (!svc) {
          alert('Layanan tidak ditemukan. Segera hubungi admin.');
          return;
        }
        const pkg = (svc.packages || []).find(p => p.id === packageId) || svc.packages?.[0];
        if (!pkg) {
          alert('Paket tidak ditemukan. Segera hubungi admin.');
          return;
        }

        // ambil extras yang dicentang (jika ada)
        const checkedExtras = Array.from(extrasContainer.querySelectorAll('input[type=checkbox]:checked')).map(c => {
          return {
            id: c.dataset.extraId,
            name: c.nextElementSibling?.textContent?.replace(/\s*\(\+Rp.*\)$/, '') || c.dataset.extraId,
            price: Number(c.dataset.extraPrice) || 0
          };
        });

        // hitung total estimasi
        const extrasSum = checkedExtras.reduce((s, x) => s + (x.price || 0), 0);
        const total = (pkg.price || 0) + extrasSum;

        return {
          service: serviceKey,
          serviceTitle: svc.title || serviceKey,
          name,
          phone,
          date,
          time,
          notes,
          outlet,
          package: packageId,
          extras: checkedExtras,

          pkg: pkg,
          checkedExtras: checkedExtras,
          svc: svc,
          total: total
        };

      }

      ////submit
      bookingForm.addEventListener('submit', (e) => {
        e.preventDefault();


        // bangun payload ringkas (jika ingin disimpan ke server)
        const payload = totalPrice()

        // target CS WA
        const csNumber = getCsNumberForService(payload.service);
        if (!csNumber) {
          alert('Nomor CS untuk layanan ini belum dikonfigurasi. Silakan hubungi admin.');
          return;
        }

        // buat pesan WA
        const message = buildWhatsappMessage(payload, payload.pkg, payload.checkedExtras, payload.total);
        const waLink = `https://wa.me/${csNumber}?text=${encodeURIComponent(message)}`;

        // buka WA di tab baru (web/handphone)
        window.open(waLink, '_blank');

        // tampilkan toast sukses kecil
        toast.querySelector('div').textContent = 'WhatsApp terbuka, silakan lanjutkan konfirmasi di aplikasi.';
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 2800);

        // tutup modal dan reset form setelah sedikit delay
        setTimeout(() => {
          closeModal(true);
        }, 500);

        // Opsional: jika mau juga kirim ke endpoint server (uncomment & ganti URL)
        /*
        fetch('/api/bookings', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
        })
        .then(r => r.json())
        .then(res => console.log('server response', res))
        .catch(err => console.error(err));
        */
      });
      // --- akhir potongan baru ---

    })();
  </script>

  <!-- Floating CTAs (Tailwind) -->
  <div id="floatingCTAs"
    class="fixed bottom-6 right-6 z-40 flex flex-col sm:flex-row gap-3 items-center
            transition-all duration-250 ease-out transform">
    <!-- Pesan Sekarang (primary) -->
    <a href="#services"
      class="flex items-center gap-3 px-5 py-2 rounded-2xl text-sm font-semibold
         shadow-md transform transition duration-200
         hover:scale-105 active:scale-95 focus:outline-none focus:ring-4 focus:ring-pink-200
         bg-gradient-to-r from-[#ff3ba5] to-[#f06aa8] text-white"
      aria-label="Pesan sekarang">
      <!-- icon (SVG) -->
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M2 12l20-9-9 20-3-8-8-3z" fill="currentColor" />
      </svg>
      <span>Pesan Sekarang</span>
    </a>



    <!-- Jalin Kemitraan (secondary / glass) -->
    <button id="jalinMitra"
      class="flex items-center gap-3 px-5 py-2 rounded-2xl text-sm font-medium
         shadow-sm transform transition duration-200
         hover:scale-105 active:scale-95 focus:outline-none focus:ring-4 focus:ring-pink-100
         bg-white text-[color:#0f172a] border border-[rgba(255,59,165,0.18)]"
      aria-label="Jalin kemitraan">
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path d="M12 2l4 7H8l4-7zM2 12l7 4v-8L2 12zm20 0l-7 4v-8l7 4z" fill="currentColor" />
      </svg>
      <span>Jalin Kemitraan</span>
    </button>
  </div>

  <!-- Script: auto-hide saat modal aktif + helpers -->
  <script>
    (function() {
      const floating = document.getElementById('floatingCTAs');

      // utility: periksa apakah modal aktif
      function isModalOpen() {
        // 1) body.modal-open (banyak library menambahkan ini)
        if (document.body.classList.contains('modal-open')) return true;

        // 2) <dialog open>
        if (document.querySelector('dialog[open]')) return true;

        // 3) elemen dengan data-modal-open="true"
        if (document.querySelector('[data-modal-open="true"]')) return true;

        // 4) elemen dengan kelas 'modal' dan terlihat (opsional)
        const modalLike = document.querySelector('.modal, [data-modal]');
        if (modalLike) {
          const style = getComputedStyle(modalLike);
          if (style.display !== 'none' && style.visibility !== 'hidden' && parseFloat(style.opacity || 1) > 0) {
            // if it is visibly covering the page, consider open
            return false; // keep false to avoid false positives; we handled other selectors above
          }
        }

        return false;
      }

      // show / hide helpers
      function hideFloating() {
        // smooth hide (opacity + pointer-events)
        floating.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
        // after transition, add 'hidden' so it won't block layout/interactions
        setTimeout(() => floating.classList.add('hidden'), 220);
      }

      function showFloating() {
        floating.classList.remove('hidden');
        // small timeout to allow hidden -> visible before removing opacity
        requestAnimationFrame(() => {
          floating.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
        });
      }

      // initial state
      if (isModalOpen()) hideFloating();
      else showFloating();

      // Observe body class changes (for libraries that toggle body.modal-open)
      const observer = new MutationObserver(() => {
        if (isModalOpen()) hideFloating();
        else showFloating();
      });
      observer.observe(document.body, {
        attributes: true,
        attributeFilter: ['class']
      });

      // Also listen for custom events so you can manually dispatch if your modal system doesn't toggle classes
      window.addEventListener('modal:open', hideFloating);
      window.addEventListener('modal:close', showFloating);

      // Optional: hide when a native <dialog> opens or when element with [data-modal-open] appears
      const docObserver = new MutationObserver(() => {
        if (isModalOpen()) hideFloating();
        else showFloating();
      });
      docObserver.observe(document.documentElement, {
        childList: true,
        subtree: true
      });

      // Expose functions for manual control (if needed)
      window.floatingCTAs = {
        hide: hideFloating,
        show: showFloating,
        isHidden: () => floating.classList.contains('hidden')
      };
    })();
  </script>


  <!-- Script: menu toggles, ripple, -->
  <script>
    (function() {
      // Mobile menu toggle
      const mobileBtn = document.getElementById('mobileMenuBtn');
      const mobileMenu = document.getElementById('mobileMenu');
      const iconOpen = document.getElementById('iconOpen');
      const iconClose = document.getElementById('iconClose');
      if (mobileBtn) {
        mobileBtn.addEventListener('click', () => {
          const opened = mobileMenu.classList.toggle('hidden') ? false : true;
          iconOpen.classList.toggle('hidden');
          iconClose.classList.toggle('hidden');
          mobileBtn.setAttribute('aria-expanded', String(opened));
        });
      }

      // Ripple on mobile menu items
      function createRipple(e, color = 'rgba(236,72,153,0.12)') {
        const target = e.currentTarget;
        const rect = target.getBoundingClientRect();
        const r = document.createElement('span');
        r.className = 'ripple';
        r.style.width = r.style.height = Math.max(rect.width, rect.height) + 'px';
        r.style.left = (e.clientX - rect.left - rect.width / 2) + 'px';
        r.style.top = (e.clientY - rect.top - rect.width / 2) + 'px';
        r.style.background = color;
        target.appendChild(r);
        setTimeout(() => r.remove(), 600);
      }

      document.querySelectorAll('.menu-item-mobile').forEach(it => {
        it.addEventListener('click', createRipple);
        it.addEventListener('touchstart', createRipple);
      });

      // Underline animation already CSS-driven; add keyboard "press" effect for accessibility
      document.querySelectorAll('.menu-item').forEach(it => {
        it.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            it.classList.add('pressed');
            setTimeout(() => it.classList.remove('pressed'), 160);
          }
        });
      });

    })();
  </script>

  <script>
    /* ========== Config: ganti gambar/opacity di :root jika perlu ========== */


    const services = [{

        id: 'baby-spa',
        title: 'Baby Spa',
        subtitle: 'Perawatan lembut untuk bayi.',
        caption: 'Perawatan personal, aman, dan penuh empati.',

        video: 'assets/videos/baby-2.mp4',
        videos: [{
            src: 'assets/videos/baby-2.mp4',
            poster: 'assets/img/baby.jpg',
            label: 'Intro'
          },

        ],
        poster: 'assets/img/baby.jpg',
        thumbs: [
          'assets/img/baby.jpg',
          'assets/img/baby-1.jpg',
          'assets/img/baby-2.jpg',
          'assets/img/baby-3.jpg',
          'assets/img/baby-4.jpg',
          'assets/img/baby-5.jpg',
          'assets/img/baby-6.jpg',
        ],
        logos: [
          'assets/img/logo-rumah-ameera.jpg',
          'assets/img/logo-twinnie.jpg',
        ]
      },
      {
        id: 'woman-spa',
        title: 'Woman Spa & Pelatihan',
        subtitle: 'Spa khusus wanita & program pelatihan profesional.',
        caption: 'Pelatihan terakreditasi & perawatan yang hangat.',
        video: 'assets/videos/woman.mp4',
        videos: [{
            src: 'assets/videos/woman.mp4',
            poster: 'assets/img/woman-allura.jpg',
            label: 'Intro'
          },

        ],
        poster: 'assets/img/woman-allura.jpg',
        thumbs: [
          'assets/img/woman-massage-1.jpg',
          'assets/img/woman-massage.jpg',
          'assets/img/woman-hair.jpg',
        ],
        logos: [
          'assets/img/logo-allura.jpg'
        ]
      },
      {
        id: 'holistic',
        title: 'Terapi Holistik Medis',
        subtitle: 'Program terapi untuk kondisi medis.',
        caption: 'Pendekatan kolaboratif dengan tenaga medis kompeten.',
        video: 'assets/videos/bekam.mp4',
        videos: [{
            src: 'assets/videos/bekam.mp4',
            poster: 'assets/img/thumb1.jpg',
            label: 'Intro'
          },

        ],
        poster: 'assets/img/Bekam.jpg',
        thumbs: [

          'assets/img/tcm.webp',
          'assets/img/Bekam.jpg',
          'assets/img/tongue.webp',
        ],
        logos: [

          'assets/img/logo-rumah-ameera.jpg',
          'assets/img/logo-nimpuna.jpg',
          'assets/img/logo-uk-family-care.jpeg',
        ]
      },
      {
        id: 'psikolog',
        title: 'Terapi Dan Konsultasi bersama Psikolog',
        subtitle: 'Pendampingan Kondisi mental.',
        caption: 'Pendekatan kolaboratif dengan psikolog kompeten.',
        video: 'assets/videos/psikolog.mp4',
        videos: [{
          src: 'assets/videos/psikolog.mp4',
          poster: 'assets/img/psikolog.jpg',
          label: 'Intro'
        }],
        poster: 'assets/img/psikolog2.jpg',
        thumbs: [

          'assets/img/psikolog.jpg',
          'assets/img/psikolog2.jpg',
        ],
        logos: [

          'assets/img/logo-psikolog.jpg'
        ]
      }
    ];


    // DOM nodes
    const nodes = {
      serviceVideo: document.getElementById('serviceVideo'),
      videoSource: document.getElementById('videoSource'),
      playOverlay: document.getElementById('playOverlay'),
      thumbs: document.getElementById('thumbs'),
      dots: document.getElementById('dots'),
      logosStrip: document.getElementById('logosStrip'),
      modal: document.getElementById('modal'),
      modalPanel: document.getElementById('modalPanel'),
      modalTitle: document.getElementById('modalTitle'),
      modalContent: document.getElementById('modalContent'),
      modalClose: document.getElementById('modalClose'),
      modalCloseFooter: document.getElementById('modalCloseFooter'),
      modalAction: document.getElementById('modalAction'),
      modalFooter: document.getElementById('modalFooter'),
      prevService: document.getElementById('prevService'),
      nextService: document.getElementById('nextService'),
      prevServiceMobile: document.getElementById('prevServiceMobile'),
      nextServiceMobile: document.getElementById('nextServiceMobile'),
      playIcon: document.getElementById('playIcon')
    };

    /********** Simple Modal Manager (kept same behavior as earlier) **********/
    let lastFocused = null;

    function openModal(opts = {}) {
      lastFocused = document.activeElement;
      nodes.modal.classList.remove('hidden');
      nodes.modal.setAttribute('aria-hidden', 'false');
      nodes.modalAction.hidden = true;
      nodes.modalFooter.style.display = opts.hideFooter ? 'none' : 'flex';
      nodes.modalTitle.textContent = opts.title || 'Preview';
      nodes.modalContent.innerHTML = '';

      // Choose panel theme (light for WA form; dark for previews)
      if (opts.theme === 'light') {
        nodes.modalPanel.className = 'modal-panel w-full max-w-full mx-auto rounded-xl shadow-2xl overflow-hidden focus:outline-none bg-white text-slate-900';
        document.getElementById('modalHeader').className = 'flex items-center justify-between p-4 border-b bg-white';
        nodes.modalFooter.classList.add('bg-white');
      } else {
        nodes.modalPanel.className = 'modal-panel w-full max-w-full mx-auto rounded-xl shadow-2xl overflow-hidden focus:outline-none bg-stone-900/90 glass-bg text-white';
        document.getElementById('modalHeader').className = 'flex items-center justify-between p-4 border-b';
        nodes.modalFooter.classList.remove('bg-white');
      }

      if (opts.type === 'image') {
        const img = document.createElement('img');
        img.src = opts.src;
        img.alt = opts.title || 'Preview image';
        img.className = 'w-full h-auto max-h-[70vh] object-contain rounded-md';
        nodes.modalContent.appendChild(img);
      } else if (opts.type === 'video') {
        const v = document.createElement('video');
        v.controls = true;
        v.playsInline = true;
        v.className = 'w-full h-auto max-h-[70vh] rounded-md bg-black';
        v.src = opts.src;
        if (opts.poster) v.poster = opts.poster;
        nodes.modalContent.appendChild(v);
        v.muted = false;
        v.play().catch(() => {});
      } else if (opts.type === 'waForm') {
        nodes.modalContent.innerHTML = `
          <form id="waForm" class="grid gap-3 text-slate-900">
            <label class="text-sm">Nama <input required name="name" class="mt-1 block w-full rounded-md border border-slate-200 p-2 bg-white text-slate-900" /></label>
            <label class="text-sm">No. Telepon <input required name="phone" placeholder="08xxxxxxxxxx" class="mt-1 block w-full rounded-md border border-slate-200 p-2 bg-white text-slate-900" /></label>
            <label class="text-sm">Layanan
              <select name="service" class="mt-1 block w-full rounded-md border border-slate-200 p-2 bg-white text-slate-900">
                ${services.map(s => `<option value="${escapeHtml(s.title)}">${escapeHtml(s.title)}</option>`).join('')}
              </select>
            </label>
            <label class="text-sm">Pesan <textarea name="message" rows="4" class="mt-1 block w-full rounded-md border border-slate-200 p-2 bg-white text-slate-900"></textarea></label>
            <div class="flex items-center gap-2 mt-2">
              <button type="submit" class="px-4 py-2 rounded-md bg-rose-500 hover:bg-rose-600 text-white">Kirim ke WhatsApp</button>
              <button type="button" id="waCancel" class="px-4 py-2 rounded-md bg-stone-100 hover:bg-stone-200 text-slate-900">Batal</button>
            </div>
          </form>
        `;
        const form = nodes.modalContent.querySelector('#waForm');
        form.addEventListener('submit', (ev) => {
          ev.preventDefault();
          const fd = new FormData(form);
          const name = fd.get('name') || '';
          const phone = fd.get('phone') || '';
          const service = fd.get('service') || '';
          const message = fd.get('message') || '';
          const text = `Halo Nimpuna,%0A%0ASaya ingin memesan layanan:%0A- Layanan: ${service}%0A- Nama: ${name}%0A- Telepon: ${phone}%0A- Pesan: ${message}`;
          window.open(WA_BASE + encodeURIComponent(text), '_blank');
        });
        nodes.modalContent.querySelector('#waCancel').addEventListener('click', closeModal);
      } else if (opts.type === 'form') {
        nodes.modalContent.innerHTML = `
          <form id="partnerForm" class="grid gap-3">
            <label class="text-sm">Nama <input required name="name" class="mt-1 block w-full rounded-md bg-stone-800 border border-white/6 p-2 text-white" /></label>
            <label class="text-sm">Email <input required type="email" name="email" class="mt-1 block w-full rounded-md bg-stone-800 border border-white/6 p-2 text-white" /></label>
            <label class="text-sm">Perusahaan / Catatan <textarea name="note" rows="4" class="mt-1 block w-full rounded-md bg-stone-800 border border-white/6 p-2 text-white"></textarea></label>
            <div class="flex items-center gap-2 mt-2">
              <button type="submit" class="px-4 py-2 rounded-md bg-rose-500 hover:bg-rose-600 text-white">Kirim via WhatsApp</button>
              <button type="button" id="partnerCancel" class="px-4 py-2 rounded-md bg-white/6 hover:bg-white/12 text-white">Batal</button>
            </div>
          </form>
        `;
        const form = nodes.modalContent.querySelector('#partnerForm');
        form.addEventListener('submit', (ev) => {
          ev.preventDefault();
          const data = new FormData(form);
          const name = data.get('name') || '';
          const email = data.get('email') || '';
          const note = data.get('note') || '';
          const text = `Halo Nimpuna, saya mengajukan kemitraan.%0ANama: ${name}%0AEmail: ${email}%0ACatatan: ${note}`;
          window.open(WA_BASE + encodeURIComponent(text), '_blank');
        });
        nodes.modalContent.querySelector('#partnerCancel').addEventListener('click', closeModal);
      } else if (opts.type === 'image' || opts.type === 'html') {
        if (opts.type === 'image') {
          const img = document.createElement('img');
          img.src = opts.src;
          img.alt = opts.title || 'Preview';
          img.className = 'w-full h-auto max-h-[60vh] object-contain rounded-md';
          nodes.modalContent.appendChild(img);
        } else {
          nodes.modalContent.innerHTML = opts.html || '';
        }
      }

      // action button if provided
      if (opts.actionLabel && typeof opts.actionFn === 'function') {
        nodes.modalAction.hidden = false;
        nodes.modalAction.textContent = opts.actionLabel;
        nodes.modalAction.onclick = opts.actionFn;
      } else nodes.modalAction.hidden = true;

      nodes.modalPanel.style.transform = 'translateY(8px) scale(.995)';
      nodes.modalPanel.style.opacity = '0';
      requestAnimationFrame(() => {
        nodes.modalPanel.style.transform = '';
        nodes.modalPanel.style.opacity = '';
      });

      const focusable = nodes.modalPanel.querySelectorAll('button,a,input,textarea,select');
      if (focusable.length) focusable[0].focus();
      else nodes.modalPanel.focus();

      document.addEventListener('keydown', escHandler);
      nodes.modal.addEventListener('click', outsideClick);
    }

    function closeModal() {
      nodes.modal.classList.add('hidden');
      nodes.modal.setAttribute('aria-hidden', 'true');
      nodes.modalContent.innerHTML = '';
      nodes.modalAction.hidden = true;
      if (lastFocused) lastFocused.focus();
      document.removeEventListener('keydown', escHandler);
      nodes.modal.removeEventListener('click', outsideClick);
    }

    function escHandler(e) {
      if (e.key === 'Escape') closeModal();
      if (e.key === 'Tab') {
        const focusable = nodes.modalPanel.querySelectorAll('a[href], button:not([disabled]), textarea, input, select');
        if (focusable.length === 0) return;
        const first = focusable[0],
          last = focusable[focusable.length - 1];
        if (e.shiftKey && document.activeElement === first) {
          last.focus();
          e.preventDefault();
        } else if (!e.shiftKey && document.activeElement === last) {
          first.focus();
          e.preventDefault();
        }
      }
    }

    function outsideClick(e) {
      if (!nodes.modalPanel.contains(e.target)) closeModal();
    }
    nodes.modalClose.addEventListener('click', closeModal);
    nodes.modalCloseFooter.addEventListener('click', closeModal);

    function escapeHtml(s) {
      return ('' + s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    /******** UI & Carousel (same logic as before) ********/
    const el = {
      thumbs: nodes.thumbs,
      dots: nodes.dots,
      video: nodes.serviceVideo,
      videoSource: nodes.videoSource,
      logosStrip: nodes.logosStrip,
      playOverlay: nodes.playOverlay
    };

    function renderThumbs(list = [], svc) {
      el.thumbs.innerHTML = '';
      list.forEach((src, idx) => {
        const btn = document.createElement('button');
        btn.className = 'flex-none w-20 h-12 rounded-md overflow-hidden border border-slate-200 shadow-sm bg-white';
        btn.type = 'button';
        const img = document.createElement('img');
        img.src = src;
        img.alt = `${svc.title} — foto ${idx+1}`;
        img.className = 'w-full h-full object-cover';
        btn.appendChild(img);
        btn.addEventListener('click', () => {
          openModal({
            type: 'image',
            title: svc.title + ' — Foto',
            src: src,
            theme: 'dark',
            actionLabel: 'Putar Video',
            actionFn: () => {
              openModal({
                type: 'video',
                title: svc.title + ' — Video Preview',
                src: svc.video,
                poster: svc.poster,
                theme: 'dark'
              });
            }
          });
        });
        el.thumbs.appendChild(btn);
      });
    }

    function renderLogos(logos = []) {
      el.logosStrip.innerHTML = '';
      logos.forEach((src, i) => {
        const wrap = document.createElement('div');
        wrap.className = 'logo-circle fade-in';
        const img = document.createElement('img');
        img.src = src;
        img.alt = `Partner logo ${i+1}`;
        wrap.appendChild(img);
        el.logosStrip.appendChild(wrap);
      });
    }

    function createDots() {
      el.dots.innerHTML = '';
      services.forEach((s, i) => {
        const b = document.createElement('button');
        b.className = 'w-3 h-3 rounded-full bg-white/40';
        b.title = s.title;
        b.type = 'button';
        b.addEventListener('click', () => goTo(i));
        el.dots.appendChild(b);
      });
    }

    function updateDots(currentIndex) {
      Array.from(el.dots.children).forEach((d, i) => {
        d.classList.toggle('bg-white', i === currentIndex);
        d.classList.toggle('bg-white/40', i !== currentIndex);
      });
    }

    async function tryPlayVideo(videoEl) {
      if (!videoEl) return false;
      try {
        videoEl.muted = true;
        videoEl.setAttribute('playsinline', '');
        videoEl.setAttribute('webkit-playsinline', '');
        const p = videoEl.play();
        if (p !== undefined) {
          await p;
          return !videoEl.paused;
        }
        return !videoEl.paused;
      } catch (e) {
        return false;
      }
    }

    let current = 0;

    function renderService(index) {
      const svc = services[index];
      current = index;

      document.getElementById('serviceTitle').textContent = svc.title;
      document.getElementById('serviceSubtitle').textContent = svc.subtitle;
      document.getElementById('serviceCaption').textContent = svc.caption;
      document.getElementById('mediaCaptionTitle').textContent = svc.title;
      document.getElementById('mediaCaptionSub').textContent = svc.subtitle;

      el.video.pause();
      if (svc.poster) el.video.setAttribute('poster', svc.poster);
      else el.video.removeAttribute('poster');
      nodes.videoSource.src = svc.video;
      try {
        el.video.load();
      } catch (e) {}

      renderThumbs(svc.thumbs || [], svc);
      renderLogos(svc.logos || []);
      updateDots(current);

      el.video.onended = () => {
        const nextIdx = (current + 1) % services.length;
        renderService(nextIdx);
      };

      (async () => {
        let ok = await tryPlayVideo(el.video);
        if (!ok) {
          for (const d of [120, 400, 900]) {
            await new Promise(r => setTimeout(r, d));
            if (await tryPlayVideo(el.video)) {
              ok = true;
              break;
            }
          }
        }
        if (ok) hideOverlay();
        else {
          const gesture = async () => {
            document.removeEventListener('pointerdown', gesture);
            document.removeEventListener('touchstart', gesture);
            document.removeEventListener('click', gesture);
            if (await tryPlayVideo(el.video)) hideOverlay();
          };
          document.addEventListener('pointerdown', gesture, {
            once: true
          });
          document.addEventListener('touchstart', gesture, {
            once: true
          });
          document.addEventListener('click', gesture, {
            once: true
          });
          setTimeout(() => {
            if (el.video.paused) showOverlay();
          }, 400);
        }
      })();
    }

    function next() {
      renderService((current + 1) % services.length);
    }

    function prev() {
      renderService((current - 1 + services.length) % services.length);
    }

    function goTo(i) {
      renderService(i);
    }

    function showOverlay() {
      nodes.playOverlay.style.opacity = '1';
      nodes.playOverlay.setAttribute('aria-hidden', 'false');
    }

    function hideOverlay() {
      nodes.playOverlay.style.opacity = '0';
      nodes.playOverlay.setAttribute('aria-hidden', 'true');
    }

    (function() {
      const btn = nodes.playOverlay;
      const v = el.video;
      if (!btn || !v) return;

      function updateIcon() {
        if (v.muted) nodes.playIcon.innerHTML = '<path d="M8 5v14l11-7z" fill="currentColor"/>';
        else if (v.paused) nodes.playIcon.innerHTML = '<path d="M8 5v14l11-7z" fill="currentColor"/>';
        else nodes.playIcon.innerHTML = '<path d="M6 5h4v14H6zM14 5h4v14h-4z" fill="currentColor"/>';
      }
      btn.addEventListener('click', async () => {
        if (v.muted) {
          v.muted = false;
          try {
            await v.play();
          } catch (_) {}
        } else {
          if (v.paused) v.play().catch(() => {});
          else v.pause();
        }
        updateIcon();
      });
      v.addEventListener('play', updateIcon);
      v.addEventListener('pause', updateIcon);
      v.addEventListener('volumechange', updateIcon);
    })();

    // init
    createDots();
    renderService(0);

    // nav wiring
    if (nodes.prevService) nodes.prevService.addEventListener('click', prev);
    if (nodes.nextService) nodes.nextService.addEventListener('click', next);
    if (nodes.prevServiceMobile) nodes.prevServiceMobile.addEventListener('click', prev);
    if (nodes.nextServiceMobile) nodes.nextServiceMobile.addEventListener('click', next);
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') prev();
      if (e.key === 'ArrowRight') next();
    });

    // hero video click opens modal
    nodes.serviceVideo.addEventListener('click', () => {
      const svc = services[current];
      openModal({
        type: 'video',
        title: svc.title + ' — Video Preview',
        src: svc.video,
        poster: svc.poster,
        theme: 'dark'
      });
    });

    // WA CTA opens light modal form
    // nodes.ctaWA.addEventListener('click', () => {
    //   openModal({
    //     type: 'waForm',
    //     title: 'Pesan via WhatsApp',
    //     theme: 'light'
    //   });
    //   setTimeout(() => {
    //     const sel = document.querySelector('#waForm select[name="service"]');
    //     if (sel) sel.value = services[current].title;
    //   }, 60);
    // });

    // // Partner CTA opens dark partnership form
    // nodes.ctaPartner.addEventListener('click', () => openModal({
    //   type: 'form',
    //   title: 'Ajukan Kemitraan',
    //   theme: 'dark'
    // }));

    // prevent background scroll when modal open
    const obs = new MutationObserver(() => {
      if (!nodes.modal.classList.contains('hidden')) document.documentElement.style.overflow = 'hidden';
      else document.documentElement.style.overflow = '';
    });
    obs.observe(nodes.modal, {
      attributes: true,
      attributeFilter: ['class']
    });

    // pause/resume video on visibility change
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) try {
        el.video.pause();
      } catch (_) {}
      else tryPlayVideo(el.video).then(ok => {
        if (!ok) showOverlay();
        else hideOverlay();
      });
    });
  </script>


  <!-- servicess -->
  <script>
    /* Pastikan variable `services` (array) sudah didefinisikan seperti contohmu sebelum script ini */
    (function() {
      if (typeof services === 'undefined' || !Array.isArray(services)) {
        console.warn('Variable `services` tidak ditemukan. Pastikan `services` didefinisikan sebelum script ini.');
        return;
      }

      const grid = document.getElementById('servicesGrid');

      // helper escape
      const esc = s => (s === null || s === undefined) ? '' : String(s);

      // create card from service object
      function createCard(svc) {
        const art = document.createElement('article');
        art.className = 'service-card relative rounded-2xl p-4 shadow-lg bg-white flex flex-col h-full';

        art.innerHTML = `
      <div class="card-body flex-1">
        <div class="w-full rounded-lg overflow-hidden mb-4 bg-slate-100">
          <img src="${esc(svc.poster||svc.thumbs?.[0]||'')}" alt="${esc(svc.title)}" class="w-full h-44 object-cover"/>
        </div>
        <h4 class="text-xl font-semibold">${esc(svc.title)}</h4>
        <p class="text-xs text-slate-500 mt-2">${esc(svc.subtitle||'')}</p>
        <p class="text-sm text-slate-600 mt-3">${esc(svc.caption||'')}</p>
      </div>

      <div class="card-actions mt-4 flex gap-2">
        <button data-service="${esc(svc.id)}" class="open-form inline-flex items-center justify-center h-10 px-4 rounded-lg bg-rose-500 text-white text-sm font-medium">Pesan</button>
        <!--<button data-service="${esc(svc.id)}" class="open-preview inline-flex items-center justify-center h-10 px-4 rounded-lg bg-white border border-slate-200 text-slate-700 text-sm">Preview</button> -->
      </div>
    `;
        return art;
      }

      // render all cards
      grid.innerHTML = '';
      services.forEach(svc => grid.appendChild(createCard(svc)));

      // ---------- Preview overlay elements ----------
      const overlay = document.getElementById('tw-servicePreviewOverlay');
      const previewImage = document.getElementById('tw-previewImage');
      const previewVideo = document.getElementById('tw-previewVideo');
      const playBtn = document.getElementById('tw-playVideoBtn');
      const thumbs = document.getElementById('tw-thumbs');
      const titleEl = document.getElementById('tw-previewTitle');
      const subtitleEl = document.getElementById('tw-previewSubtitle');
      const captionEl = document.getElementById('tw-previewCaption');
      const logoRow = document.getElementById('tw-logoRow');
      const previewClose = document.getElementById('tw-previewClose');
      const previewPesan = document.getElementById('tw-previewPesan');
      const previewGalleryFull = document.getElementById('tw-previewGalleryFull');

      let currentSvc = null;
      let currentMediaIndex = 0;

      // open preview for a service id
      function openPreview(serviceId) {
        const svc = services.find(s => s.id === serviceId);
        if (!svc) return;
        currentSvc = svc;
        currentMediaIndex = 0;

        // set title / subtitle / caption
        titleEl.textContent = svc.title || '';
        subtitleEl.textContent = svc.subtitle || '';
        captionEl.textContent = svc.caption || '';

        // logos
        logoRow.innerHTML = '';
        if (Array.isArray(svc.logos) && svc.logos.length) {
          svc.logos.forEach(l => {
            const img = document.createElement('img');
            img.src = l;
            img.alt = 'logo';
            img.className = 'h-8 object-contain opacity-90';
            logoRow.appendChild(img);
          });
        }

        // media: prefer poster image; if video available show poster + play
        if (svc.video) {
          // prepare video but keep hidden until play
          previewVideo.src = svc.video;
          previewVideo.poster = svc.poster || (svc.thumbs?.[0] || '');
          previewVideo.classList.add('hidden');
          previewVideo.pause();
          previewImage.src = svc.poster || svc.thumbs?.[0] || '';
          playBtn.classList.remove('hidden');
        } else {
          previewVideo.classList.add('hidden');
          previewImage.src = svc.poster || svc.thumbs?.[0] || '';
          playBtn.classList.add('hidden');
        }

        // thumbs: include poster + thumbs array
        thumbs.innerHTML = '';
        const mediaThumbs = [];
        if (svc.poster) mediaThumbs.push({
          type: 'img',
          src: svc.poster
        });
        if (Array.isArray(svc.thumbs)) svc.thumbs.forEach(t => mediaThumbs.push({
          type: 'img',
          src: t
        }));
        if (svc.video && svc.poster) mediaThumbs.unshift({
          type: 'video',
          src: svc.video
        }); // optional video thumb

        mediaThumbs.forEach((m, idx) => {
          const btn = document.createElement('button');
          btn.className = 'flex-shrink-0 w-20 h-12 overflow-hidden rounded-md bg-slate-100 border';
          btn.innerHTML = `<img src="${esc(m.src)}" class="w-full h-full object-cover" alt="thumb-${idx}">`;
          btn.addEventListener('click', () => {
            // show selected media
            if (m.type === 'video') {
              previewVideo.classList.remove('hidden');
              previewImage.classList.add('hidden');
              playBtn.classList.remove('hidden');
              previewVideo.pause();
            } else {
              previewVideo.classList.add('hidden');
              previewImage.classList.remove('hidden');
              previewImage.src = m.src;
              playBtn.classList.add('hidden');
            }
          });
          thumbs.appendChild(btn);
        });

        // show overlay
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
        document.body.style.overflow = 'hidden';
        previewClose.focus();
      }

      function closePreview() {
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');
        // stop video if playing
        if (!previewVideo.classList.contains('hidden')) {
          previewVideo.pause();
          previewVideo.currentTime = 0;
        }
        document.body.style.overflow = '';
      }

      // event delegation: open preview or open form (pesan)
      grid.addEventListener('click', (e) => {
        const pv = e.target.closest('.open-preview');
        if (pv) {
          const id = pv.dataset.service;
          openPreview(id);
          return;
        }
        const of = e.target.closest('.open-form');
        if (of) {
          const id = of.dataset.service;
          // call booking modal if exists
          if (window._booking && typeof window._booking.openModal === 'function') {
            window._booking.openModal(id);
          } else {
            // fallback: dispatch event so consumer can hook up
            window.dispatchEvent(new CustomEvent('service:open', {
              detail: {
                serviceId: id
              }
            }));
            alert('Open modal: ' + id + ' (handler not found)');
          }
        }
      });

      // overlay controls
      previewClose.addEventListener('click', closePreview);
      overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closePreview();
      });
      document.addEventListener('keydown', (e) => {
        if (!overlay.classList.contains('hidden') && e.key === 'Escape') closePreview();
      });

      // play video behavior
      playBtn.addEventListener('click', () => {
        if (currentSvc && currentSvc.video) {
          previewVideo.classList.remove('hidden');
          previewImage.classList.add('hidden');
          playBtn.classList.add('hidden');
          previewVideo.play();
        }
      });

      // preview Pesan button -> open booking modal
      previewPesan.addEventListener('click', () => {
        if (!currentSvc) return;
        const id = currentSvc.id;
        if (window._booking && typeof window._booking.openModal === 'function') {
          closePreview();
          window._booking.openModal(id);
        } else {
          window.dispatchEvent(new CustomEvent('service:open', {
            detail: {
              serviceId: id
            }
          }));
          alert('Open modal: ' + id + ' (handler not found)');
        }
      });

      // previewGalleryFull can be customized to open a full gallery modal or navigate to service detail page
      // previewGalleryFull.addEventListener('click', () => {
      //   // simple: open the first thumb in a new tab
      //   if (!currentSvc) return;
      //   const url = currentSvc.thumbs?.[0] || currentSvc.poster || currentSvc.video;
      //   if (url) window.open(url, '_blank');
      // });

      // expose for debug & integration
      window.SERVICES_RENDERED = services;

    })();
  </script>

</body>

</html>