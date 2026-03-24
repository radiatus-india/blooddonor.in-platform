<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

render_page('Donate Blood', 'donate-blood.php', function (): void {
    $steps = [
        'Check eligibility and timing before donation.',
        'Understand the screening and consent process.',
        'Plan post-donation hydration and recovery.',
    ];
    ?>
    <section class="page-head">
        <div class="container">
            <p class="eyebrow">Donor education</p>
            <h1>Donation guidance starter.</h1>
            <p class="lede">A public-facing educational page gives contributors a concrete place to improve clarity and accessibility.</p>
        </div>
    </section>

    <section class="section">
        <div class="container two-up">
            <div class="panel">
                <h2>What this page demonstrates</h2>
                <ul class="check-list">
                    <?php foreach ($steps as $step): ?>
                        <li><?= htmlspecialchars($step) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="panel accent-panel">
                <h2>Future improvements</h2>
                <p>
                    Replace static guidance with medically reviewed content, location-aware donation center discovery,
                    and language support for wider adoption.
                </p>
            </div>
        </div>
    </section>
    <?php
});
