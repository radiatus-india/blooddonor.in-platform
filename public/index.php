<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

render_page('BloodDonor.in Platform', '/', function (): void {
    $stats = app_stats();
    $roadmap = roadmap_items();
    ?>
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <p class="eyebrow">Open source blood coordination starter</p>
                <h1>Build the public layer of a mission-critical blood donation platform.</h1>
                <p class="lede">
                    This repository captures the public-facing product direction without exposing real donor data,
                    internal operations, or deployment secrets.
                </p>
                <div class="hero-actions">
                    <a class="button button-primary" href="/find-donors.php">Explore donor search</a>
                    <a class="button button-secondary" href="/request-blood.php">View request flow</a>
                </div>
            </div>
            <div class="hero-card">
                <h2>Starter goals</h2>
                <ul>
                    <li>Readable structure for contributors</li>
                    <li>Safe public baseline for collaboration</li>
                    <li>Clear path toward production-grade workflows</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container stat-grid">
            <?php foreach ($stats as $stat): ?>
                <article class="stat-card">
                    <strong><?= htmlspecialchars($stat['value']) ?></strong>
                    <span><?= htmlspecialchars($stat['label']) ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container two-up">
            <div>
                <p class="eyebrow">What contributors can build next</p>
                <h2>Move from placeholder flows to verified coordination features.</h2>
            </div>
            <div>
                <ul class="check-list">
                    <?php foreach ($roadmap as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php
});

