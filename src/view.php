<?php

declare(strict_types=1);

function render_page(string $title, string $activePage, callable $content): void
{
    $navigation = [
        '/' => 'Home',
        '/find-donors.php' => 'Find Donors',
        '/request-blood.php' => 'Request Blood',
        '/donate-blood.php' => 'Donate Blood',
        '/about.php' => 'About',
    ];
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= htmlspecialchars($title) ?></title>
        <meta name="description" content="Open source starter for the BloodDonor.in public platform.">
        <link rel="stylesheet" href="/assets/css/app.css">
    </head>
    <body>
        <header class="site-header">
            <div class="container shell">
                <a class="brand" href="/">BloodDonor<span>.in</span></a>
                <nav class="nav">
                    <?php foreach ($navigation as $path => $label): ?>
                        <a class="<?= $activePage === $path ? 'is-active' : '' ?>" href="<?= $path ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </header>
        <main>
            <?php $content(); ?>
        </main>
        <footer class="site-footer">
            <div class="container footer-grid">
                <div>
                    <h2>Public-safe starter</h2>
                    <p>
                        This repository is designed for open collaboration and excludes production data,
                        secrets, and deployment internals.
                    </p>
                </div>
                <div>
                    <h2>Focus areas</h2>
                    <ul>
                        <li>Urgent request flows</li>
                        <li>Donor discovery UX</li>
                        <li>Accessible contribution paths</li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="/assets/js/app.js"></script>
    </body>
    </html>
    <?php
}

