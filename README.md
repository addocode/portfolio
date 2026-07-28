# dolinsky.ch Portfolio Website

Lightweight PHP portfolio website for [dolinsky.ch](https://dolinsky.ch). The site is intentionally simple, fast and suitable for classic FTP hosting. It should remain maintainable without introducing a framework or CMS.

## Project structure

```text
/
├── index.php                 # Homepage
├── header.php                # Shared header, brand and navigation markup
├── footer.php                # Shared footer, contact data and legal links
├── portfolio.php             # Portfolio overview
├── leistungen.php            # Draft/alternate services page
├── impressum.php             # Legal notice
├── datenschutz.php           # Privacy policy
├── pages/                    # Individual project/case-study pages
├── assets/css/styles.css     # Main website styling
├── assets/js/site.js         # Shared frontend behaviour
├── reise-stats.php           # Data-driven personal flight logbook
├── lib/FlightStats.php       # Markdown parser and flight statistics
├── data/airports.json        # Local coordinates for referenced IATA codes
├── tests/flight_stats_test.php # Reproducible regression checks
└── assets/img/               # Logos, photos and portfolio images
```

## Editing the website

- Edit `header.php` for global navigation, logo and the primary email call-to-action.
- Edit `footer.php` for contact details, legal links and footer navigation.
- Edit `assets/css/styles.css` for visual styling. Keep page-specific CSS small and scoped when possible.
- Edit `assets/js/site.js` for shared JavaScript such as the mobile menu, homepage slider, portfolio accordion and lightbox.
- Add new project pages under `pages/` and link to them from `portfolio.php`.
- Preserve current file names and URLs unless redirects are added on the server.

## Local checks

This project does not require a build step. Before uploading via FTP, run syntax checks if PHP is available:

```bash
find . -path './invest' -prune -o -name '*.php' -print -exec php -l {} \;
```

For a quick local preview, use PHP's built-in server:

```bash
php -S localhost:8000
```

Then open <http://localhost:8000> in a browser.

### Reise-Logbuch pflegen

`data/Flugdatenbank.md` ist die einzige Quelle für Flugsegmente. Neue Einträge werden
unter `Durchgeführte Flüge` oder `Geplante Flüge` im vorhandenen Routenformat ergänzt;
Jahres- und Reiseüberschriften bleiben als Gruppierung erhalten. Kennzahlen, Chronik
und Karte werden beim Seitenaufruf automatisch neu erzeugt.

Jeder neue IATA-Code benötigt zusätzlich einen Eintrag in `data/airports.json` mit
Name, Ort, ISO-Ländercode, Breitengrad und Längengrad. Die derzeitigen Koordinaten
stammen aus dem frei verfügbaren OurAirports-Datensatz (Abruf: 28.07.2026). Fehlt ein
Code, bricht der Parser bewusst mit einer eindeutigen Meldung ab, statt eine falsche
Distanz zu liefern. Insbesondere sind `NOU` (La Tontouta) und `GEA` (Magenta) getrennt.

Regressionstest ausführen:

```bash
php tests/flight_stats_test.php
```

Die Seite ist lokal unter <http://localhost:8000/reise-stats.php> erreichbar.

## Deployment notes

- Upload the PHP files and the `assets/` directory to the web root of the hosting account.
- Do not upload development-only files such as `.git/`, local editor settings or temporary files.
- The `/invest` folder is intentionally ignored here because `invest.dolinsky.ch` is managed in a separate repository.

## Future improvement ideas

- Build out dedicated `leistungen.php` and `ueber-mich.php` content when ready; visible navigation currently uses homepage anchors.
- Expand portfolio case studies with concise problem/role/result sections for job applications.
- Keep CV/application documents private; do not publish public downloadable application packets.
- Review legal/privacy content before public use, especially if analytics or third-party embeds are added.
