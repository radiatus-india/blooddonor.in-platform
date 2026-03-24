<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

function evaluate_donor_eligibility(array $answers): array
{
    $reasons = [];

    if (($answers['age_range'] ?? '') !== 'yes') {
        $reasons[] = 'Donors should generally be within the accepted age range set by local guidelines.';
    }

    if (($answers['weight_ok'] ?? '') !== 'yes') {
        $reasons[] = 'Minimum weight requirements help keep donation safe for the donor.';
    }

    if (($answers['feeling_well'] ?? '') !== 'yes') {
        $reasons[] = 'Feeling unwell is a reason to postpone donation and consult medical staff.';
    }

    if (($answers['recent_donation'] ?? '') === 'yes') {
        $reasons[] = 'A recent whole blood donation may require a waiting period before donating again.';
    }

    if (($answers['recent_tattoo'] ?? '') === 'yes') {
        $reasons[] = 'Recent tattoos or piercings may require a deferral period depending on local policy.';
    }

    if ($reasons !== []) {
        return [
            'status' => 'not_ready',
            'title' => 'You may need to wait before donating.',
            'summary' => 'This quick self-check suggests you should confirm eligibility with a licensed blood center or clinician.',
            'reasons' => $reasons,
        ];
    }

    return [
        'status' => 'ready',
        'title' => 'You appear ready for the next step.',
        'summary' => 'Based on this self-check, you can move forward to a formal screening with a blood bank or donation center.',
        'reasons' => [
            'Bring a government-issued ID if required locally.',
            'Hydrate well and eat a light meal before your appointment.',
            'Final eligibility is always determined by medical staff.',
        ],
    ];
}

function submitted_answer(string $key): string
{
    return $_POST[$key] ?? '';
}

$eligibilityResult = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eligibilityResult = evaluate_donor_eligibility([
        'age_range' => submitted_answer('age_range'),
        'weight_ok' => submitted_answer('weight_ok'),
        'feeling_well' => submitted_answer('feeling_well'),
        'recent_donation' => submitted_answer('recent_donation'),
        'recent_tattoo' => submitted_answer('recent_tattoo'),
    ]);
}

render_page('Donate Blood', 'donate-blood.php', function () use ($eligibilityResult): void {
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

    <section class="section">
        <div class="container two-up">
            <form class="panel form-grid" method="post" action="<?= htmlspecialchars(app_url('donate-blood.php')) ?>">
                <div>
                    <p class="eyebrow">Self-check</p>
                    <h2>Donation eligibility quick check</h2>
                    <p class="lede">
                        This is a simple public-facing feature for contributors to improve. It does not replace medical screening.
                    </p>
                </div>

                <label for="age_range">Are you within the locally accepted donor age range?</label>
                <select id="age_range" name="age_range" required>
                    <option value="">Select an answer</option>
                    <option value="yes" <?= submitted_answer('age_range') === 'yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="no" <?= submitted_answer('age_range') === 'no' ? 'selected' : '' ?>>No</option>
                </select>

                <label for="weight_ok">Do you meet the minimum donor weight requirement?</label>
                <select id="weight_ok" name="weight_ok" required>
                    <option value="">Select an answer</option>
                    <option value="yes" <?= submitted_answer('weight_ok') === 'yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="no" <?= submitted_answer('weight_ok') === 'no' ? 'selected' : '' ?>>No</option>
                </select>

                <label for="feeling_well">Are you feeling well today?</label>
                <select id="feeling_well" name="feeling_well" required>
                    <option value="">Select an answer</option>
                    <option value="yes" <?= submitted_answer('feeling_well') === 'yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="no" <?= submitted_answer('feeling_well') === 'no' ? 'selected' : '' ?>>No</option>
                </select>

                <label for="recent_donation">Have you donated whole blood recently?</label>
                <select id="recent_donation" name="recent_donation" required>
                    <option value="">Select an answer</option>
                    <option value="no" <?= submitted_answer('recent_donation') === 'no' ? 'selected' : '' ?>>No</option>
                    <option value="yes" <?= submitted_answer('recent_donation') === 'yes' ? 'selected' : '' ?>>Yes</option>
                </select>

                <label for="recent_tattoo">Have you had a recent tattoo or piercing?</label>
                <select id="recent_tattoo" name="recent_tattoo" required>
                    <option value="">Select an answer</option>
                    <option value="no" <?= submitted_answer('recent_tattoo') === 'no' ? 'selected' : '' ?>>No</option>
                    <option value="yes" <?= submitted_answer('recent_tattoo') === 'yes' ? 'selected' : '' ?>>Yes</option>
                </select>

                <button class="button button-primary" type="submit">Check eligibility</button>
            </form>

            <div class="panel">
                <p class="eyebrow">Result</p>
                <?php if ($eligibilityResult === null): ?>
                    <h2>No check submitted yet.</h2>
                    <p class="lede">Submit the form to see a basic eligibility response and next-step guidance.</p>
                <?php else: ?>
                    <div class="result-card result-card-<?= htmlspecialchars($eligibilityResult['status']) ?>">
                        <h2><?= htmlspecialchars($eligibilityResult['title']) ?></h2>
                        <p><?= htmlspecialchars($eligibilityResult['summary']) ?></p>
                        <ul class="check-list">
                            <?php foreach ($eligibilityResult['reasons'] as $reason): ?>
                                <li><?= htmlspecialchars($reason) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
});
