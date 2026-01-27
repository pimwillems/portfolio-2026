# portfolio-2026

Minimalist PHP portfolio that recreates the look and tone of Pim Willems' public site while keeping the markup lean and framework-free. The page lists five flagship projects, pulls in local screenshots, and preserves the playful “best motherf

## What Was Done
- Rebuilt the hero/intro and project list in plain PHP using data structures instead of hard-coded HTML.
- Sourced copy and imagery from https://pimwillems.dev/ and downloaded the referenced assets into `public/images/projects/2025` for offline-friendly hosting.
- Added a connected LinkedIn pill under the intro and a manual light/dark mode toggle that persists via `localStorage`.
- Installed a RealFaviconGenerator kit (SVG/PNG/ICO + manifest) and wired all `<link>` tags in the document `<head>`.
- Embedded Simple Analytics (privacy-first, DNT-aware) right before `</body>`.

## Tech Stack
- PHP 8+ (no frameworks, no build step)
- Vanilla CSS (defined inline in `index.php`)
- Simple Analytics script snippet

## Running Locally
```bash
php -S localhost:8000
```

Then open http://localhost:8000/index.php.

## Structure
- `index.php` – single entry point containing the project data, markup, styles, and theme toggle script.
- `public/` – static assets (project imagery, favicon set, manifests).
- `.gitignore` – keeps `public/images/` bulk assets optional and ignores macOS leftovers.

Feel free to swap in new projects by editing the `$projects` array at the top of `index.php` and dropping replacement images into `public/images/projects/2025` (or another subfolder, just update the paths). For additional analytics or embeds, follow the existing pattern near the bottom of the file.
