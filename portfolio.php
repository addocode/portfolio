<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adam Dolinsky | Portfolio</title>
  <meta name="description" content="Ausgewählte Projekte aus Web, Content und Print." />

  <!-- Fonts (wie auf der Hauptseite) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/styles.css" />

  <!-- Page-only styles (scoped) -->
  <style>
    /* --- Portfolio page (scoped) --- */
    .portfolio-page{ padding-top: 34px; }

    .portfolio{
      margin-top: 18px;
    }

    .portfolio__item{
      border: 1px solid var(--border);
      border-radius: 10px;
      margin-bottom: 14px;
      overflow: hidden;
      background: #fff;
      transition: box-shadow .2s ease, border-color .2s ease;
    }

    .portfolio__item.is-open{
      border-color: rgba(0,0,0,0.12);
      box-shadow: 0 12px 26px rgba(31,42,54,0.08);
    }

    .portfolio__toggle{
      width: 100%;
      background: #fff;
      border: 0;
      padding: 18px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 14px;
      font-size: 14px;
      font-weight: 700;
      cursor: pointer;
      text-align: left;
      color: #111827;
    }

    .portfolio__toggle:hover{ background: rgba(0,0,0,0.02); }

    .portfolio__icon{
      font-size: 20px;
      line-height: 1;
      flex: 0 0 auto;
      transition: transform .2s ease;
      color: rgba(17,24,39,.8);
    }

    .portfolio__item.is-open .portfolio__icon{ transform: rotate(45deg); }

    .portfolio__content{
      max-height: 0;
      overflow: hidden;
      transition: max-height .35s ease;
      border-top: 1px solid rgba(0,0,0,0.06);
    }

    .portfolio__item.is-open .portfolio__content{ max-height: 2000px; }

    .portfolio__inner{ padding: 16px 20px 22px; }

    .portfolio__innerTitle{
      font-family: Poppins, Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      font-size: 18px;
      letter-spacing: -0.02em;
      margin: 0 0 12px;
      color: #111827;
    }

    /* Desktop: Bild neben Text, Bild etwas schmaler */
    .portfolio__grid{
      display: flex;
      gap: 16px;
      align-items: flex-start; /* gleicher oberer Start */
    }

    .portfolio__media{
      flex: 0 0 42%;
      max-width: 42%;
    }

    .portfolio__media img{
      width: 100%;
      height: auto;
      display: block;
      border-radius: 10px;
      border: 1px solid rgba(0,0,0,0.08);
    }

    /* Text bleibt IMMER neben dem Bild (kein Unterlaufen) */
    .portfolio__text{
      flex: 1 1 0;
      min-width: 0;
      font-size: 11px;
      color: var(--muted);
      line-height: 1.65;
    }

    .portfolio__text p{ margin: 0 0 10px; }
    .portfolio__text ul{ margin: 0; padding-left: 18px; }
    .portfolio__text li{ margin: 6px 0; }

    /* Mobile: Bild oben, Text darunter */
    @media (max-width: 980px){
      .portfolio__grid{
        flex-direction: column !important;
        gap: 12px;
      }
      .portfolio__media{
        flex: 0 0 auto !important;
        max-width: 100% !important;
        width: 100% !important;
      }
      .portfolio__text{
        width: 100%;
      }
    }

    /* Small button size that matches existing buttons */
.btn--sm{
  padding: 10px 14px;
  font-size: 13px;
  border-radius: 10px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 12px;
}

/* Lightbox */
.lightbox{
  position: fixed;
  inset: 0;
  background: rgba(17,24,39,0.72);
  display: none;
  align-items: center;
  justify-content: center;
  padding: 18px;
  z-index: 9999;
}

.lightbox.is-open{ display: flex; }

.lightbox__panel{
  width: min(980px, 100%);
  background: #fff;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 30px 80px rgba(0,0,0,0.35);
}

.lightbox__top{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 14px;
  border-bottom: 1px solid rgba(0,0,0,0.08);
}

.lightbox__title{
  font-weight: 700;
  font-size: 13px;
  color: #111827;
}

.lightbox__close{
  width: 38px;
  height: 38px;
  border-radius: 10px;
  border: 1px solid rgba(0,0,0,0.12);
  background: #fff;
  cursor: pointer;
  font-size: 18px;
  line-height: 1;
}

.lightbox__img{
  display: block;
  width: 100%;
  height: auto;
}
  </style>
</head>

<body>
  <?php include 'header.php'; ?>

  <section class="section portfolio-page" aria-label="Portfolio">
    <div class="container">

      <h1 class="section__title">Ausgewählte Projekte</h1>
      <p class="section__subtitle">
        Eine kompakte Auswahl an Web-, Print- und Kampagnenarbeiten. Fragen Sie mich an, wenn Sie mehr erfahren möchten, denn diese Aufführung ist noch lange nicht alles.
      </p>

      <div class="portfolio">

        <!-- 1 -->
        <div class="portfolio__item is-open">
          <button class="portfolio__toggle" type="button" aria-expanded="true">
            <span>Eier Meier AG: Online-Shop</span>
            <span class="portfolio__icon" aria-hidden="true">+</span>
          </button>
          <div class="portfolio__content">
            <div class="portfolio__inner">
              <div class="portfolio__grid">
                <div class="portfolio__media">
                  <img src="assets/img/slider/Laptop_1.jpg" alt="Corporate Website auf Desktop-Mockup" loading="lazy">
                </div>
                <div class="portfolio__text">
                  <h3 class="portfolio__innerTitle">Vorschlag für Redesign des Onlineshops für <a href="https://eiermeier.ch" target="_blank">Eier Meier AG</a></h3>
                  <p>
                    Strukturierte Content-Pflege und Umsetzung von Web-Inhalten mit Fokus auf Klarheit,
                    konsistente Markenwirkung und technisch saubere Ausspielung.
                  </p>
                  <ul>
                    <li>Redesign anhand von bestehender Website mit Webshop</li>
                    <li>Aufbau der Seite in Webflow gemäss Kundenrücksprache</li>
                    <li>Export des Webcodes und Hochladen auf eigenständig geführtes Hosting</li>
                  </ul>
                  <a class="btn btn--dark btn--sm" href="/pages/portfolio-eier-meier-online-shop.php">Case Study ansehen <span class="arrow">→</span></a>
                  <a class="btn btn--outline btn--sm" href="https://easy.eiermeier.ch" target="_blank" rel="noopener">Website ansehen <span class="arrow">→</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 2 -->
        <div class="portfolio__item">
          <button class="portfolio__toggle" type="button" aria-expanded="false">
            <span>Eier Meier AG & Kräuterschwein: Roll-Ups</span>
            <span class="portfolio__icon" aria-hidden="true">+</span>
          </button>
          <div class="portfolio__content">
            <div class="portfolio__inner">
              <div class="portfolio__grid">
                <div class="portfolio__media">
                  <img src="assets/img/slider/RollUps.jpg" alt="RollUps Mockup" loading="lazy">
                </div>
                <div class="portfolio__text">
                  <h3 class="portfolio__innerTitle">Roll-Ups für <a href="https://kraeuterfleisch.ch" target="_blank">Kräuterschwein</a> und <a href="https://eiermeier.ch" target="_blank">Eier Meier AG</a></h3>
                  <p>
                    Gestaltung von Roll-Ups für Messe- und Verkaufsflächen — mit klarer Blickführung,
                    Lesbarkeit auf Distanz und druckfertiger Datenaufbereitung.
                  </p>
                  <ul>
                    <li>Layout und Typografie mit Hierarchie</li>
                    <li>Markenkonforme Bildwelt/Farben</li>
                    <li>Durchführung vom Konzept bis zum Versenden der Druckdaten an die Druckerei</li>
                  </ul>
                  <button class="btn btn--outline btn--sm js-lightbox" type="button" data-lightbox-src="assets/img/slider/RollUps.jpg" data-lightbox-alt="">Vorschau vergrössern <span class="arrow">↗</span></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3 -->
        <div class="portfolio__item">
          <button class="portfolio__toggle" type="button" aria-expanded="false">
            <span>FORS-Futter: Inserate und Onlinebanner für Schweizer Agrarmedien</span>
            <span class="portfolio__icon" aria-hidden="true">+</span>
          </button>
          <div class="portfolio__content">
            <div class="portfolio__inner">
              <div class="portfolio__grid">
                <div class="portfolio__media">
                  <img src="assets/img/slider/Ad_Board.jpg" alt="Ad Board / Digital Signage Mockup" loading="lazy">
                </div>
                <div class="portfolio__text">
                  <h3 class="portfolio__innerTitle">Inserat bzw. Plakat für <a href="https://fors-futter.ch" target="_blank">FORS-Futter</a></h3>
                  <p>
                    Gestaltung und Visualisierung für Screen-/Plakatflächen mit Fokus auf schnelle Erfassbarkeit,
                    starke Kontraste und klaren Call-to-Action bei gleichzeitiger Berücksichtigung von vorhandenen Designrichtlinien.
                  </p>
                  <ul>
                    <li>Headline- &amp; CTA-Hierarchie</li>
                    <li>Motiv-/Bildbearbeitung</li>
                    <li>Ausgabeformate für verschiedene Flächen</li>
                    <button class="btn btn--outline btn--sm js-lightbox" type="button" data-lightbox-src="assets/img/slider/Ad_Board.jpg" data-lightbox-alt="">Vorschau vergrössern <span class="arrow">↗</span></button>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Weitere Projekte werden wieder eingeblendet, sobald die Beschreibungen vollständig sind. -->

      </div>

    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script>
    // ===== Year
    const yearEl = document.getElementById('year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();

    // ===== Mobile menu
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
      menu.addEventListener('click', (e) => { if (e.target === menu) closeMenu(); });
      menu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));
    }

    // ===== Portfolio Accordion (nur ein Item gleichzeitig offen)
    const items = Array.from(document.querySelectorAll('.portfolio__item'));
    const toggles = Array.from(document.querySelectorAll('.portfolio__toggle'));

    function closeAll(){
      items.forEach((el) => el.classList.remove('is-open'));
      toggles.forEach((b) => b.setAttribute('aria-expanded', 'false'));
    }

    // initial aria state
    toggles.forEach((btn) => {
      const item = btn.closest('.portfolio__item');
      btn.setAttribute('aria-expanded', item && item.classList.contains('is-open') ? 'true' : 'false');
    });

    toggles.forEach((btn) => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.portfolio__item');
        const willOpen = item && !item.classList.contains('is-open');
        closeAll();
        if (willOpen) {
          item.classList.add('is-open');
          btn.setAttribute('aria-expanded', 'true');
        }
      });
    });

    (function(){
    // Create lightbox once
    const lb = document.createElement('div');
    lb.className = 'lightbox';
    lb.setAttribute('aria-hidden', 'true');
    lb.innerHTML = `
      <div class="lightbox__panel" role="dialog" aria-modal="true" aria-label="Bildvorschau">
        <div class="lightbox__top">
          <div class="lightbox__title" id="lightboxTitle">Vorschau</div>
          <button class="lightbox__close" type="button" aria-label="Schliessen">×</button>
        </div>
        <img class="lightbox__img" id="lightboxImg" alt="">
      </div>
    `;
    document.body.appendChild(lb);

    const imgEl = lb.querySelector('#lightboxImg');
    const titleEl = lb.querySelector('#lightboxTitle');
    const closeBtn = lb.querySelector('.lightbox__close');

    function openLightbox(src, alt){
      imgEl.src = src;
      imgEl.alt = alt || 'Vorschau';
      titleEl.textContent = alt || 'Vorschau';
      lb.classList.add('is-open');
      lb.setAttribute('aria-hidden', 'false');
      document.body.classList.add('no-scroll');
    }

    function closeLightbox(){
      lb.classList.remove('is-open');
      lb.setAttribute('aria-hidden', 'true');
      imgEl.src = '';
      document.body.classList.remove('no-scroll');
    }

    // Close on background click
    lb.addEventListener('click', (e) => {
      if (e.target === lb) closeLightbox();
    });

    // Close on button
    closeBtn.addEventListener('click', closeLightbox);

    // Close on ESC
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && lb.classList.contains('is-open')) closeLightbox();
    });

    // Bind buttons
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('.js-lightbox');
      if(!btn) return;
      openLightbox(btn.dataset.lightboxSrc, btn.dataset.lightboxAlt);
    });
  })();


  </script>
</body>
</html>
