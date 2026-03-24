<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

render_page('Find Donors', '/find-donors.php', function (): void {
    $groups = blood_groups();
    $cities = supported_cities();
    $hints = donor_search_hints();
    ?>
    <section class="page-head">
        <div class="container">
            <p class="eyebrow">Flow scaffold</p>
            <h1>Find donors by blood group and city.</h1>
            <p class="lede">This page is a placeholder UI for future matching logic and privacy-safe contact workflows.</p>
        </div>
    </section>

    <section class="section">
        <div class="container two-up">
            <form class="panel" action="#" method="get">
                <label for="blood_group">Blood group</label>
                <select id="blood_group" name="blood_group">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?= htmlspecialchars($group) ?>"><?= htmlspecialchars($group) ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="city">City</label>
                <select id="city" name="city">
                    <?php foreach ($cities as $city): ?>
                        <option value="<?= htmlspecialchars($city) ?>"><?= htmlspecialchars($city) ?></option>
                    <?php endforeach; ?>
                </select>

                <button class="button button-primary" type="submit">Search placeholder</button>
            </form>

            <div class="panel">
                <h2>Implementation notes</h2>
                <ul class="check-list">
                    <?php foreach ($hints as $hint): ?>
                        <li><?= htmlspecialchars($hint) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php
});

