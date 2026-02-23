/**
 * Twinnie Group - Partnership & Investment Module
 * WhatsApp Application to +62 895-327-268977 | Investment Simulator | Sukuk Method
 */

(function () {
  'use strict';

  const PARTNER_WA = '62895327268977';

  const TIERS = {
    silver: {
      name: 'Kemitraan Murni Silver',
      amount: 20000000,
      amountLabel: 'Rp 20 Juta',
      profitShare: '2,5% dari Keuntungan Bersih',
      tenor: '1 Tahun (Bisa Diperpanjang)',
      sdm: '1 Tim Marketing Digital + 2 Terapis Bersertifikasi',
      dividendPayout: 'Tahunan (Per 12 Bulan)',
      shariaContract: 'Sukuk Musyarakah / Mudharabah Murni',
      riskProtection: 'Pencatatan Notaris & Audit Laporan Keuangan Berkala'
    },
    gold: {
      name: 'Kemitraan Murni Gold',
      amount: 50000000,
      amountLabel: 'Rp 50 Juta',
      profitShare: '5% dari Keuntungan Bersih',
      tenor: '2 Tahun Penuh',
      sdm: '1 Tim Marketing Digital + 4 Terapis Bersertifikasi',
      dividendPayout: 'Per Semester / Tahunan',
      shariaContract: 'Sukuk Musyarakah / Mudharabah Murni',
      riskProtection: 'Jaminan Transparansi Operasional & Klausul Proteksi Aset'
    },
    platinum: {
      name: 'Kemitraan Murni Platinum (Outlet Expansion)',
      amount: 150000000,
      amountLabel: 'Rp 150 Juta',
      profitShare: '10% dari Keuntungan Bersih',
      tenor: '3 Tahun Penuh',
      sdm: '1 Tim Marketing + 4 Terapis Bersertifikasi + Dukungan Fisik Outlet',
      dividendPayout: 'Dibagikan SETIAP BULAN (Per 30 Hari)',
      shariaContract: 'Sukuk Syariah Terproteksi',
      riskProtection: 'Klausul Proteksi Likuidasi: Pengembalian nilai aset jika kondisi pailit/force majeure tertentu'
    },
    distributor: {
      name: 'Kemitraan Distributor / Outlet Mandiri',
      amount: 0,
      amountLabel: 'Custom Sesuai Lokasi',
      profitShare: '100% Hak Laba Outlet Mandiri',
      tenor: 'Kemitraan Berkelanjutan',
      sdm: 'Pelatihan SDM & SOP Standar Twinnie Group Pusat',
      dividendPayout: 'Arus Kas Harian Mandiri',
      shariaContract: 'Lisensi Lisensi Waralaba / Kemitraan Syariah',
      riskProtection: 'Isolasi Keuangan: Kas & pembukuan outlet terisolasi penuh dari risiko entitas luar'
    }
  };

  /**
   * Send WhatsApp message for partnership application
   */
  function applyPartnership(tierKey = 'silver', customData = {}) {
    const tier = TIERS[tierKey] || TIERS.silver;
    const name = customData.name || '';
    const phone = customData.phone || '';
    const city = customData.city || '';
    const notes = customData.notes || '';

    let text = `*FORMULIR PENGAJUAN KEMITRAAN & INVESTASI TWINNIE GROUP*
--------------------------------------------------
Halo Tim Eksekutif Twinnie Group,
Saya berminat untuk menjalin kemitraan investasi dengan detail berikut:

💼 *Skema Paket:* ${tier.name}
💰 *Nilai Investasi:* ${tier.amountLabel}
📈 *Bagi Hasil:* ${tier.profitShare}
⏳ *Durasi Kontrak:* ${tier.tenor}
👥 *Fasilitas SDM:* ${tier.sdm}
🕌 *Metode Syariah:* ${tier.shariaContract}
🛡 *Proteksi Risiko:* ${tier.riskProtection}

--------------------------------------------------
👤 *DATA CALON MITRA INVESTOR:*
- *Nama Lengkap:* ${name || '[Isi Nama Anda]'}
- *No. WhatsApp / HP:* ${phone || '[Isi No HP Anda]'}
- *Kota Domisili:* ${city || '[Isi Kota Anda]'}
- *Catatan / Pertanyaan:* "${notes || 'Mohon kirimkan prospectus & jadwal presentasi proposal kemitraan.'}"
--------------------------------------------------
Terima kasih, mohon informasi tindak lanjut dan pertemuan konsultasi resmi.`;

    const waUrl = `https://wa.me/${PARTNER_WA}?text=${encodeURIComponent(text)}`;
    window.open(waUrl, '_blank', 'noopener,noreferrer');
  }

  function init() {
    // Interactive Tier Buttons in Page
    document.querySelectorAll('[data-partner-tier]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const tier = btn.dataset.partnerTier;
        applyPartnership(tier);
      });
    });

    // Partner Contact Form Modal or In-page Form if exists
    const partnerForm = document.getElementById('partnershipApplicationForm');
    if (partnerForm) {
      partnerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const fd = new FormData(partnerForm);
        const tier = fd.get('tier') || 'platinum';
        applyPartnership(tier, {
          name: fd.get('name'),
          phone: fd.get('phone'),
          city: fd.get('city'),
          notes: fd.get('notes')
        });
      });
    }

    // Global helper
    window.applyPartnership = applyPartnership;
    window.TWINNIE_TIERS = TIERS;
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
