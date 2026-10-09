/**
 * Twinnie Group - Central Services, Outlets & Pricing Catalog Data (v2.1)
 * Re-extracted comprehensively from Heyzine Official Catalog (catalog.pdf - 14 Pages)
 * Integrated with Twinnie Group Ecosystem & Social Profiles:
 * - Twinnie Care: https://www.instagram.com/twinnie_care/
 * - Allura Woman Spa: https://www.instagram.com/alluradailyspa/
 * - Nimpuna Terapi: https://www.instagram.com/nimpuna.hc/
 * - Biro Psikologi: https://www.instagram.com/psikolog_retno/
 * 
 * Features:
 * - 4 Core Multimedia Pillars with Videos, Posters, Thumbs & Partner Logos
 * - Strict Dual Pricing: Di Outlet vs Home Visit (Malang & Batu maks. 10km)
 * - Strict Branch / Outlet mappings
 * - Add-ons / Extras for each service
 * - Zero silent failure & reactive binding support
 */

const TWINNIE_PARTNERS = [
  { name: 'Twinnie Care', logo: 'assets/img/logo-twinnie.jpg', url: 'https://maps.app.goo.gl/ajVfA4pEG4XMduem8' },
  { name: 'Allura Woman Spa', logo: 'assets/img/logo-allura.jpg', url: 'https://maps.app.goo.gl/ajVfA4pEG4XMduem8' },
  { name: 'Nimpuna Terapi', logo: 'assets/img/logo-nimpuna.jpg', url: 'https://maps.app.goo.gl/ajVfA4pEG4XMduem8' },
  { name: 'Rumah Ameera', logo: 'assets/img/logo-rumah-ameera.jpg', url: 'https://maps.app.goo.gl/ajVfA4pEG4XMduem8' },
  { name: 'Biro Psikologi', logo: 'assets/img/logo-psikolog.jpg', url: 'https://maps.app.goo.gl/Uxt2RmpgcXxz429Y9' },
  { name: 'UK Family Care', logo: 'assets/img/logo-uk-family-care.png', url: 'https://maps.app.goo.gl/jLzjpVshDXAX8FUz9' },
  { name: 'SMK Taruna Bhakti', logo: 'assets/img/logo-stabha.png', url: 'https://maps.app.goo.gl/MinJcdb7MsSPSSNh9' },
  { name: 'Mufi Journey', logo: 'assets/img/logo-mufi.png', url: '' },
  { name: 'Universitas Kepanjen', logo: 'assets/img/logo_univ_kepanjen.webp', url: '' }
];

const OUTLETS = [
  {
    id: 'twinnie-malang',
    name: 'Outlet Twinnie Care (Ibu, Bayi & Anak)',
    address: 'Jl. Villa Bunga Sepatu No. B-3, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
    mapsUrl: 'https://maps.google.com/?q=Villa+Bunga+Sepatu+No.B-3+Malang',
    services: ['baby-spa', 'holistic']
  },
  {
    id: 'allura-malang',
    name: 'Outlet Allura Woman Spa (Khusus Wanita)',
    address: 'Jl. Kadaka No. 11, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
    mapsUrl: 'https://maps.google.com/?q=Jl.+Kadaka+No.11+Malang',
    services: ['woman-spa']
  },
  {
    id: 'nimpuna-malang',
    name: 'Outlet Nimpuna Terapi Holistik & Bekam Medik',
    address: 'Jl. Villa Bunga Sepatu No. B-3, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141',
    mapsUrl: 'https://maps.google.com/?q=Villa+Bunga+Sepatu+No.B-3+Malang',
    services: ['holistic']
  },
  {
    id: 'psikolog-malang',
    name: 'Biro Psikologi & Konseling Rumah Ameera',
    address: 'Jl. Sebuku No. 19, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65126',
    mapsUrl: 'https://maps.google.com/?q=Jl.+Sebuku+No.19+Malang',
    services: ['psikolog']
  }
];

const MULTIMEDIA_SERVICES = [
  {
    id: 'baby-spa',
    title: 'Twinnie Care (Ibu & Bayi)',
    subtitle: 'Perawatan lembut untuk bayi baru lahir, anak & relaksasi ibu.',
    caption: 'Perawatan personal, aman, dan penuh empati bersama Bidan Indah Maswari Agustin, Amd.Keb.',
    video: 'assets/videos/baby-2.mp4',
    poster: 'assets/img/baby.jpg',
    csNumber: '628972703833',
    instagram: 'https://www.instagram.com/twinnie_care/',
    allowedBranches: ['twinnie-malang'],
    thumbs: [
      'assets/img/baby.jpg',
      'assets/img/baby-1.jpg',
      'assets/img/baby-2.jpg',
      'assets/img/baby-3.jpg',
      'assets/img/baby-4.jpg',
      'assets/img/baby-5.jpg',
      
    ],
    partnerLogos: [
      { name: 'Twinnie Care', src: 'assets/img/logo-twinnie.jpg' },
      { name: 'Rumah Ameera', src: 'assets/img/logo-rumah-ameera.jpg' },
      { name: 'Univ Kepanjen', src: 'assets/img/logo_univ_kepanjen.webp' }
    ],
    packages: [
      {
        id: 'bm-0-12',
        name: 'Baby Massage (0 - 12 Bulan)',
        duration: '45 - 60 Menit',
        age: 'Usia 0 - 12 Bulan',
        desc: 'Bentuk stimulasi raba (taktil) dan gerak (kinestetik) untuk optimalisasi pertumbuhan motorik, sirkulasi, dan kualitas tidur si kecil.',
        priceOutlet: 50000,
        priceHomevisit: 64000,
        supportsHomevisit: true,
        img: 'assets/img/baby-.jpg'
      },
      {
        id: 'bm-12-24',
        name: 'Baby Massage (12 - 24 Bulan)',
        duration: '45 - 60 Menit',
        age: 'Usia 12 - 24 Bulan',
        desc: 'Pijat stimulasi taktil & relaksasi untuk meningkatkan nafsu makan, daya tahan tubuh, dan kenyamanan tidur balita.',
        priceOutlet: 60000,
        priceHomevisit: 74000,
        supportsHomevisit: true,
        img: 'assets/img/baby-2.jpg'
      },
      {
        id: 'km-2-4',
        name: 'Kids Massage (2 - 4 Tahun)',
        duration: '60 - 90 Menit',
        age: 'Usia 2 - 4 Tahun',
        desc: 'Pijat relaksasi tubuh anak untuk meredakan ketegangan otot setelah aktif bereksplorasi dan memperlancar sistem limfatik.',
        priceOutlet: 70000,
        priceHomevisit: 84000,
        supportsHomevisit: true,
        img: 'assets/img/baby-3.jpg'
      },
      {
        id: 'km-4-6',
        name: 'Kids Massage (4 - 6 Tahun)',
        duration: '60 - 90 Menit',
        age: 'Usia 4 - 6 Tahun',
        desc: 'Stimulasi raba dan gerak relaksasi untuk anak usia pra-sekolah guna menjaga kebugaran fisik dan konsentrasi belajar.',
        priceOutlet: 80000,
        priceHomevisit: 94000,
        supportsHomevisit: true,
        img: 'assets/img/baby-4.jpg'
      },
      {
        id: 'km-6-8',
        name: 'Kids Massage (6 - 8 Tahun)',
        duration: '60 - 90 Menit',
        age: 'Usia 6 - 8 Tahun',
        desc: 'Pijat relaksasi otot mendalam untuk anak usia sekolah setelah padat beraktivitas fisik, les, atau olahraga.',
        priceOutlet: 90000,
        priceHomevisit: 104000,
        supportsHomevisit: true,
        img: 'assets/img/baby-5.jpg'
      },
      {
        id: 'baby-spa-pkg',
        name: 'Baby Spa Lengkap (Gym + Swim + Bath + Massage)',
        duration: '60 - 90 Menit',
        age: 'Min. 5kg & Leher Kuat',
        desc: 'Perawatan komprehensif menggabungkan baby gym ball, berenang di whirlpool steril hangat, mandi air hangat, dan baby massage relaksasi.',
        priceOutlet: 120000,
        priceHomevisit: 140000,
        supportsHomevisit: true,
        notes: '*Harga di luar pergantian air kolam (opsi air baru +30K)',
        img: 'assets/img/baby.jpg'
      },
      {
        id: 'baby-swim-pkg',
        name: 'Baby Swim (Whirlpool Therapy)',
        duration: '30 Menit',
        age: 'Min. 5kg & Leher Kuat',
        desc: 'Terapi stimulasi air di fasilitas whirlpool higienis bersuhu hangat dilengkapi neckring berstandar internasional.',
        priceOutlet: 70000,
        priceHomevisit: 0,
        supportsHomevisit: false,
        notes: '*Hanya tersedia langsung di outlet Twinnie Care',
        img: 'assets/img/baby-5.jpg'
      },
      {
        id: 'cukur-rambut-pkg',
        name: 'Cukur Rambut Bayi (Vacuum Anti-Lecet)',
        duration: '5 - 10 Menit',
        age: 'Newborn, Baby & Kids',
        desc: 'Layanan cukur rambut higienis menggunakan Hair Clipper Vacuum khusus baby yang tidak menyebabkan iritasi kulit kepala dan sisa rambut terhisap rapi.',
        priceOutlet: 25000,
        priceHomevisit: 64000,
        supportsHomevisit: true,
        notes: '*Opsi mandi air hangat setelah cukur (additional bath +15K)',
        img: 'assets/img/baby-2.jpg'
      },
      {
        id: 'tindik-bayi-pkg',
        name: 'Tindik Telinga Bayi Steril',
        duration: '30 Menit',
        age: 'Newborn s/d 9 Bulan',
        desc: 'Layanan tindik telinga bayi perempuan oleh bidan berpengalaman menggunakan jarum steril sekali pakai dengan teknik higienis dan minim nyeri.',
        priceOutlet: 35000,
        priceHomevisit: 50000,
        supportsHomevisit: true,
        img: 'assets/img/baby-1.jpg'
      },
      {
        id: 'screening-pkg',
        name: 'Screening Tumbuh Kembang (Bidan/Dokter)',
        duration: '15 - 20 Menit',
        age: 'Newborn, Baby & Kids',
        desc: 'Pemantauan komprehensif tumbuh kembang motorik, sensorik, dan kognitif si kecil sesuai tonggak usianya oleh Bidan/Dokter.',
        priceOutlet: 50000,
        priceHomevisit: 65000,
        supportsHomevisit: true,
        img: 'assets/img/baby-3.jpg'
      },
      {
        id: 'wicara-pkg',
        name: 'Terapi Wicara Si Kecil (1x Pertemuan)',
        duration: '60 Menit',
        age: 'Baby, Toddler & Pra Sekolah',
        desc: 'Layanan terapi oleh terapis wicara profesional untuk membantu si kecil yang mengalami keterlambatan bicara (speech delay) dan pemahaman komunikasi.',
        priceOutlet: 150000,
        priceHomevisit: 164000,
        supportsHomevisit: true,
        img: 'assets/img/baby-4.jpg'
      },
      {
        id: 'bapil-massage-baby',
        name: 'Massage Batuk Pilek Baby (1 - 24 Bulan)',
        duration: '60 Menit',
        age: 'Bayi 1 - 24 Bulan',
        desc: 'Pijat khusus dengan essential oil herbal batuk pilek dipadukan pemaparan Sinar IR untuk melegakan saluran napas dan meringankan lendir.',
        priceOutlet: 85000,
        priceHomevisit: 99000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'bapil-massage-kids',
        name: 'Massage Batuk Pilek Kids (2 - 8 Tahun)',
        duration: '60 - 90 Menit',
        age: 'Kids 2 - 8 Tahun',
        desc: 'Pijat dada, punggung, dan titik refleks pernapasan dengan oil herbal hangat dan sinar IR untuk meringankan batuk pilek anak.',
        priceOutlet: 105000,
        priceHomevisit: 119000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'bapil-lengkap-baby-1x',
        name: 'Paket Terapi Bapil Baby 1x (Massage + Nebulizer + IR)',
        duration: '60 - 90 Menit',
        age: 'Bayi 1 Bulan - 2 Tahun',
        desc: 'Layanan 3-in-1: Massage Bapil herbal, nebulizer medis steril, dan pemanasan Sinar IR untuk mengencerkan lendir dahak agar mudah keluar.',
        priceOutlet: 120000,
        priceHomevisit: 134000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'bapil-lengkap-baby-3x',
        name: 'Paket Terapi Bapil Baby 3x Terapi (Intensif)',
        duration: '3 Sesi x 60 - 90 Menit',
        age: 'Bayi 1 Bulan - 2 Tahun',
        desc: 'Paket terapi batuk pilek intensif 3 kali pertemuan (Massage + Nebulizer + Sinar IR) hingga tuntas pulih maksimal.',
        priceOutlet: 345000,
        priceHomevisit: 387000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'bapil-lengkap-kids-1x',
        name: 'Paket Terapi Bapil Kids 1x (Massage + Nebulizer + IR)',
        duration: '70 - 90 Menit',
        age: 'Kids 2 - 8 Tahun',
        desc: 'Layanan terapi bapil terpadu anak: Massage pelega napas, nebulizer medis, dan Sinar IR pengencer dahak membandel.',
        priceOutlet: 150000,
        priceHomevisit: 164000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'bapil-lengkap-kids-3x',
        name: 'Paket Terapi Bapil Kids 3x Terapi (Intensif)',
        duration: '3 Sesi x 70 - 90 Menit',
        age: 'Kids 2 - 8 Tahun',
        desc: 'Program intensif 3 sesi pemulihan batuk pilek anak (Massage + Nebulizer + IR) oleh bidan terapis.',
        priceOutlet: 435000,
        priceHomevisit: 477000,
        supportsHomevisit: true,
        img: 'assets/img/testi-bapil.jpg'
      },
      {
        id: 'nb-paket-1',
        name: 'Paket Newborn Care 1 (3x Kunjungan Homevisit)',
        duration: '3x Kunjungan (@60 Menit)',
        age: 'Bayi Baru Lahir (0 - 30 Hari)',
        desc: 'Pendampingan ke rumah: Memandikan bayi 1x/hari, menjemur bayi, perawatan tali pusat steril, oral care & potong kuku, serta 1x Massage Newborn.',
        priceOutlet: 199000,
        priceHomevisit: 199000,
        supportsHomevisit: true,
        notes: '*Layanan homevisit (biaya transport disesuaikan jarak)',
        img: 'assets/img/baby-1.jpg'
      },
      {
        id: 'nb-paket-2',
        name: 'Paket Newborn Care 2 (5x Kunjungan Homevisit)',
        duration: '5x Kunjungan (@60 Menit)',
        age: 'Bayi Baru Lahir (0 - 30 Hari)',
        desc: 'Perawatan newborn pascasalin: Mandikan bayi, jemur pagi, tali pusat higienis, oral care & kuku, serta 2x Massage Newborn oleh bidan.',
        priceOutlet: 349000,
        priceHomevisit: 349000,
        supportsHomevisit: true,
        notes: '*Layanan homevisit (biaya transport disesuaikan jarak)',
        img: 'assets/img/baby-2.jpg'
      },
      {
        id: 'nb-paket-3',
        name: 'Paket Newborn Care 3 (7x Kunjungan Homevisit)',
        duration: '7x Kunjungan (@60 Menit)',
        age: 'Bayi Baru Lahir (0 - 30 Hari)',
        desc: 'Perawatan komprehensif 1 minggu: Mandi harian, jemur pagi, tali pusat, oral care & kuku, serta 3x Massage Newborn oleh bidan.',
        priceOutlet: 499000,
        priceHomevisit: 499000,
        supportsHomevisit: true,
        notes: '*Layanan homevisit (biaya transport disesuaikan jarak)',
        img: 'assets/img/baby-3.jpg'
      },
      {
        id: 'selapanan-pkg',
        name: 'Paket Selapanan 35 Hari (Homevisit Ibu & Bayi)',
        duration: '90 - 120 Menit',
        age: 'Bayi 35 Hari & Ibu',
        desc: 'Tradisi selapanan lengkap dan higienis ke rumah: Baby Massage, Cukur Rambut Baby Vacuum, oral care & kuku, serta Massage Laktasi Ibu pelancar ASI.',
        priceOutlet: 219000,
        priceHomevisit: 219000,
        supportsHomevisit: true,
        notes: '*Sudah INCLUDE biaya transport Kota/Kab. Malang & Kota Batu!',
        img: 'assets/img/baby-2.jpg'
      },
      {
        id: 'pijat-asi-lancar',
        name: 'Pijat ASI Lancar & Stimulasi Oksitosin (Twinnie Mom)',
        duration: '90 Menit',
        age: 'Ibu Menyusui & Pascasalin',
        desc: 'Terdiri dari pijat payudara lembut oleh bidan laktasi, pijat oksitosin di punggung, relaksasi bahu-leher, dan pemaparan Sinar IR untuk melancarkan produksi ASI.',
        priceOutlet: 130000,
        priceHomevisit: 145000,
        supportsHomevisit: true,
        notes: '*Dapat dikunjungi di Outlet Twinnie Care atau panggil ke rumah (Home Visit)',
        img: 'assets/img/testi-laktasi.jpg'
      },
      {
        id: 'pijat-bendungan-asi',
        name: 'Pijat Bendungan ASI (Drainase Payudara Keras)',
        duration: '90 - 120 Menit',
        age: 'Ibu Menyusui dengan ASI Tersumbat',
        desc: 'Teknik manual terarah bidan laktasi Twinnie untuk mengurai keluhan sumbatan saluran susu, mengendurkan payudara bengkak, dan memulihkan aliran ASI.',
        priceOutlet: 170000,
        priceHomevisit: 185000,
        supportsHomevisit: true,
        notes: '*Dapat dikunjungi di Outlet Twinnie Care atau panggil ke rumah (Home Visit)',
        img: 'assets/img/woman-hair.jpg'
      },
      {
        id: 'relaksasi-full-body',
        name: 'Pijat Relaksasi Full Body Ibu Pascasalin',
        duration: '60 Menit',
        age: 'Ibu Pascasalin / Wanita Dewasa',
        desc: 'Layanan massage seluruh tubuh dari ujung kepala hingga kaki untuk meredakan ketegangan otot leher-punggung dan memulihkan kesegaran tubuh ibu.',
        priceOutlet: 135000,
        priceHomevisit: 150000,
        supportsHomevisit: true,
        notes: '*Dapat dikunjungi di Outlet Twinnie Care atau panggil ke rumah (Home Visit)',
        img: 'assets/img/woman-hair.jpg'
      },
      {
        id: 'relaksasi-aroma',
        name: 'Pijat Relaksasi Aromaterapi Full Body Ibu',
        duration: '90 Menit',
        age: 'Ibu / Wanita Dewasa',
        desc: 'Perawatan tubuh menyeluruh dengan paduan minyak esensial aromaterapi alami, relaksasi kepala & bahu untuk meredakan stres dan kepenatan ibu.',
        priceOutlet: 165000,
        priceHomevisit: 180000,
        supportsHomevisit: true,
        notes: '*Dapat dikunjungi di Outlet Twinnie Care atau panggil ke rumah (Home Visit)',
        img: 'assets/img/woman-hair.jpg'
      }
    ],
    extras: [
      { id: 'extra-air-baru', name: 'Pergantian Air Kolam Khusus Baru (Spa/Swim)', price: 30000 },
      { id: 'extra-cuci-hidung', name: 'Cuci Hidung Medis Steril (Bapil)', price: 35000 },
      { id: 'extra-masker-nebul', name: 'Masker Nebulizer Baru Disposable', price: 30000 },
      { id: 'extra-add-bath', name: 'Additional Bath (Mandi Air Hangat)', price: 15000 },
      { id: 'extra-durasi-30', name: 'Tambah Durasi Pijat Relaksasi (+30 Menit)', price: 30000 },
      { id: 'extra-aromaterapi', name: 'Minyak Esensial Aromaterapi Alami Premium', price: 35000 }
    ]
  },
  {
    id: 'woman-spa',
    title: 'Allura Woman Spa',
    subtitle: 'Spa eksklusif wanita — Visit outlet & chat langsung.',
    caption: 'Layanan relaksasi spa khusus wanita langsung di outlet Jl. Kadaka No.11 Malang. Hubungi kami via WhatsApp untuk reservasi.',
    video: 'assets/videos/woman.mp4',
    poster: 'assets/img/woman-hair.jpg',
    csNumber: '628972703833',
    instagram: 'https://www.instagram.com/alluradailyspa/',
    allowedBranches: ['allura-malang'],
    thumbs: [
      'assets/img/woman-hair.jpg',
      'assets/img/woman-massage-1.jpg',
      'assets/img/woman-massage.jpg',
      'assets/img/woman-allura.jpg'
    ],
    partnerLogos: [
      { name: 'Allura Woman Spa', src: 'assets/img/logo-allura.jpg' },
      { name: 'Twinnie Care', src: 'assets/img/logo-twinnie.jpg' }
    ],
    packages: [
      {
        id: 'allura-visit-outlet',
        name: 'Visit Outlet & Langsung Chat WhatsApp',
        duration: 'Fleksibel / Sesuai Perawatan',
        age: 'Khusus Wanita',
        desc: 'Kunjungan langsung ke Outlet Allura Daily Spa (Jl. Kadaka No.11, Jatimulyo, Lowokwaru, Malang). Nikmati perawatan spa wanita yang privat, nyaman, dan higienis. Silakan klik tombol di bawah untuk langsung terhubung dengan CS via WhatsApp.',
        priceOutlet: 0,
        priceHomevisit: 0,
        supportsHomevisit: false,
        notes: '*Layanan khusus visit di outlet Allura Daily Spa (tidak melayani Home Visit). Reservasi via Chat WhatsApp.',
        img: 'assets/img/woman-hair.jpg'
      }
    ],
    extras: []
  },
  {
    id: 'holistic',
    title: 'Terapi Holistik Medis Nimpuna',
    subtitle: 'Program terapi untuk kondisi medis, saraf & otot.',
    caption: 'Pendekatan kolaboratif akupresur & bekam medis steril dengan tenaga kompeten.',
    video: 'assets/videos/bekam.mp4',
    poster: 'assets/img/bekam.jpg',
    csNumber: '62895327268977',
    instagram: 'https://www.instagram.com/nimpuna.hc/',
    allowedBranches: ['nimpuna-malang'],
    thumbs: [
      'assets/img/bekam.jpg',
      'assets/img/tcm.webp',
      'assets/img/tongue.webp'
    ],
    partnerLogos: [
      { name: 'Nimpuna', src: 'assets/img/logo-nimpuna.jpg' },
      { name: 'UK Family Care', src: 'assets/img/logo-uk-family-care.png' },
      { name: 'STABHA', src: 'assets/img/logo-stabha.png' }
    ],
    packages: [
      {
        id: 'terapi-60',
        name: 'Terapi Holistik Otot & Akupresur (60 Menit)',
        duration: '60 Menit',
        age: 'Dewasa & Lansia',
        desc: 'Penyelarasan otot, terapi titik akupresur dan manipulasi lembut untuk meredakan ketegangan leher, punggung, migrain, dan pegal berat.',
        priceOutlet: 120000,
        priceHomevisit: 120000,
        supportsHomevisit: true,
        notes: '*Biaya transport homevisit Rp 25.000 - Rp 50.000 sesuai jarak',
        img: 'assets/img/bekam.jpg'
      },
      {
        id: 'terapi-bekam',
        name: 'Terapi Bekam Medik Steril & Diagnosa Lidah (60 Menit)',
        duration: '60 Menit',
        age: 'Dewasa & Lansia',
        desc: 'Pemeriksaan pola organ tubuh lewat diagnosa lidah TCM dilanjutkan terapi bekam medik basah/kering steril jarum sekali pakai.',
        priceOutlet: 100000,
        priceHomevisit: 100000,
        supportsHomevisit: true,
        notes: '*Biaya transport homevisit disesuaikan jarak',
        img: 'assets/img/tongue.webp'
      },
      {
        id: 'terapi-90',
        name: 'Terapi Holistik Medis Intensif (90 Menit)',
        duration: '90 Menit',
        age: 'Dewasa & Lansia',
        desc: 'Kombinasi komprehensif pemanasan termal, stimulasi saraf, bekam medik steril, dan traksi lembut penataan postur.',
        priceOutlet: 150000,
        priceHomevisit: 150000,
        supportsHomevisit: true,
        notes: '*Biaya transport homevisit disesuaikan jarak',
        img: 'assets/img/tcm.webp'
      },
      {
        id: 'terapi-120',
        name: 'Terapi Khusus Skoliosis / Saraf Kejepit (120 Menit)',
        duration: '120 Menit',
        age: 'Dewasa & Lansia',
        desc: 'Program penanganan terpadu untuk keluhan saraf kejepit (HNP), deviasi skoliosis, pemulihan pascastroke ringan, dan Bells Palsy.',
        priceOutlet: 200000,
        priceHomevisit: 200000,
        supportsHomevisit: true,
        notes: '*Biaya transport homevisit disesuaikan jarak',
        img: 'assets/img/tongue.webp'
      }
    ],
    extras: [
      { id: 'extra-cek-darah', name: 'Cek Darah Lengkap Cepat (Gula, Asam Urat, Kolesterol)', price: 50000 },
      { id: 'extra-minyak-herbal', name: 'Minyak Herbal Medis Khusus Saraf & Sendi', price: 25000 }
    ]
  },
  {
    id: 'psikolog',
    title: 'Konsultasi & Terapi bersama Psikolog',
    subtitle: 'Pendampingan kondisi mental ibu pascasalin & keluarga.',
    caption: 'Pendekatan kolaboratif bersama Retno Sri Handayani, M.Pd., M.Psi.',
    video: 'assets/videos/psikolog1.mp4',
    poster: 'assets/img/psikolog2.jpg',
    csNumber: '6281333430080',
    instagram: 'https://www.instagram.com/psikolog_retno/',
    allowedBranches: ['psikolog-malang'],
    thumbs: [
      'assets/img/psikolog.jpg',
      'assets/img/psikolog2.jpg'
    ],
    partnerLogos: [
      { name: 'Biro Psikolog', src: 'assets/img/logo-psikolog.jpg' },
      { name: 'Rumah Ameera', src: 'assets/img/logo-rumah-ameera.jpg' }
    ],
    packages: [
      {
        id: 'konseling-psi',
        name: 'Konseling Psikologi Keluarga & Pascasalin (60 Menit)',
        duration: '60 Menit (Fleksibel)',
        age: 'Ibu, Pasangan, Remaja, Individu',
        desc: 'Ruang konseling aman bersama Retno Sri Handayani, M.Psi untuk mengurai beban stres pascasalin (baby blues), kecemasan, atau relasi keluarga.',
        priceOutlet: 150000,
        priceHomevisit: 175000,
        supportsHomevisit: true,
        img: 'assets/img/psikolog.jpg'
      },
      {
        id: 'psikoterapi-klinis',
        name: 'Sesi Psikoterapi Klinis Terarah (90 Menit)',
        duration: '90 Menit (Fleksibel)',
        age: 'Individu dengan Trauma / Postpartum Depression',
        desc: 'Pendekatan terapi psikologis klinis terstruktur untuk pemulihan kecemasan berlebih (anxiety), depresi pascamelahirkan, dan regulasi emosi mendalam.',
        priceOutlet: 200000,
        priceHomevisit: 225000,
        supportsHomevisit: true,
        img: 'assets/img/psikolog2.jpg'
      },
      {
        id: 'hipnoterapi-psi',
        name: 'Hipnoterapi Klinis Bersertifikasi (90 - 120 Menit)',
        duration: '90 - 120 Menit',
        age: 'Dewasa & Remaja',
        desc: 'Relaksasi gelombang otak bawah sadar terpandu untuk mengatasi trauma emosional, insomnia akut, kecemasan berulang, dan psikosomatis.',
        priceOutlet: 250000,
        priceHomevisit: 275000,
        supportsHomevisit: true,
        img: 'assets/img/psikolog.jpg'
      },
      {
        id: 'mhcu-awal',
        name: 'Mental Health Check-Up (MHCU) Awal + Sesi Konseling',
        duration: '75 Menit',
        age: 'Calon Orang Tua, Ibu Hamil, Individu',
        desc: 'Pemeriksaan profil kesehatan mental menggunakan instrumen psikometrik ilmiah dipadukan sesi interpretasi & konsultasi solutif tatap muka.',
        priceOutlet: 250000,
        priceHomevisit: 275000,
        supportsHomevisit: true,
        img: 'assets/img/psikolog2.jpg'
      },
      {
        id: 'mhcu-lengkap',
        name: 'Mental Health Check-Up (MHCU) Lengkap + Laporan Resmi',
        duration: '90 - 120 Menit',
        age: 'Individu, Mahasiswa, Profesional',
        desc: 'Pemeriksaan psikologis komprehensif (profil kepribadian, daya tahan stres, kestabilan emosi) disertai laporan interpretasi tertulis formal bertanda tangan psikolog.',
        priceOutlet: 400000,
        priceHomevisit: 425000,
        supportsHomevisit: true,
        img: 'assets/img/psikolog.jpg'
      }
    ],
    extras: [
      { id: 'extra-sesi-followup', name: 'Sesi Evaluasi & Monitoring 30 Menit Pasca-Konseling', price: 75000 }
    ]
  }
];

// Helper: Format Rupiah
function formatRupiah(number) {
  if (isNaN(number)) return 'Rp 0';
  return 'Rp ' + Number(number).toLocaleString('id-ID');
}

// Convert Array to Key-Value Map for fast lookup
const SERVICES_MAP = {};
MULTIMEDIA_SERVICES.forEach(s => {
  SERVICES_MAP[s.id] = s;
});

// Window Exports
window.TWINNIE_PARTNERS = TWINNIE_PARTNERS;
window.TWINNIE_OUTLETS = OUTLETS;
window.MULTIMEDIA_SERVICES = MULTIMEDIA_SERVICES;
window.TWINNIE_SERVICES = SERVICES_MAP;
window.formatRupiah = formatRupiah;
