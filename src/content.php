<?php

declare(strict_types=1);

function app_stats(): array
{
    return [
        ['label' => 'Core flows', 'value' => '4'],
        ['label' => 'Public pages', 'value' => '5'],
        ['label' => 'Private data included', 'value' => '0'],
    ];
}

function blood_groups(): array
{
    return ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
}

function supported_cities(): array
{
    return ['Delhi', 'Mumbai', 'Bengaluru', 'Chennai', 'Hyderabad', 'Kolkata'];
}

function roadmap_items(): array
{
    return [
        'Donor availability and eligibility workflow',
        'Request verification and audit trail',
        'Campaign coordination for local drives',
        'Localization and accessibility improvements',
    ];
}

function donor_search_hints(): array
{
    return [
        'Match by blood group and city first.',
        'Surface urgency and contact expectations clearly.',
        'Protect private contact details until verification is in place.',
    ];
}

