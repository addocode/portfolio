  <header class="site-header" id="top">
    <!-- Fonts (nahe an den Screenshots) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <div class="container nav">
      <a class="brand" href="/" aria-label="Zur Startseite">
        <img class="brand__logo" src="/assets/img/ad_logo.svg" alt="Adam Dolinsky" />
        <span class="brand__name">Adam Dolinsky</span>
      </a>

      <nav class="nav__links" aria-label="Hauptnavigation">
        <a href="/temppage">Leistungen</a>
        <a href="/portfolio">Portfolio</a>
        <a href="/temppage">Über mich</a>
      </nav>

      <a class="btn btn--dark nav__cta" href="mailto:adam@dolinsky.ch">Projekt starten</a>

      <button class="nav__burger" type="button" aria-label="Menü öffnen" aria-controls="mobileMenu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
      <div class="mobile-menu__panel">
        <div class="mobile-menu__top">
          <a class="brand brand--mobile" href="/" aria-label="Zur Startseite">
            <img class="brand__logo" src="/assets/img/ad_logo.svg" alt="Adam Dolinsky" />
            <span class="brand__name">Adam Dolinsky</span>
          </a>
          <button class="mobile-menu__close" type="button" aria-label="Menü schliessen">×</button>
        </div>

        <div class="mobile-menu__links">
          <a href="/temppage">Leistungen</a>
          <a href="/portfolio">Portfolio</a>
          <a href="/temppage">Über mich</a>
        </div>

        <a class="btn btn--dark btn--block" href="mailto:adam@dolinsky.ch">Projekt starten</a>
      </div>
    </div>
  </header>
