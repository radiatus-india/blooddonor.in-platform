<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/bootstrap.php';

render_page('Request Blood', 'request-blood.php', function (): void {
    ?>
    <section class="page-head">
        <div class="container">
            <p class="eyebrow">Urgent workflow</p>
            <h1>Blood request intake scaffold.</h1>
            <p class="lede">The current form is intentionally non-operational and contains no backend integrations.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <form class="panel form-grid" action="#" method="post">
                <label for="patient_name">Patient name</label>
                <input id="patient_name" name="patient_name" type="text" placeholder="Placeholder only">

                <label for="required_group">Required blood group</label>
                <select id="required_group" name="required_group">
                    <?php foreach (blood_groups() as $group): ?>
                        <option value="<?= htmlspecialchars($group) ?>"><?= htmlspecialchars($group) ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="hospital">Hospital</label>
                <input id="hospital" name="hospital" type="text" placeholder="Hospital or care center">

                <label for="urgency">Urgency</label>
                <select id="urgency" name="urgency">
                    <option>Critical</option>
                    <option>High</option>
                    <option>Planned</option>
                </select>

                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="5" placeholder="No submissions are stored in this starter."></textarea>

                <button class="button button-primary" type="submit">Submit placeholder</button>
            </form>
        </div>
    </section>
    <?php
});
