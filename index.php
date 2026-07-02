<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adam Dolinsky | Digital Content, Design & Web</title>
    <meta name="description" content="Digital Content, Design & Web — klar strukturiert, visuell stark, technisch präzise." />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css" />
  </head>
  <body>
    <!-- Top Navigation --> <?php include 'header.php'; ?>
    <!-- HERO (Desktop: Split, Mobile: Bild oben / Text unten) -->
    <section class="hero" aria-label="Hero">
      <div class="hero__grid">
        <!-- Left -->
        <div class="hero__left">
          <div class="hero__left-inner">
            <h1 class="hero__title"> Digital Content, <br> Design &amp; Web <span class="accent">klar</span>
              <span class="accent">strukturiert, visuell</span>
              <span class="accent">stark, technisch</span>
              <span class="accent">präzise.</span>
            </h1>
            <p class="hero__lead"> Ich unterstütze Unternehmen bei der Erstellung und <br> Umsetzung hochwertiger digitaler Inhalte — von Webdesign <br> und Content Creation bis zu Print- und Marketingmaterialien. </p>
            <div class="hero__actions">
              <a class="btn btn--dark" href="#kontakt">Projekt starten <span class="arrow">→</span>
              </a>
              <a class="btn btn--outline" href="portfolio">Portfolio ansehen</a>
            </div>
          </div>
        </div>
        <!-- Right -->
        <div class="hero__right" id="portfolio">
          <div class="slider" aria-label="Portfolio Slider">
            <button class="slider__arrow slider__arrow--left" type="button" aria-label="Vorheriges Bild">‹</button>
            <button class="slider__arrow slider__arrow--right" type="button" aria-label="Nächstes Bild">›</button>
            <div class="slider__track">
              <!-- Slider -->
              <img class="slider__img is-active" src="assets/img/slider/Laptop_1.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/Flyer_1.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/RollUps.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/Ad_Board.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/Laptop_2.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/Monitor.jpg" alt="Slider">
              <img class="slider__img" src="assets/img/slider/Flyer_2.jpg" alt="Slider">
            </div>
            <div class="slider__dots" role="tablist" aria-label="Slider Navigation">
              <button class="dot is-active" type="button" aria-label="Bild 1 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 2 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 3 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 4 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 5 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 6 anzeigen" role="tab"></button>
              <button class="dot" type="button" aria-label="Bild 7 anzeigen" role="tab"></button>
            </div>
          </div>
        </div>
      </div>
      <!-- Curved Divider (wie in den Screenshots) -->
      <div class="hero__wave" aria-hidden="true">
        <svg viewBox="0 0 1440 70" preserveAspectRatio="none">
          <path d="M0,40 C240,70 480,70 720,45 C960,20 1200,10 1440,25 L1440,70 L0,70 Z"></path>
        </svg>
      </div>
    </section>
    <!-- LEISTUNGEN -->
    <section class="section" id="leistungen" aria-label="Leistungen">
      <div class="container">
        <h2 class="section__title">Leistungen</h2>
        <p class="section__subtitle"> Umfassende digitale Lösungen aus einer Hand — von Content bis Design, von <br> Web bis Print. </p>
        <div class="cards">
          <article class="card">
            <div class="card__icon card__icon--blue" aria-hidden="true">
              <!-- simple pen icon -->
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M4 20h4l10-10a2 2 0 0 0 0-3l-1-1a2 2 0 0 0-3 0L4 16v4z" stroke="white" stroke-width="2" stroke-linejoin="round" />
                <path d="M13 7l4 4" stroke="white" stroke-width="2" stroke-linecap="round" />
              </svg>
            </div>
            <h3>Digital Content</h3>
            <p>Erstellung von visuellen und digitalen Inhalten für Websites und Kampagnen.</p>
            <a class="card__link" href="#kontakt">Mehr erfahren <span class="arrow">→</span>
            </a>
          </article>
          <article class="card">
            <div class="card__icon card__icon--dark" aria-hidden="true">
              <!-- code icon -->
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M9 18l-6-6 6-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M15 6l6 6-6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3>Web &amp; CMS</h3>
            <p>Website-Pflege und Content Management mit technisch sauberer Umsetzung.</p>
            <a class="card__link" href="#kontakt">Mehr erfahren <span class="arrow">→</span>
            </a>
          </article>
          <article class="card">
            <div class="card__icon card__icon--red" aria-hidden="true">
              <!-- palette icon -->
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M12 3a9 9 0 1 0 0 18h2a3 3 0 0 0 0-6h-1a2 2 0 0 1 0-4h1a3 3 0 0 0 0-6h-2z" stroke="white" stroke-width="2" stroke-linejoin="round" />
                <circle cx="7.5" cy="11" r="1" fill="white" />
                <circle cx="9.5" cy="7.5" r="1" fill="white" />
                <circle cx="9.5" cy="14.5" r="1" fill="white" />
              </svg>
            </div>
            <h3>Design &amp; Print</h3>
            <p>Gestaltung von Logos, Flyern, Broschüren und professionellen Druckprodukten.</p>
            <a class="card__link" href="#kontakt">Mehr erfahren <span class="arrow">→</span>
            </a>
          </article>
          <article class="card">
            <div class="card__icon card__icon--gray" aria-hidden="true">
              <!-- camera icon -->
              <svg viewBox="0 0 24 24" fill="none">
                <path d="M4 7h3l2-2h6l2 2h3v12H4V7z" stroke="white" stroke-width="2" stroke-linejoin="round" />
                <circle cx="12" cy="13" r="3" stroke="white" stroke-width="2" />
              </svg>
            </div>
            <h3>Bildbearbeitung</h3>
            <p>Bildbearbeitung und visuelle Optimierung für konsistente Markenwirkung.</p>
            <a class="card__link" href="#kontakt">Mehr erfahren <span class="arrow">→</span>
            </a>
          </article>
        </div>
        <div class="center">
          <a class="btn btn--dark btn--wide" href="#leistungen">Alle Leistungen ansehen <span class="arrow">→</span>
          </a>
        </div>
      </div>
    </section>
    <!-- ÜBER MICH -->
    <section class="section section--alt" id="ueber-mich" aria-label="Über mich">
      <div class="container about">
        <div class="about__media">
          <div class="about__image">
            <img src="assets/img/ad_glacier.jpg" alt="Adam Dolinsky">
          </div>
          <div class="about__blob" aria-hidden="true"></div>
          <div class="about__blob about__blob--br" aria-hidden="true"></div>
        </div>
        <div class="about__content">
          <h2 class="about__title">Über mich</h2>
          <p> Ich bin Mediamatiker EFZ mit Berufsmatur und wohne in Bern. Weiterentwickelt habe <br> ich mich zum Digital Content &amp; Medienspezialist mit Fokus auf strukturierte, <br> visuell hochwertige und technisch saubere Umsetzung. </p>
          <p class="muted"> Meine Stärke liegt an der Schnittstelle von Design, Content und Web. Durch meine mehrjährige Tätigkeit im Marketing- und Medienbereich kenne ich sowohl die kreativen als auch die operativen Anforderungen moderner Unternehmen. </p>
          <div class="checks">
            <div class="check">
              <span class="check__icon">✓</span> Digitale Kampagnen
            </div>
            <div class="check">
              <span class="check__icon">✓</span> Adobe Creative Cloud
            </div>
            <div class="check">
              <span class="check__icon">✓</span> Web &amp; CMS
            </div>
            <div class="check">
              <span class="check__icon">✓</span> Printdesign
            </div>
          </div>
          <a class="btn btn--dark" href="/ueber-mich">Mehr über mich <span class="arrow">→</span>
          </a>
        </div>
      </div>
    </section>
    <!-- ARBEITSWEISE -->
    <section class="section" id="arbeitsweise" aria-label="Arbeitsweise">
      <div class="container">
        <h2 class="section__title">So arbeite ich</h2>
        <p class="section__subtitle">Strukturiert, zuverlässig und mit klarem Fokus auf Qualität und Konsistenz.</p>
        <div class="steps">
          <div class="step">
            <div class="step__num">1</div>
            <h3>Strukturiert</h3>
            <p>Klare Prozesse und methodisches <br>Vorgehen für effiziente <br>Projektabwicklung. </p>
          </div>
          <div class="step">
            <div class="step__num">2</div>
            <h3>Zuverlässig</h3>
            <p>Schnelle Einarbeitung in bestehende <br>Systeme und Prozesse. </p>
          </div>
          <div class="step">
            <div class="step__num">3</div>
            <h3>Qualitätsorientiert</h3>
            <p>Fokus auf Qualität, Klarheit und <br>konsistente Markenwirkung. </p>
          </div>
        </div>
        <div class="center">
          <a class="btn btn--outline btn--wide" href="#arbeitsweise">Mehr zur Arbeitsweise <span class="arrow">→</span>
          </a>
        </div>
      </div>
    </section>
    <!-- CTA / KONTAKT -->
    <section class="cta" id="kontakt" aria-label="Kontakt">
      <div class="cta__decor cta__decor--tl" aria-hidden="true"></div>
      <div class="cta__decor cta__decor--br" aria-hidden="true"></div>
      <div class="container cta__inner">
        <h2>Projekt geplant oder <br>Unterstützung benötigt? </h2>
        <p>Ich freue mich auf Ihre Anfrage. Gemeinsam setzen wir Ihre digitalen <br>Projekte um. </p>
        <div class="cta__actions">
          <a class="btn btn--light" href="mailto:adam@dolinsky.ch">Kontakt aufnehmen <span class="arrow">→</span>
          </a>
          <a class="btn btn--outline-light" href="portfolio">Portfolio ansehen</a>
        </div>
      </div>
    </section>
    <!-- FOOTER --> <?php include 'footer.php'; ?> 
     
    <script src="/assets/js/site.js"></script>
  </body>
</html>