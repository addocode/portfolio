(function () {
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  const burger = document.querySelector('.nav__burger');
  const menu = document.getElementById('mobileMenu');
  const closeBtn = document.querySelector('.mobile-menu__close');

  function openMenu() {
    if (!menu || !burger) return;
    menu.classList.add('is-open');
    menu.setAttribute('aria-hidden', 'false');
    burger.setAttribute('aria-expanded', 'true');
    document.body.classList.add('no-scroll');
  }

  function closeMenu() {
    if (!menu || !burger) return;
    menu.classList.remove('is-open');
    menu.setAttribute('aria-hidden', 'true');
    burger.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('no-scroll');
  }

  if (burger) burger.addEventListener('click', openMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (menu) {
    menu.addEventListener('click', (event) => {
      if (event.target === menu) closeMenu();
    });
    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
  }

  initHomepageSlider();
  initPortfolioAccordion();
  initPortfolioLightbox();

  function initHomepageSlider() {
    const track = document.querySelector('.slider__track');
    const images = Array.from(document.querySelectorAll('.slider__img'));
    const dots = Array.from(document.querySelectorAll('.dot'));
    const prev = document.querySelector('.slider__arrow--left');
    const next = document.querySelector('.slider__arrow--right');

    if (!track || images.length === 0) return;

    shuffle(images).forEach((image) => track.appendChild(image));

    let activeIndex = 0;

    function show(index) {
      activeIndex = (index + images.length) % images.length;
      images.forEach((image, currentIndex) => image.classList.toggle('is-active', currentIndex === activeIndex));
      dots.forEach((dot, currentIndex) => dot.classList.toggle('is-active', currentIndex === activeIndex));
    }

    show(0);

    if (prev) prev.addEventListener('click', () => show(activeIndex - 1));
    if (next) next.addEventListener('click', () => show(activeIndex + 1));
    dots.forEach((dot, index) => dot.addEventListener('click', () => show(index)));
    window.setInterval(() => show(activeIndex + 1), 5000);
  }

  function initPortfolioAccordion() {
    const items = Array.from(document.querySelectorAll('.portfolio__item'));
    const toggles = Array.from(document.querySelectorAll('.portfolio__toggle'));

    if (items.length === 0 || toggles.length === 0) return;

    function closeAll() {
      items.forEach((item) => item.classList.remove('is-open'));
      toggles.forEach((toggle) => toggle.setAttribute('aria-expanded', 'false'));
    }

    toggles.forEach((toggle) => {
      const item = toggle.closest('.portfolio__item');
      toggle.setAttribute('aria-expanded', item && item.classList.contains('is-open') ? 'true' : 'false');

      toggle.addEventListener('click', () => {
        const willOpen = item && !item.classList.contains('is-open');
        closeAll();
        if (willOpen) {
          item.classList.add('is-open');
          toggle.setAttribute('aria-expanded', 'true');
        }
      });
    });
  }

  function initPortfolioLightbox() {
    if (!document.querySelector('.js-lightbox')) return;

    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.setAttribute('aria-hidden', 'true');
    lightbox.innerHTML = `
      <div class="lightbox__panel" role="dialog" aria-modal="true" aria-label="Bildvorschau">
        <div class="lightbox__top">
          <div class="lightbox__title" id="lightboxTitle">Vorschau</div>
          <button class="lightbox__close" type="button" aria-label="Schliessen">×</button>
        </div>
        <img class="lightbox__img" id="lightboxImg" alt="" />
      </div>
    `;
    document.body.appendChild(lightbox);

    const imageEl = lightbox.querySelector('#lightboxImg');
    const titleEl = lightbox.querySelector('#lightboxTitle');
    const closeButton = lightbox.querySelector('.lightbox__close');

    function openLightbox(src, alt) {
      imageEl.src = src;
      imageEl.alt = alt || 'Vorschau';
      titleEl.textContent = alt || 'Vorschau';
      lightbox.classList.add('is-open');
      lightbox.setAttribute('aria-hidden', 'false');
      document.body.classList.add('no-scroll');
    }

    function closeLightbox() {
      lightbox.classList.remove('is-open');
      lightbox.setAttribute('aria-hidden', 'true');
      imageEl.src = '';
      document.body.classList.remove('no-scroll');
    }

    lightbox.addEventListener('click', (event) => {
      if (event.target === lightbox) closeLightbox();
    });
    closeButton.addEventListener('click', closeLightbox);
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && lightbox.classList.contains('is-open')) closeLightbox();
    });
    document.addEventListener('click', (event) => {
      const button = event.target.closest('.js-lightbox');
      if (!button) return;
      openLightbox(button.dataset.lightboxSrc, button.dataset.lightboxAlt);
    });
  }

  function shuffle(array) {
    for (let index = array.length - 1; index > 0; index -= 1) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [array[index], array[randomIndex]] = [array[randomIndex], array[index]];
    }
    return array;
  }
}());
