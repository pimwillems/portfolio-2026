# Design Rules — pimwillems.dev style

Extracted from `index.php` so this look can be reproduced in other repos.

## Philosophy

Simple, honest, no-framework aesthetic. Homage to [thebestmotherfucking.website](https://thebestmotherfucking.website/):
plain content, monospace type, generous whitespace, no decoration for decoration's sake.

## Color tokens

Defined as CSS custom properties on `:root`, with automatic dark mode via `prefers-color-scheme` and a manual override via `body.theme-dark` / `body.theme-light` classes (toggled by JS + persisted in `localStorage`).

```css
:root {
    color-scheme: light dark;
    --bg: #f4f4ee;
    --text: #101010;
    --accent: #0070f3;
    --muted: #6c6c6c;
    --card: #ffffff;
    --border: rgba(16, 16, 16, 0.1);
}

@media (prefers-color-scheme: dark) {
    :root {
        --bg: #0c0c0c;
        --text: #f5f5f5;
        --accent: #53b0ff;
        --muted: #a0a0a0;
        --card: #161616;
        --border: rgba(255, 255, 255, 0.08);
    }
}

body.theme-dark {
    --bg: #0c0c0c;
    --text: #f5f5f5;
    --accent: #53b0ff;
    --muted: #a0a0a0;
    --card: #161616;
    --border: rgba(255, 255, 255, 0.08);
}

body.theme-light {
    --bg: #f4f4ee;
    --text: #101010;
    --accent: #0070f3;
    --muted: #6c6c6c;
    --card: #ffffff;
    --border: rgba(16, 16, 16, 0.1);
}
```

| Token | Light | Dark | Usage |
|---|---|---|---|
| `--bg` | `#f4f4ee` (warm off-white) | `#0c0c0c` (near black) | page background |
| `--text` | `#101010` | `#f5f5f5` | body text |
| `--accent` | `#0070f3` (blue) | `#53b0ff` (lighter blue) | links, icon fills, hover borders |
| `--muted` | `#6c6c6c` | `#a0a0a0` | secondary text (subtext, tags, footer) |
| `--card` | `#ffffff` | `#161616` | pill/button backgrounds |
| `--border` | `rgba(16,16,16,0.1)` | `rgba(255,255,255,0.08)` | hairline borders, dividers |

Background also gets a subtle radial highlight:
```css
background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.05), transparent 60%), var(--bg);
```

## Typography

- Font stack: `"IBM Plex Mono", "SFMono-Regular", Menlo, Consolas, monospace` — monospace everywhere, including body copy.
- Body `line-height: 1.6`.
- `h1`: `font-size: clamp(2.5rem, 6vw, 4rem)`, `line-height: 1.1`, `margin: 0 0 1rem`. Fluid/responsive via `clamp()`.
- `h2`: `font-size: 1.4rem`, `margin: 0.2rem 0 0.4rem`.
- Body paragraphs capped at `max-width: 70ch` for readability.
- Secondary/note text: `font-size: 0.95rem`, color `var(--muted)`.
- Mobile (`max-width: 640px`): base body `font-size: 0.95rem`.

## Layout

- `* { box-sizing: border-box; }`
- Single-column content wrapper:
  ```css
  main {
      max-width: 900px;
      margin: 0 auto;
      padding: 4rem 1.25rem 5rem;
  }
  ```
- `header` bottom margin `4rem` to separate intro from content list.
- Repeating content blocks (e.g. project entries) use a top-border divider pattern, not cards:
  ```css
  .project {
      border-top: 1px solid var(--border);
      padding: 2.5rem 0;
  }
  .project:first-of-type { border-top: none; }
  ```
- `footer` echoes the same divider treatment: `border-top`, `margin-top: 4rem`, `padding-top: 1.5rem`, muted color.

## Components

### Image gallery grid
```css
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}
.gallery img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid var(--border);
    transition: transform 200ms ease, filter 200ms ease;
}
.gallery img:hover {
    transform: translateY(-4px);
    filter: saturate(1.05);
}
```
Auto-responsive grid (no media query needed), subtle lift + saturation boost on hover.

### Pill / tag ("chip")
```css
.tech {
    display: inline-block;
    padding: 0.35rem 0.75rem;
    border: 1px solid var(--border);
    border-radius: 999px;
    font-size: 0.9rem;
    color: var(--muted);
}
```
Fully rounded (`border-radius: 999px`), hairline border, no fill, muted text. This pill shape is reused for the theme toggle and social links.

### Buttons / links as pills
```css
.social-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.4rem 0.9rem;
    border: 1px solid var(--border);
    border-radius: 999px;
    background: var(--card);
    color: var(--text);
    font-size: 0.9rem;
    text-decoration: none;
    transition: transform 180ms ease, border-color 180ms ease;
}
.social-link svg {
    width: 18px;
    height: 18px;
    fill: var(--accent);
}
.social-link:hover {
    transform: translateY(-2px);
    border-color: var(--accent);
}
```
Icon + label pill, `--card` background, icon tinted with `--accent`. Hover = lift + border turns accent color (no background/color change).

### Floating theme toggle
```css
.theme-toggle {
    position: fixed;
    top: 1.25rem;
    right: 1.25rem;
    border: 1px solid var(--border);
    background: var(--card);
    color: var(--text);
    padding: 0.5rem 0.9rem;
    border-radius: 999px;
    font-size: 0.9rem;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}
```
Same pill treatment, fixed top-right, soft large-blur shadow for a "floating" feel. On mobile, tighten offsets to `top/right: 0.75rem`.

## Motion

All transitions are short and easing-based, never abrupt:
- Hover lifts: `transform: translateY(-2px to -4px)` combined with `transition: transform 180–200ms ease`.
- Border/color changes: `180–200ms ease` alongside the transform.
- No animations beyond hover-triggered micro-interactions.

## Dark mode implementation pattern

1. Default to system preference via `color-scheme: light dark` + `@media (prefers-color-scheme: dark)`.
2. Allow manual override via `body.theme-dark` / `body.theme-light` classes that redeclare the same custom properties (specificity beats the media query).
3. Persist user choice in `localStorage` under key `theme-mode`; apply stored class on load.
4. Toggle button cycles dark ⇄ light, swapping body classes.

```js
const toggle = document.getElementById('theme-toggle');
const storedTheme = localStorage.getItem('theme-mode');
if (storedTheme) {
    document.body.classList.add(`theme-${storedTheme}`);
}

toggle.addEventListener('click', () => {
    const current = document.body.classList.contains('theme-dark') ? 'dark'
        : document.body.classList.contains('theme-light') ? 'light'
        : null;
    const next = current === 'dark' ? 'light' : 'dark';
    document.body.classList.remove('theme-dark', 'theme-light');
    document.body.classList.add(`theme-${next}`);
    localStorage.setItem('theme-mode', next);
});
```

## Spacing scale in use

Observed increments (rem): `0.2, 0.35, 0.4, 0.5, 0.75, 0.9, 1, 1.25, 1.5, 2.5, 4, 5`. No formal scale system — values are chosen ad hoc but stay within this set. Favor `rem` for spacing/type, `px` only for hairline borders, icon sizes, and image row-height (`180px`).

## Border radius scale

- `6px` — images/thumbnails (soft square)
- `999px` — pills/buttons/badges/toggle (full round)

No in-between radius values are used.

## Assets / favicon set

Standard multi-format favicon setup, worth replicating:
```html
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />
```
