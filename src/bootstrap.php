<?php

declare(strict_types=1);

require_once __DIR__ . '/content.php';
require_once __DIR__ . '/view.php';

function app_name(): string
{
    return 'BloodDonor.in Platform';
}

function app_base_url(): string
{
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $scriptDir = str_replace('\\', '/', dirname($scriptName));

    if ($scriptDir === '/' || $scriptDir === '.') {
        return '/';
    }

    return rtrim($scriptDir, '/') . '/';
}

function app_url(string $path = ''): string
{
    return app_base_url() . ltrim($path, '/');
}
