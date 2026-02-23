/**
 * Twinnie Group - Core Application Controller (v2.0)
 * Features:
 * - Multimedia Hero Controls from ref.php (Video, Thumbs, Dynamic Partner Logos)
 * - Parallax Scroll Effect (GPU Accelerated)
 * - Active Navbar ScrollSpy (Dynamic Section Tracking)
 * - Lightbox Modal for Images & Videos
 * - Zero Silent Failure Event Delegation
 */

(function () {
  'use strict';

  // State
  let currentServiceIndex = 0;
  const servicesList = window.MULTIMEDIA_SERVICES || [];

  // DOM Elements Cache
  const dom = {
    header: document.getElementById('siteHeader'),
    mobileMenuBtn: document.getElementById('mobileMenuBtn'),
    mobileMenu: document.getElementById('mobileMenu'),
    iconMenuOpen: document.getElementById('iconMenuOpen'),
    iconMenuClose: document.getElementById('iconMenuClose'),
    navLinks: document.querySelectorAll('.nav-link'),
    
    // Hero Elements
    heroBg: document.getElementById('hero-bg'),
    heroSection: document.getElementById('hero'),
    serviceTitle: document.getElementById('serviceTitle'),
    serviceSubtitle: document.getElementById('serviceSubtitle'),
    serviceCaption: document.getElementById('serviceCaption'),
    mediaCaptionTitle: document.getElementById('mediaCaptionTitle'),
    mediaCaptionSub: document.getElementById('mediaCaptionSub'),
    
    // Video & Media Card
    heroMediaCard: document.getElementById('heroMediaCard'),
    heroMediaViewport: document.getElementById('heroMediaViewport'),
    heroServiceCounter: document.getElementById('heroServiceCounter'),
    serviceVideo: document.getElementById('serviceVideo'),
    videoSource: document.getElementById('videoSource'),
    playOverlay: document.getElementById('playOverlay'),
    playIcon: document.getElementById('playIcon'),
    thumbsTrack: document.getElementById('thumbs'),
    logosStrip: document.getElementById('logosStrip'),
    dotsContainer: document.getElementById('dots'),
    
    prevServiceBtn: document.getElementById('prevService'),
    nextServiceBtn: document.getElementById('nextService'),
    prevServiceMobileBtn: document.getElementById('prevServiceMobile'),
    nextServiceMobileBtn: document.getElementById('nextServiceMobile'),
    
    // Lightbox
    lightbox: document.getElementById('mediaLightbox'),
    lbBackdrop: document.getElementById('lbBackdrop'),
    lbContent: document.getElementById('lbContent'),
    lbCloseBtn: document.getElementById('lbCloseBtn'),
    lbCaption: document.getElementById('lbCaption'),
    
    // Floating CTAs
    floatingCTAs: document.getElementById('floatingCTAs')
  };

  /**
   * Header sticky effect on scroll
   */
  function handleHeaderScroll() {
    if (!dom.header) return;
    if (window.scrollY > 20) {
      dom.header.classList.add('shadow-md', 'bg-white/95');
      dom.header.classList.remove('bg-white/80');
    } else {
      dom.header.classList.remove('shadow-md', 'bg-white/95');
      dom.header.classList.add('bg-white/80');
    }
  }

  /**
   * Parallax Scroll Effect (GPU Accelerated, Lightweight with rAF)
   * Handles Hero parallax and alternating section parallax backgrounds (Instruction 6)
   */
  let isParallaxTicking = false;
  function handleParallaxScroll() {
    if (isParallaxTicking) return;
    isParallaxTicking = true;

    requestAnimationFrame(() => {
      const scrollPos = window.pageYOffset;
      const windowHeight = window.innerHeight;

      // 1. Hero Parallax
      if (dom.heroBg && dom.heroSection && scrollPos < 1100) {
        dom.heroBg.style.transform = `translate3d(0, ${scrollPos * 0.28}px, 0)`;
      }

      // 2. Multi-section Parallax Layers across the page
      const parallaxLayers = document.querySelectorAll('.parallax-bg-layer');
      parallaxLayers.forEach(layer => {
        if (dom.heroBg && layer === dom.heroBg) return;
        const parent = layer.parentElement;
        if (!parent) return;
        const rect = parent.getBoundingClientRect();
        // Animate only when near viewport
        if (rect.top < windowHeight + 100 && rect.bottom > -100) {
          const speed = parseFloat(layer.getAttribute('data-parallax-speed')) || 0.16;
          const offset = (rect.top - windowHeight / 2) * speed;
          layer.style.transform = `translate3d(0, ${offset}px, 0)`;
        }
      });

      isParallaxTicking = false;
    });
  }

  /**
   * Navbar Active State: Automatically highlight active navbar button
   */
  function initNavbarScrollSpy() {
    if (!dom.navLinks || dom.navLinks.length === 0) return;

    const currentPath = window.location.pathname.toLowerCase();
    const currentFile = currentPath.split('/').pop() || 'index.html';

    dom.navLinks.forEach(link => {
      const href = (link.getAttribute('href') || '').toLowerCase();
      if (!href) return;
      const targetFile = href.split('#')[0].split('/').pop();

      const isHome = (currentFile === '' || currentFile === 'index.html' || currentFile === 'index.php') &&
                     (targetFile === '' || targetFile === 'index.html' || targetFile === 'index.php' || href.startsWith('#'));
      const isTentangKami = currentFile.includes('tentang-kami') && href.includes('tentang-kami');
      const isKemitraan = currentFile.includes('kemitraan') && href.includes('kemitraan');

      if (isHome || isTentangKami || isKemitraan) {
        link.classList.add('nav-link-active', 'active');
      } else {
        link.classList.remove('nav-link-active', 'active');
      }
    });
  }

  /**
   * Mobile Menu Drawer Toggle
   */
  function toggleMobileMenu(forceClose = false) {
    if (!dom.mobileMenu) return;
    const isCurrentlyOpen = !dom.mobileMenu.classList.contains('hidden');
    const shouldOpen = forceClose ? false : !isCurrentlyOpen;

    if (shouldOpen) {
      dom.mobileMenu.classList.remove('hidden');
      dom.iconMenuOpen?.classList.add('hidden');
      dom.iconMenuClose?.classList.remove('hidden');
      dom.mobileMenuBtn?.setAttribute('aria-expanded', 'true');
    } else {
      dom.mobileMenu.classList.add('hidden');
      dom.iconMenuOpen?.classList.remove('hidden');
      dom.iconMenuClose?.classList.add('hidden');
      dom.mobileMenuBtn?.setAttribute('aria-expanded', 'false');
    }
  }

  /**
   * Render Thumbnails Track for active service
   */
  function renderThumbs(thumbsList = [], svc) {
    if (!dom.thumbsTrack) return;
    dom.thumbsTrack.innerHTML = '';

    thumbsList.forEach((src, idx) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'flex-none w-16 sm:w-20 h-11 sm:h-12 rounded-lg overflow-hidden border-2 border-slate-200 hover:border-pink-500 shadow-xs bg-slate-100 transition transform hover:scale-105 focus-ring';
      btn.setAttribute('aria-label', `Lihat foto ${svc.title} #${idx + 1}`);

      const img = document.createElement('img');
      img.src = src;
      img.alt = `${svc.title} foto ${idx + 1}`;
      img.className = 'w-full h-full object-cover';
      img.loading = 'lazy';

      btn.appendChild(img);
      btn.addEventListener('click', () => {
        openLightbox(src, 'image', `${svc.title} — Dokumentasi Pelayanan #${idx + 1}`);
      });

      dom.thumbsTrack.appendChild(btn);
    });
  }

  /**
   * Render Partner Logos Strip with Logo & Name
   */
  function renderLogosStrip(logos = []) {
    if (!dom.logosStrip) return;
    dom.logosStrip.innerHTML = '';

    logos.forEach(partner => {
      const wrap = document.createElement('div');
      wrap.className = 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 shadow-2xs text-[11px] font-semibold text-slate-700';

      const logoImg = document.createElement('img');
      logoImg.src = partner.src;
      logoImg.alt = partner.name;
      logoImg.className = 'w-5 h-5 rounded-full object-cover border border-slate-200';
      logoImg.loading = 'lazy';

      const nameSpan = document.createElement('span');
      nameSpan.textContent = partner.name;

      wrap.appendChild(logoImg);
      wrap.appendChild(nameSpan);
      dom.logosStrip.appendChild(wrap);
    });
  }

  /**
   * Create & Update Dots Navigation
   */
  function createDots() {
    if (!dom.dotsContainer || servicesList.length === 0) return;
    dom.dotsContainer.innerHTML = '';

    servicesList.forEach((s, idx) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = `w-3 h-3 rounded-full transition-all ${idx === currentServiceIndex ? 'bg-rose-500 scale-125' : 'bg-rose-200/50 hover:bg-rose-200'}`;
      dot.setAttribute('aria-label', `Pilih layanan ${s.title}`);
      dot.addEventListener('click', () => renderService(idx));
      dom.dotsContainer.appendChild(dot);
    });
  }

  function updateDots(activeIdx) {
    if (!dom.dotsContainer) return;
    Array.from(dom.dotsContainer.children).forEach((dot, idx) => {
      if (idx === activeIdx) {
        dot.className = 'w-3 h-3 rounded-full bg-rose-500 scale-125 transition-all';
      } else {
        dot.className = 'w-3 h-3 rounded-full bg-rose-200/50 hover:bg-rose-200 transition-all';
      }
    });
  }

  /**
   * Attempt Video Autoplay Gently
   */
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

  function updatePlayIcon() {
    if (!dom.serviceVideo || !dom.playIcon) return;
    const v = dom.serviceVideo;
    if (v.muted || v.paused) {
      dom.playIcon.innerHTML = '<path d="M8 5v14l11-7z" fill="currentColor"/>';
      dom.playOverlay?.classList.remove('opacity-0');
    } else {
      dom.playIcon.innerHTML = '<path d="M6 5h4v14H6zM14 5h4v14h-4z" fill="currentColor"/>';
      dom.playOverlay?.classList.add('opacity-0');
    }
  }

  /**
   * Render Service in Multimedia Hero (from ref.php)
   */
  function renderService(index) {
    if (servicesList.length === 0) return;
    currentServiceIndex = (index + servicesList.length) % servicesList.length;
    const svc = servicesList[currentServiceIndex];

    // Text updates
    if (dom.serviceTitle) dom.serviceTitle.textContent = svc.title;
    if (dom.serviceSubtitle) dom.serviceSubtitle.textContent = svc.subtitle;
    if (dom.serviceCaption) dom.serviceCaption.textContent = svc.caption;
    if (dom.mediaCaptionTitle) dom.mediaCaptionTitle.textContent = svc.title;
    if (dom.mediaCaptionSub) dom.mediaCaptionSub.textContent = svc.subtitle;

    // Service Counter update
    if (dom.heroServiceCounter) {
      dom.heroServiceCounter.textContent = `${currentServiceIndex + 1} / ${servicesList.length}`;
    }

    // Video updates
    if (dom.serviceVideo && dom.videoSource) {
      dom.serviceVideo.pause();
      if (svc.poster) dom.serviceVideo.setAttribute('poster', svc.poster);
      else dom.serviceVideo.removeAttribute('poster');

      dom.videoSource.src = svc.video || '';
      try {
        dom.serviceVideo.load();
      } catch (_) {}

      // Try autoplaying gently
      tryPlayVideo(dom.serviceVideo).then(playing => {
        if (!playing) dom.playOverlay?.classList.remove('opacity-0');
        else dom.playOverlay?.classList.add('opacity-0');
      });

      dom.serviceVideo.onended = () => {
        renderService(currentServiceIndex + 1);
      };
    }

    renderThumbs(svc.thumbs || [], svc);
    renderLogosStrip(svc.partnerLogos || []);
    updateDots(currentServiceIndex);

    // Update Hero Category Pills with elegant translucent pill aesthetic
    const heroPills = document.querySelectorAll('[data-hero-service]');
    heroPills.forEach((btn) => {
      const idx = parseInt(btn.getAttribute('data-hero-service'), 10);
      if (idx === currentServiceIndex) {
        btn.className = 'hero-svc-btn active px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-rose-500 text-white shadow-md shadow-rose-500/30 scale-105';
      } else {
        btn.className = 'hero-svc-btn px-3.5 py-2 rounded-xl text-xs font-semibold transition-all bg-white/20 hover:bg-white/30 text-white backdrop-blur-md border border-white/25';
      }
    });
  }

  function nextService() {
    renderService(currentServiceIndex + 1);
  }

  function prevService() {
    renderService(currentServiceIndex - 1);
  }

  /**
   * Open Media Lightbox (Image or Video)
   */
  function openLightbox(src, type = 'image', title = '') {
    if (!dom.lightbox || !dom.lbContent) return;

    dom.lbContent.innerHTML = '';
    if (type === 'image') {
      const img = document.createElement('img');
      img.src = src;
      img.alt = title || 'Preview';
      img.className = 'max-w-full max-h-[80vh] rounded-2xl object-contain shadow-2xl';
      dom.lbContent.appendChild(img);
    } else if (type === 'video') {
      const vid = document.createElement('video');
      vid.src = src;
      vid.controls = true;
      vid.autoplay = true;
      vid.playsInline = true;
      vid.className = 'max-w-full max-h-[80vh] rounded-2xl object-contain shadow-2xl bg-black';
      dom.lbContent.appendChild(vid);
    }

    if (dom.lbCaption) dom.lbCaption.textContent = title;
    dom.lightbox.classList.remove('hidden');
    dom.lightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    if (!dom.lightbox) return;
    dom.lightbox.classList.add('hidden');
    dom.lightbox.classList.remove('flex');
    if (dom.lbContent) dom.lbContent.innerHTML = '';
    document.body.style.overflow = '';
  }

  /**
   * Setup Floating CTAs auto-hide on modal open
   */
  function setupFloatingCTAs() {
    if (!dom.floatingCTAs) return;
    window.addEventListener('modal:open', () => {
      dom.floatingCTAs.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
    });
    window.addEventListener('modal:close', () => {
      dom.floatingCTAs.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
    });
  }

  /**
   * Setup Event Delegates (Zero Silent Failure)
   */
  function setupEventDelegates() {
    // Scroll Events
    window.addEventListener('scroll', () => {
      handleHeaderScroll();
      handleParallaxScroll();
    }, { passive: true });

    // Mobile Menu
    dom.mobileMenuBtn?.addEventListener('click', () => toggleMobileMenu());
    document.querySelectorAll('#mobileMenu a').forEach(link => {
      link.addEventListener('click', () => toggleMobileMenu(true));
    });

    // Hero Navigation Buttons
    dom.prevServiceBtn?.addEventListener('click', prevService);
    dom.nextServiceBtn?.addEventListener('click', nextService);
    dom.prevServiceMobileBtn?.addEventListener('click', prevService);
    dom.nextServiceMobileBtn?.addEventListener('click', nextService);

    // Hero Service Switcher Category Pills (Reactive Click)
    document.addEventListener('click', (e) => {
      const pill = e.target.closest('[data-hero-service]');
      if (pill) {
        e.preventDefault();
        const idx = parseInt(pill.getAttribute('data-hero-service'), 10);
        if (!isNaN(idx)) renderService(idx);
      }
    });

    // Keyboard Arrow Controls
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') prevService();
      if (e.key === 'ArrowRight') nextService();
    });

    // Touch Swipe Gesture for Hero Media Frame (Instruction 8)
    const mediaViewport = dom.heroMediaViewport || document.getElementById('heroMediaViewport');
    if (mediaViewport) {
      let touchStartX = 0;
      let touchStartY = 0;
      let isSwiping = false;

      mediaViewport.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
          touchStartX = e.touches[0].clientX;
          touchStartY = e.touches[0].clientY;
          isSwiping = true;
        }
      }, { passive: true });

      mediaViewport.addEventListener('touchend', (e) => {
        if (!isSwiping || e.changedTouches.length === 0) return;
        isSwiping = false;
        const deltaX = e.changedTouches[0].clientX - touchStartX;
        const deltaY = e.changedTouches[0].clientY - touchStartY;

        // Ensure swipe was primarily horizontal and passed distance threshold (35px)
        if (Math.abs(deltaX) > 35 && Math.abs(deltaX) > Math.abs(deltaY)) {
          if (deltaX < 0) {
            nextService();
          } else {
            prevService();
          }
        }
      }, { passive: true });

      // Mouse drag swipe support on desktop
      let mouseStartX = 0;
      let isMouseDown = false;

      mediaViewport.addEventListener('mousedown', (e) => {
        if (e.target.closest('#playOverlay')) return;
        isMouseDown = true;
        mouseStartX = e.clientX;
      });

      mediaViewport.addEventListener('mouseup', (e) => {
        if (!isMouseDown) return;
        isMouseDown = false;
        const deltaX = e.clientX - mouseStartX;
        if (Math.abs(deltaX) > 40) {
          if (deltaX < 0) nextService();
          else prevService();
        }
      });

      mediaViewport.addEventListener('mouseleave', () => {
        isMouseDown = false;
      });
    }

    // Video Overlay Play/Pause Button
    dom.playOverlay?.addEventListener('click', async () => {
      const v = dom.serviceVideo;
      if (!v) return;
      if (v.muted) {
        v.muted = false;
        try {
          await v.play();
        } catch (_) {}
      } else {
        if (v.paused) v.play().catch(() => {});
        else v.pause();
      }
      updatePlayIcon();
    });

    dom.serviceVideo?.addEventListener('play', updatePlayIcon);
    dom.serviceVideo?.addEventListener('pause', updatePlayIcon);
    dom.serviceVideo?.addEventListener('click', () => {
      const svc = servicesList[currentServiceIndex];
      if (svc && svc.video) {
        openLightbox(svc.video, 'video', `${svc.title} — Video Preview`);
      }
    });

    // Lightbox Global Click Delegates
    document.addEventListener('click', (e) => {
      const trigger = e.target.closest('[data-lightbox-src]');
      if (trigger) {
        e.preventDefault();
        const src = trigger.dataset.lightboxSrc;
        const type = trigger.dataset.lightboxType || 'image';
        const title = trigger.dataset.lightboxTitle || '';
        openLightbox(src, type, title);
      }
    });

    dom.lbCloseBtn?.addEventListener('click', closeLightbox);
    dom.lbBackdrop?.addEventListener('click', closeLightbox);
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && dom.lightbox && !dom.lightbox.classList.contains('hidden')) {
        closeLightbox();
      }
    });

    // Partnership Button Delegate
    document.addEventListener('click', (e) => {
      const partnerBtn = e.target.closest('[data-open-partner]');
      if (partnerBtn) {
        e.preventDefault();
        const tier = partnerBtn.dataset.openPartner || 'silver';
        if (typeof window.applyPartnership === 'function') {
          window.applyPartnership(tier);
        } else {
          window.open('https://wa.me/62895327268977?text=Halo%20Twinnie%20Group,%20saya%20ingin%20mengajukan%20kemitraan%20investasi', '_blank');
        }
      }
    });
  }

  /**
   * Modular Component Loader (Helper for Junior Developers - Instruction 7)
   * Automatically replaces placeholders like <div data-component="components/footer.html"></div>
   * when served over HTTP/HTTPS, while maintaining static fallback for file:// protocol.
   */
  async function loadModularComponents() {
    const placeholders = document.querySelectorAll('[data-component]');
    if (!placeholders || placeholders.length === 0) return;

    if (window.location.protocol === 'file:') {
      console.info('Twinnie Group: Running on file:// protocol. Using pre-baked static HTML components.');
      return;
    }

    for (const el of placeholders) {
      const compPath = el.getAttribute('data-component');
      if (!compPath) continue;
      try {
        const resp = await fetch(compPath);
        if (resp.ok) {
          const html = await resp.text();
          el.outerHTML = html;
        }
      } catch (e) {
        console.warn(`Gagal memuat komponen modular: ${compPath}`, e);
      }
    }
  }

  /**
   * Bootstrap
   */
  function init() {
    loadModularComponents();
    setupEventDelegates();
    createDots();
    renderService(0);
    setupFloatingCTAs();
    handleHeaderScroll();
    initNavbarScrollSpy();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
