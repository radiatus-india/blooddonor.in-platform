<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

render_page('About', 'about.php', function (): void {
    ?>
    <section class="page-head">
        <div class="container">
            <p class="eyebrow">Project intent</p>
            <h1>Why this open source starter exists.</h1>
            <p class="lede">
                The public repository should help contributors understand the mission quickly while keeping sensitive
                operations and user data out of scope.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container two-up">
            <div class="panel">
                <h2>Public repository principles</h2>
                <ul class="check-list">
                    <li>No secrets, dumps, or environment-specific files</li>
                    <li>Clear contribution paths for design, code, and docs</li>
                    <li>Simple local setup with no external services required</li>
                </ul>
            </div>
            <div class="panel">
                <h2>What to build next</h2>
                <p>
                    Extend the starter with validation, routing, tests, and modular services once the contributor
                    workflow and repository standards are in place.
                </p>
            </div>
        </div>
    </section>
    <?php
});
