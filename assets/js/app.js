document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const navMenu = document.getElementById('nav-menu');
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.querySelectorAll('.nav-link');
  const revealEls = document.querySelectorAll('.reveal');
  const counters = document.querySelectorAll('.counter');
  const faqItems = document.querySelectorAll('.faq-item');
  const form = document.getElementById('consultForm');
  const alertBox = document.getElementById('form-alert');
  const submitBtn = document.getElementById('btnSubmit');
  const typingTarget = document.getElementById('terminal-typing');

  const updateNavbar = () => {
    if (window.scrollY > 10) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');
  };
  updateNavbar();
  window.addEventListener('scroll', updateNavbar);

  if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
      const expanded = hamburger.classList.toggle('active');
      navMenu.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
      });
    });
  }

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('show');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  revealEls.forEach(el => revealObserver.observe(el));

  let counterTriggered = false;
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting || counterTriggered) return;
      counterTriggered = true;
      counters.forEach(counter => animateCounter(counter));
    });
  }, { threshold: 0.4 });
  const statArea = document.getElementById('hero-stats');
  if (statArea) counterObserver.observe(statArea);

  function animateCounter(el) {
    const target = Number(el.dataset.target || 0);
    const duration = 1200;
    const start = performance.now();

    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const value = Math.floor(progress * target);
      el.textContent = value;
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target;
    };
    requestAnimationFrame(step);
  }

  faqItems.forEach(item => {
    const btn = item.querySelector('.faq-question');
    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('active');
      faqItems.forEach(other => {
        other.classList.remove('active');
        other.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('active');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  const typingWords = [
    'Repair Recommended',
    'Backup Suggested',
    'SSD Upgrade Available',
    'Cleanup in Progress'
  ];
  if (typingTarget) {
    let wordIndex = 0;
    let charIndex = 0;
    let deleting = false;

    const tick = () => {
      const word = typingWords[wordIndex];
      if (!deleting) {
        typingTarget.textContent = word.slice(0, ++charIndex);
        if (charIndex === word.length) {
          deleting = true;
          return setTimeout(tick, 1300);
        }
      } else {
        typingTarget.textContent = word.slice(0, --charIndex);
        if (charIndex === 0) {
          deleting = false;
          wordIndex = (wordIndex + 1) % typingWords.length;
        }
      }
      setTimeout(tick, deleting ? 40 : 65);
    };
    tick();
  }

  const sections = document.querySelectorAll('main section[id]');
  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      const id = entry.target.getAttribute('id');
      const activeLink = document.querySelector(`.nav-link[href="#${id}"]`);
      if (entry.isIntersecting) {
        navLinks.forEach(link => link.classList.remove('active'));
        if (activeLink) activeLink.classList.add('active');
      }
    });
  }, { rootMargin: '-30% 0px -55% 0px', threshold: 0 });
  sections.forEach(section => sectionObserver.observe(section));

  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      submitBtn.disabled = true;
      submitBtn.textContent = 'Memproses...';
      alertBox.className = 'form-alert hidden';
      alertBox.textContent = '';

      const formData = new FormData(form);
      try {
        const res = await fetch(form.getAttribute('action'), {
          method: 'POST',
          body: formData,
          headers: { 'Accept': 'application/json' }
        });
        const data = await res.json();
        if (!res.ok || data.status !== 'success') throw new Error(data.message || 'Gagal mengirim form.');

        alertBox.textContent = data.message || 'Berhasil! Mengalihkan ke WhatsApp...';
        alertBox.className = 'form-alert success';
        form.reset();
        setTimeout(() => {
          window.open(data.wa_url, '_blank');
        }, 700);
      } catch (err) {
        const name = form.querySelector('#name')?.value?.trim() || '';
        const phone = form.querySelector('#phone')?.value?.trim() || '';
        const device = form.querySelector('#device')?.value?.trim() || '';
        const service = form.querySelector('#service')?.value?.trim() || '';
        const issue = form.querySelector('#issue')?.value?.trim() || '';
        if (name && phone && device && service && issue) {
          const text = `Halo NusaTech Care, saya ${name}, WhatsApp: ${phone}. Perangkat: ${device}. Layanan: ${service}. Keluhan: ${issue}`;
          const waUrl = `https://wa.me/${window.NTC_WA || '6281252580812'}?text=${encodeURIComponent(text)}`;
          alertBox.textContent = 'Server submit gagal, tapi form tetap diarahkan ke WhatsApp.';
          alertBox.className = 'form-alert success';
          setTimeout(() => window.open(waUrl, '_blank'), 700);
        } else {
          alertBox.textContent = err.message || 'Terjadi kesalahan. Coba lagi.';
          alertBox.className = 'form-alert error';
        }
      } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Kirim & Chat WhatsApp';
      }
    });
  }
});
