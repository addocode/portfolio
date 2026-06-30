# dolinsky.ch Portfolio Website

Lightweight PHP portfolio website for [dolinsky.ch](https://dolinsky.ch). The site is intentionally simple, fast and suitable for classic FTP hosting. It should remain maintainable without introducing a framework or CMS.

## Project structure

```text
/
├── index.php                 # Homepage
├── header.php                # Shared header, brand and navigation markup
├── footer.php                # Shared footer, contact data and legal links
├── portfolio.php             # Portfolio overview
├── temppage.php              # Temporary placeholder page used by current navigation
├── leistungen.php            # Draft/alternate services page
├── impressum.php             # Legal notice
├── datenschutz.php           # Privacy policy
├── pages/                    # Individual project/case-study pages
├── assets/css/styles.css     # Main website styling
├── assets/js/site.js         # Shared frontend behaviour
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

## Deployment notes

- Upload the PHP files and the `assets/` directory to the web root of the hosting account.
- Do not upload development-only files such as `.git/`, local editor settings or temporary files.
- The `/invest` folder is intentionally ignored here because `invest.dolinsky.ch` is managed in a separate repository.

## Future improvement ideas

- Replace placeholder navigation targets (`/temppage`) with finished `leistungen.php` and `ueber-mich.php` content when ready.
- Expand portfolio case studies with concise problem/role/result sections for job applications.
- Add a small downloadable CV or application packet if appropriate.
- Review legal/privacy content before public use, especially if analytics or third-party embeds are added.
