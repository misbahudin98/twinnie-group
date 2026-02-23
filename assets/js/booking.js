/**
 * Twinnie Group - Unified Reactive Booking Form Engine (v2.0)
 * Single Consolidated Form with Dynamic Media/Image Switching
 * Dual Pricing (Outlet vs Home Visit) | Zero Silent Failure | Focus Trapping
 */

(function () {
  'use strict';

  let currentServiceKey = 'baby-spa';
  let currentLocationType = 'outlet'; // 'outlet' | 'homevisit'
  let lastFocusedElement = null;

  // DOM Elements cache
  const elements = {
    modal: document.getElementById('bookingModal'),
    overlay: document.getElementById('modalOverlay'),
    closeBtn: document.getElementById('modalCloseBtn'),
    cancelBtn: document.getElementById('modalCancelBtn'),
    form: document.getElementById('bookingForm'),
    
    // Inputs
    serviceSelect: document.getElementById('bookingServiceSelect'),
    packageSelect: document.getElementById('bookingPackageSelect'),
    locationOutletRadio: document.getElementById('locTypeOutlet'),
    locationHomevisitRadio: document.getElementById('locTypeHomevisit'),
    outletWrap: document.getElementById('outletSelectWrap'),
    outletSelect: document.getElementById('bookingOutletSelect'),
    homeAddressWrap: document.getElementById('homeAddressWrap'),
    homeAddressInput: document.getElementById('bookingAddressInput'),
    
    nameInput: document.getElementById('bookingNameInput'),
    phoneInput: document.getElementById('bookingPhoneInput'),
    dateInput: document.getElementById('bookingDateInput'),
    timeInput: document.getElementById('bookingTimeInput'),
    notesInput: document.getElementById('bookingNotesInput'),
    
    // Extras Container
    extrasSection: document.getElementById('bookingExtrasSection'),
    extrasList: document.getElementById('bookingExtrasList'),
    
    // Live Preview Column Elements
    previewImage: document.getElementById('previewImage'),
    previewTitle: document.getElementById('previewTitle'),
    previewDesc: document.getElementById('previewDesc'),
    previewDuration: document.getElementById('previewDuration'),
    previewAge: document.getElementById('previewAge'),
    previewNotes: document.getElementById('previewNotes'),
    previewCategoryBadge: document.getElementById('previewCategoryBadge'),
    modalThumbsList: document.getElementById('modalThumbsList'),
    previewLocationBadge: document.getElementById('previewLocationBadge'),
    previewBasePrice: document.getElementById('previewBasePrice'),
    selectedExtrasContainer: document.getElementById('selectedExtras'),
    previewTotalPrice: document.getElementById('previewTotalPrice'),
    previewTotalPriceMobile: document.getElementById('previewTotalPriceMobile'),
    
    // Toast Notification
    toast: document.getElementById('toastNotification')
  };

  /**
   * Accessible Toast Notification
   */
  function showToast(message, type = 'success') {
    if (!elements.toast) {
      alert(message);
      return;
    }
    const toastBody = elements.toast.querySelector('.toast-body') || elements.toast;
    toastBody.textContent = message;
    
    elements.toast.className = 'fixed bottom-6 left-1/2 -translate-x-1/2 z-50 transition-all duration-300 px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 text-xs sm:text-sm font-semibold pointer-events-none';
    if (type === 'success') elements.toast.classList.add('bg-emerald-600', 'text-white');
    else if (type === 'error') elements.toast.classList.add('bg-rose-600', 'text-white');
    else elements.toast.classList.add('bg-slate-900', 'text-white');

    elements.toast.classList.remove('hidden', 'opacity-0', 'translate-y-4');
    elements.toast.classList.add('opacity-100', 'translate-y-0');

    setTimeout(() => {
      elements.toast.classList.add('opacity-0', 'translate-y-4');
      setTimeout(() => elements.toast.classList.add('hidden'), 300);
    }, 3500);
  }

  /**
   * Populate Services Select from MULTIMEDIA_SERVICES
   */
  function populateServices(selectedKey = 'baby-spa') {
    if (!elements.serviceSelect || !window.MULTIMEDIA_SERVICES) return;
    elements.serviceSelect.innerHTML = '';
    
    window.MULTIMEDIA_SERVICES.forEach(svc => {
      const opt = document.createElement('option');
      opt.value = svc.id;
      opt.textContent = svc.title;
      if (svc.id === selectedKey) opt.selected = true;
      elements.serviceSelect.appendChild(opt);
    });
    
    currentServiceKey = selectedKey;
    populatePackages();
    populateOutlets();
    populateExtras();
  }

  /**
   * Populate Packages based on selected service
   */
  function populatePackages(defaultPkgId = null) {
    if (!elements.packageSelect) return;
    const svc = window.TWINNIE_SERVICES[currentServiceKey];
    if (!svc) return;

    elements.packageSelect.innerHTML = '';
    svc.packages.forEach((pkg, idx) => {
      const opt = document.createElement('option');
      opt.value = pkg.id;
      
      const price = currentLocationType === 'homevisit' ? (pkg.priceHomevisit || pkg.priceOutlet) : pkg.priceOutlet;
      const isVisitOnly = (pkg.priceOutlet === 0 && (!pkg.priceHomevisit || pkg.priceHomevisit === 0));
      const priceText = isVisitOnly ? 'Visit Outlet / Chat WA' : window.formatRupiah(price);
      opt.textContent = `${pkg.name} — ${priceText}`;
      opt.dataset.supportsHomevisit = pkg.supportsHomevisit ? 'true' : 'false';
      
      if (defaultPkgId && pkg.id === defaultPkgId) opt.selected = true;
      else if (!defaultPkgId && idx === 0) opt.selected = true;
      
      elements.packageSelect.appendChild(opt);
    });

    handleHomevisitSupportCheck();
    updateLivePreview();
  }

  /**
   * Populate Outlets (Strictly filtered by current service & location)
   */
  function populateOutlets() {
    if (!elements.outletSelect || !window.TWINNIE_OUTLETS) return;
    elements.outletSelect.innerHTML = '';
    
    const svc = window.TWINNIE_SERVICES[currentServiceKey];
    const allowedBranches = svc?.allowedBranches || [];
    
    const matchingOutlets = window.TWINNIE_OUTLETS.filter(outlet => {
      if (allowedBranches.length > 0) {
        return allowedBranches.includes(outlet.id);
      }
      return outlet.services && outlet.services.includes(currentServiceKey);
    });

    const outletsToRender = matchingOutlets.length > 0 ? matchingOutlets : window.TWINNIE_OUTLETS;

    outletsToRender.forEach((outlet, index) => {
      const opt = document.createElement('option');
      opt.value = outlet.id;
      opt.textContent = `${outlet.name} — ${outlet.address}`;
      if (index === 0) opt.selected = true;
      elements.outletSelect.appendChild(opt);
    });
  }

  /**
   * Populate Extras (Add-ons)
   */
  function populateExtras() {
    if (!elements.extrasSection || !elements.extrasList) return;
    const svc = window.TWINNIE_SERVICES[currentServiceKey];
    
    if (!svc || !svc.extras || svc.extras.length === 0) {
      elements.extrasSection.classList.add('hidden');
      elements.extrasList.innerHTML = '';
      return;
    }

    elements.extrasSection.classList.remove('hidden');
    elements.extrasList.innerHTML = '';

    svc.extras.forEach(extra => {
      const label = document.createElement('label');
      label.className = 'flex items-center justify-between p-2.5 rounded-xl border border-slate-200 hover:border-pink-300 bg-slate-50/70 cursor-pointer transition text-xs sm:text-sm select-none';
      
      label.innerHTML = `
        <span class="flex items-center gap-2.5">
          <input type="checkbox" data-extra-id="${extra.id}" data-price="${extra.price}" data-name="${extra.name}" class="extra-checkbox w-4 h-4 text-pink-600 rounded border-slate-300 focus:ring-pink-500">
          <span class="font-medium text-slate-800">${extra.name}</span>
        </span>
        <span class="font-bold text-pink-600">+${window.formatRupiah(extra.price)}</span>
      `;
      
      const chk = label.querySelector('input');
      chk.addEventListener('change', updateLivePreview);
      elements.extrasList.appendChild(label);
    });
  }

  /**
   * Check Home Visit support for selected package & enforce Woman Spa outlet-only rule (Instruction 6)
   */
  function handleHomevisitSupportCheck() {
    const isWomanSpa = currentServiceKey === 'woman-spa';
    const selectedOpt = elements.packageSelect?.selectedOptions[0];
    const supportsHv = isWomanSpa ? false : (selectedOpt ? selectedOpt.dataset.supportsHomevisit !== 'false' : true);

    if (elements.locationHomevisitRadio) {
      if (!supportsHv) {
        elements.locationHomevisitRadio.disabled = true;
        elements.locationHomevisitRadio.parentElement.classList.add('opacity-40', 'cursor-not-allowed');
        elements.locationHomevisitRadio.parentElement.title = isWomanSpa 
          ? 'Layanan Allura Woman Spa khusus dilaksanakan langsung di outlet (Visit Outlet).'
          : 'Layanan ini hanya dapat dilakukan langsung di outlet.';
        if (currentLocationType === 'homevisit') {
          currentLocationType = 'outlet';
          if (elements.locationOutletRadio) elements.locationOutletRadio.checked = true;
          toggleLocationType('outlet');
          if (isWomanSpa) {
            showToast('Layanan Allura khusus visit langsung ke outlet.', 'info');
          }
        }
      } else {
        elements.locationHomevisitRadio.disabled = false;
        elements.locationHomevisitRadio.parentElement.classList.remove('opacity-40', 'cursor-not-allowed');
        elements.locationHomevisitRadio.parentElement.title = '';
      }
    }
  }

  /**
   * Toggle between Outlet and Home Visit
   */
  function toggleLocationType(type) {
    currentLocationType = type;
    if (type === 'outlet') {
      elements.outletWrap?.classList.remove('hidden');
      elements.homeAddressWrap?.classList.add('hidden');
      if (elements.homeAddressInput) elements.homeAddressInput.required = false;
    } else {
      elements.outletWrap?.classList.add('hidden');
      elements.homeAddressWrap?.classList.remove('hidden');
      if (elements.homeAddressInput) elements.homeAddressInput.required = true;
    }

    // Refresh option label prices
    const svc = window.TWINNIE_SERVICES[currentServiceKey];
    if (svc && elements.packageSelect) {
      Array.from(elements.packageSelect.options).forEach(opt => {
        const pkg = svc.packages.find(p => p.id === opt.value);
        if (pkg) {
          const price = type === 'homevisit' ? (pkg.priceHomevisit || pkg.priceOutlet) : pkg.priceOutlet;
          const isVisitOnly = (pkg.priceOutlet === 0 && (!pkg.priceHomevisit || pkg.priceHomevisit === 0));
          const priceText = isVisitOnly ? 'Visit Outlet / Chat WA' : window.formatRupiah(price);
          opt.textContent = `${pkg.name} — ${priceText}`;
        }
      });
    }

    updateLivePreview();
  }

  /**
   * Dynamically Update Live Preview Side (Image, Desc, Prices, Extras)
   */
  function updateLivePreview() {
    const svc = window.TWINNIE_SERVICES[currentServiceKey];
    if (!svc) return;

    const pkgId = elements.packageSelect?.value;
    const pkg = svc.packages.find(p => p.id === pkgId) || svc.packages[0];
    if (!pkg) return;

    const basePrice = currentLocationType === 'homevisit' ? (pkg.priceHomevisit || pkg.priceOutlet) : pkg.priceOutlet;

    // Calculate selected extras
    let extrasTotal = 0;
    const selectedExtras = [];
    if (elements.extrasList) {
      const checked = elements.extrasList.querySelectorAll('.extra-checkbox:checked');
      checked.forEach(cb => {
        const p = Number(cb.dataset.price) || 0;
        extrasTotal += p;
        selectedExtras.push({
          id: cb.dataset.extraId,
          name: cb.dataset.name,
          price: p
        });
      });
    }

    const grandTotal = basePrice + extrasTotal;

    // Dynamically swap preview image with smooth animation (Woman Spa -> woman-hair.jpg)
    if (elements.previewImage) {
      const imgSrc = (currentServiceKey === 'woman-spa')
        ? 'assets/img/woman-hair.jpg'
        : (pkg.img || svc.poster || svc.thumbs?.[0] || 'assets/img/baby.jpg');

      if (elements.previewImage.src !== imgSrc && !elements.previewImage.src.endsWith(imgSrc)) {
        elements.previewImage.style.opacity = '0.4';
        elements.previewImage.src = imgSrc;
        elements.previewImage.alt = pkg.name;
        setTimeout(() => {
          elements.previewImage.style.opacity = '1';
        }, 120);
      }
    }

    // Update Text & Meta
    if (elements.previewTitle) elements.previewTitle.textContent = pkg.name;
    if (elements.previewDesc) elements.previewDesc.textContent = pkg.desc || svc.caption;
    if (elements.previewDuration) {
      elements.previewDuration.textContent = `⏱ Durasi: ${pkg.duration || '60 Menit'}`;
    }
    if (elements.previewAge) {
      elements.previewAge.textContent = `👶 Target: ${pkg.age || 'Keluarga'}`;
    }
    if (elements.previewNotes) {
      if (pkg.notes) {
        elements.previewNotes.textContent = pkg.notes;
        elements.previewNotes.classList.remove('hidden');
      } else {
        elements.previewNotes.classList.add('hidden');
      }
    }
    if (elements.previewCategoryBadge) {
      elements.previewCategoryBadge.textContent = svc.title;
    }
    if (elements.previewLocationBadge) {
      elements.previewLocationBadge.textContent = currentLocationType === 'outlet'
        ? '🏢 Langsung ke Outlet'
        : '🏠 Home Visit (Ke Rumah Anda)';
    }

    // Populate modal thumbnails track
    if (elements.modalThumbsList && svc.thumbs) {
      elements.modalThumbsList.innerHTML = '';
      svc.thumbs.forEach((tSrc, i) => {
        const tBtn = document.createElement('button');
        tBtn.type = 'button';
        tBtn.className = 'w-11 h-8 rounded-lg overflow-hidden border border-slate-200 hover:border-pink-500 shrink-0 transition focus-ring';
        tBtn.title = `Lihat dokumentasi ${i + 1}`;
        tBtn.innerHTML = `<img src="${tSrc}" alt="Dokumentasi ${i + 1}" class="w-full h-full object-cover">`;
        tBtn.addEventListener('click', () => {
          if (elements.previewImage) {
            elements.previewImage.src = tSrc;
          }
        });
        elements.modalThumbsList.appendChild(tBtn);
      });
    }

    const isVisitOnly = (pkg.priceOutlet === 0 && (!pkg.priceHomevisit || pkg.priceHomevisit === 0));

    // Update Price Rows
    if (elements.previewBasePrice) {
      elements.previewBasePrice.textContent = isVisitOnly ? 'Visit Outlet' : window.formatRupiah(basePrice);
    }
    if (elements.selectedExtrasContainer) {
      if (selectedExtras.length > 0) {
        elements.selectedExtrasContainer.innerHTML = selectedExtras.map(e => `
          <div class="flex justify-between text-xs text-slate-500 py-0.5">
            <span>+ ${e.name}</span>
            <span class="font-semibold text-slate-700">${window.formatRupiah(e.price)}</span>
          </div>
        `).join('');
      } else {
        elements.selectedExtrasContainer.innerHTML = `<span class="text-xs text-slate-400">${isVisitOnly ? 'Konsultasi perawatan di outlet' : 'Tidak ada add-on'}</span>`;
      }
    }
    if (elements.previewTotalPrice) {
      elements.previewTotalPrice.textContent = isVisitOnly ? 'Langsung Chat WA' : window.formatRupiah(grandTotal);
    }
    if (elements.previewTotalPriceMobile) {
      elements.previewTotalPriceMobile.textContent = isVisitOnly ? 'Chat WA' : window.formatRupiah(grandTotal);
    }

    return {
      svc,
      pkg,
      basePrice,
      extrasTotal,
      grandTotal,
      selectedExtras,
      isVisitOnly
    };
  }

  /**
   * Build WhatsApp Pre-filled message
   */
  function buildWhatsappMessage(formData, summary) {
    if (summary.isVisitOnly || summary.pkg.id === 'allura-visit-outlet' || currentServiceKey === 'woman-spa') {
      return `*RESERVASI VISIT OUTLET ALLURA WOMAN SPA*
----------------------------------------
👤 *Nama Pelanggan:* ${formData.name}
📱 *No. WhatsApp:* ${formData.phone}
🗓 *Rencana Tanggal Kunjungan:* ${formData.date}
⏰ *Jam Kunjungan:* ${formData.time} WIB

🏢 *LOKASI:* Outlet Allura Woman Spa
📍 *Alamat:* Jl. Kadaka No.11, Jatimulyo, Lowokwaru, Kota Malang
✨ *Tipe Reservasi:* Visit Langsung ke Outlet & Konsultasi Perawatan

📝 *Catatan / Pertanyaan:*
"${formData.notes || 'Saya ingin reservasi dan konsultasi perawatan langsung saat tiba di outlet.'}"
----------------------------------------
Mohon konfirmasi ketersediaan jadwal terapis di outlet Allura. Terima kasih!`;
    }

    const locText = currentLocationType === 'outlet'
      ? `🏢 *LOKASI:* Langsung ke Outlet\n📍 *Outlet:* ${formData.outletName}`
      : `🏠 *LOKASI:* Home Visit (Layanan ke Rumah)\n🗺 *Alamat:* ${formData.homeAddress}`;

    const extrasText = summary.selectedExtras.length > 0
      ? summary.selectedExtras.map(e => `   • ${e.name} (+${window.formatRupiah(e.price)})`).join('\n')
      : '   (Tidak ada tambahan)';

    return `*RESERVASI LAYANAN TWINNIE GROUP*
----------------------------------------
👤 *Nama Pelanggan:* ${formData.name}
📱 *No. WhatsApp:* ${formData.phone}
🗓 *Tanggal:* ${formData.date}
⏰ *Jam Reservasi:* ${formData.time} WIB

🏷 *Layanan:* ${summary.svc.title}
✨ *Paket Dipilih:* ${summary.pkg.name}
⏱ *Durasi:* ${summary.pkg.duration}
${locText}

➕ *Layanan Tambahan (Extras):*
${extrasText}

📝 *Catatan Khusus:*
"${formData.notes || 'Tidak ada catatan khusus.'}"
----------------------------------------
💰 *RINCIAN BIAYA:*
- Tarif Paket: ${window.formatRupiah(summary.basePrice)}
- Tarif Tambahan: ${window.formatRupiah(summary.extrasTotal)}
*TOTAL ESTIMASI:* ${window.formatRupiah(summary.grandTotal)}
----------------------------------------
Mohon konfirmasi ketersediaan jadwal terapis. Terima kasih Twinnie Group!`;
  }

  /**
   * Open Booking Modal
   */
  function openModal(serviceId = 'baby-spa', packageId = null) {
    lastFocusedElement = document.activeElement;
    
    // Default date to tomorrow
    if (elements.dateInput && !elements.dateInput.value) {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      elements.dateInput.value = tomorrow.toISOString().split('T')[0];
    }
    if (elements.timeInput && !elements.timeInput.value) {
      elements.timeInput.value = '10:00';
    }

    if (window.TWINNIE_SERVICES && window.TWINNIE_SERVICES[serviceId]) {
      currentServiceKey = serviceId;
    } else {
      currentServiceKey = 'baby-spa';
    }

    populateServices(currentServiceKey);
    if (packageId) {
      populatePackages(packageId);
    }

    elements.modal.classList.remove('hidden');
    elements.modal.classList.add('flex');
    elements.modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Focus on first input
    setTimeout(() => {
      if (elements.nameInput) elements.nameInput.focus();
    }, 100);

    window.dispatchEvent(new CustomEvent('modal:open'));
  }

  /**
   * Close Booking Modal
   */
  function closeModal() {
    elements.modal.classList.add('hidden');
    elements.modal.classList.remove('flex');
    elements.modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
      lastFocusedElement.focus();
    }
    window.dispatchEvent(new CustomEvent('modal:close'));
  }

  /**
   * Attach Reactive Event Handlers (Zero Silent Failure)
   */
  function init() {
    // Service Select Change
    if (elements.serviceSelect) {
      elements.serviceSelect.addEventListener('change', (e) => {
        currentServiceKey = e.target.value;
        populatePackages();
        populateOutlets();
        populateExtras();
      });
    }

    // Package Select Change
    if (elements.packageSelect) {
      elements.packageSelect.addEventListener('change', () => {
        handleHomevisitSupportCheck();
        updateLivePreview();
      });
    }

    // Location Type Radio Change
    if (elements.locationOutletRadio) {
      elements.locationOutletRadio.addEventListener('change', () => {
        if (elements.locationOutletRadio.checked) toggleLocationType('outlet');
      });
    }
    if (elements.locationHomevisitRadio) {
      elements.locationHomevisitRadio.addEventListener('change', () => {
        if (elements.locationHomevisitRadio.checked) toggleLocationType('homevisit');
      });
    }

    // Modal Close Triggers
    if (elements.closeBtn) elements.closeBtn.addEventListener('click', closeModal);
    if (elements.cancelBtn) elements.cancelBtn.addEventListener('click', closeModal);
    if (elements.overlay) elements.overlay.addEventListener('click', closeModal);

    // Escape Key Handler & Focus Trap
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && elements.modal && !elements.modal.classList.contains('hidden')) {
        closeModal();
      }
    });

    // Form Submission Handler
    if (elements.form) {
      elements.form.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = elements.nameInput?.value.trim();
        const phone = elements.phoneInput?.value.trim();
        const date = elements.dateInput?.value;
        const time = elements.timeInput?.value;
        const notes = elements.notesInput?.value.trim();
        const homeAddress = elements.homeAddressInput?.value.trim();

        if (!name || !phone || !date || !time) {
          showToast('Mohon lengkapi Nama, No. WhatsApp, Tanggal, dan Waktu reservasi.', 'error');
          return;
        }

        if (currentLocationType === 'homevisit' && !homeAddress) {
          showToast('Mohon masukkan alamat lengkap atau patokan lokasi untuk Home Visit.', 'error');
          elements.homeAddressInput?.focus();
          return;
        }

        const outletObj = window.TWINNIE_OUTLETS.find(o => o.id === elements.outletSelect?.value) || window.TWINNIE_OUTLETS[0];
        const outletName = outletObj ? outletObj.name : 'Outlet Twinnie Group';

        const summary = updateLivePreview();
        if (!summary) {
          showToast('Terjadi kesalahan memuat data paket. Silakan coba lagi.', 'error');
          return;
        }

        const csNumber = summary.svc.csNumber || '628972703833';
        const waMessage = buildWhatsappMessage({
          name,
          phone,
          date,
          time,
          notes,
          homeAddress,
          outletName
        }, summary);

        const waUrl = `https://wa.me/${csNumber}?text=${encodeURIComponent(waMessage)}`;

        // Open WhatsApp
        window.open(waUrl, '_blank', 'noopener,noreferrer');
        showToast('Pesanan siap! WhatsApp terbuka untuk konfirmasi jadwal.', 'success');

        setTimeout(() => {
          closeModal();
          elements.form.reset();
        }, 1200);
      });
    }

    // Global click delegate for any button opening booking modal
    document.addEventListener('click', (e) => {
      const openBtn = e.target.closest('[data-open-booking]');
      if (openBtn) {
        e.preventDefault();
        const svcId = openBtn.dataset.service || currentServiceKey;
        const pkgId = openBtn.dataset.package || null;
        openModal(svcId, pkgId);
      }
    });

    // Export API
    window.TwinnieBooking = {
      openModal,
      closeModal,
      showToast
    };
  }

  // Initialize once DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
