<?php
$projects = [
    [
        'title' => 'Ed Sheeran',
        'subtitle' => 'To celebrate Ed\'s new release we shipped a browser-based butterfly hunt where fans trade greenhouse codes to unlock collectibles.',
        'techniques' => 'Vue.js · State Management · Authentication',
        'images' => [
            'public/images/projects/2025/edsheeran_1.png',
            'public/images/projects/2025/edsheeran_2.png',
            'public/images/projects/2025/edsheeran_3.png',
        ],
    ],
    [
        'title' => 'Martin Garrix',
        'subtitle' => 'EURO2020 DreamTeam experience that lets fans compose FUT-style artist rosters with synced Spotify previews.',
        'techniques' => 'Vue.js · Spotify API · Localization',
        'images' => [
            'public/images/projects/2025/artistdreamteam(1).jpg',
            'public/images/projects/2025/artistdreamteam(2).jpg',
            'public/images/projects/2025/artistdreamteam_iphone11pro_1.jpg',
        ],
    ],
    [
        'title' => 'Ricoh',
        'subtitle' => 'Flexible WordPress theme powering 11 franchisers with tightly guided ACF-powered content editing.',
        'techniques' => 'Custom WordPress · Custom Forms · WooCommerce',
        'images' => [
            'public/images/projects/2025/ricoh_desktop(1).png',
            'public/images/projects/2025/ricoh_desktop(2).png',
            'public/images/projects/2025/ricoh_desktop(3).png',
        ],
    ],
    [
        'title' => 'IkStopNu · Trimbos',
        'subtitle' => 'Custom Google Maps layer on the existing WordPress site so visitors can pinpoint vetted local coaching options.',
        'techniques' => 'WordPress · Google Maps API · Accessibility',
        'images' => [
            'public/images/projects/2025/ikstopnu_desktop_1.png',
            'public/images/projects/2025/ikstopnu_desktop_2.png',
            'public/images/projects/2025/ikstopnu_iphone11pro.png',
        ],
    ],
    [
        'title' => 'RTL · Project Glimlach',
        'subtitle' => 'Nuxt and Storyblok campaign site that gives producers drag-and-drop storytelling blocks for new charity stories.',
        'techniques' => 'Nuxt · Storyblok CMS · Static Hosting',
        'images' => [
            'public/images/projects/2025/www.rtlprojectglimlach.nl-1636641093687.png',
            'public/images/projects/2025/www.rtlprojectglimlach.nl-1636641113028.png',
            'public/images/projects/2025/www.rtlprojectglimlach.nl-1636641130842.png',
        ],
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pim Willems - Developer and lecturer</title>
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <style>
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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "IBM Plex Mono", "SFMono-Regular", Menlo, Consolas, monospace;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.05), transparent 60%), var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        main {
            max-width: 900px;
            margin: 0 auto;
            padding: 4rem 1.25rem 5rem;
        }

        header {
            margin-bottom: 4rem;
        }

        h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            margin: 0 0 1rem;
            line-height: 1.1;
        }

        h2 {
            margin: 0.2rem 0 0.4rem;
            font-size: 1.4rem;
        }

        p {
            max-width: 70ch;
        }

        .project {
            border-top: 1px solid var(--border);
            padding: 2.5rem 0;
        }

        .project:first-of-type {
            border-top: none;
        }

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

        .tech {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 999px;
            font-size: 0.9rem;
            color: var(--muted);
        }

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

        .note {
            font-size: 0.95rem;
            color: var(--muted);
            margin-top: 0.5rem;
        }

        .intro-links {
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

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

        footer {
            margin-top: 4rem;
            border-top: 1px solid var(--border);
            padding-top: 1.5rem;
            color: var(--muted);
            font-size: 0.95rem;
        }

        @media (max-width: 640px) {
            body {
                font-size: 0.95rem;
            }
            .theme-toggle {
                top: 0.75rem;
                right: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <button class="theme-toggle" id="theme-toggle">switch mode</button>
    <main>
        <header>
            <h1>Hello, I still build things.</h1>
            <p>
                I spent almost a decade shipping web products before jumping head-first into public education.
                I am now a lecturer and coordinator at Fontys ICT.
                Here are five web products that I am proud of.
            </p>
            <p class="note">Call it simple, call it honest. This page is an homage to <a href="https://thebestmotherfucking.website/" target="_blank" rel="noreferrer">the best motherfucking website</a>.</p>
            <div class="intro-links">
                <a class="social-link" href="https://www.linkedin.com/in/pimwillems-frontend-developer/" target="_blank" rel="noreferrer" aria-label="Connect on LinkedIn">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M20.45 20.45h-3.55v-5.58c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.95v5.67H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.62 0 4.29 2.38 4.29 5.47v6.27zM5.34 7.43a2.06 2.06 0 110-4.12 2.06 2.06 0 010 4.12zM7.12 20.45H3.56V9h3.56v11.45z"/>
                    </svg>
                    <span>LinkedIn</span>
                </a>
            </div>
        </header>

        <?php foreach ($projects as $project): ?>
            <article class="project">
                <h2><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p><?php echo htmlspecialchars($project['subtitle'], ENT_QUOTES, 'UTF-8'); ?></p>
                <div class="gallery">
                    <?php foreach ($project['images'] as $image): ?>
                        <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?> screenshot">
                    <?php endforeach; ?>
                </div>
                <span class="tech">Techniques used: <?php echo htmlspecialchars($project['techniques'], ENT_QUOTES, 'UTF-8'); ?></span>
            </article>
        <?php endforeach; ?>

        <footer>
            Built with plain PHP and zero frameworks because sometimes <em>simple</em> really is best.
        </footer>
    </main>

    <script>
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
    </script>
    <!-- 100% privacy-first analytics -->
    <script data-collect-dnt="true" async src="https://scripts.simpleanalyticscdn.com/latest.js"></script>
    <noscript><img src="https://queue.simpleanalyticscdn.com/noscript.gif?collect-dnt=true" alt="" referrerpolicy="no-referrer-when-downgrade"/></noscript>
</body>
</html>
