# BloodDonor.in Platform

BloodDonor.in is an open source initiative focused on improving how blood donors, recipients, volunteers, and organizers coordinate during urgent and planned blood needs in India.

This repository is the public-safe application starter for the platform. It intentionally excludes production data, infrastructure configuration, private integrations, schema dumps, credentials, and operational tooling. The goal is to give contributors a clean base they can understand quickly and extend safely.

## Why this repository exists

Blood access is a coordination problem as much as a supply problem. The platform aims to support:

- emergency blood requests
- donor discovery by blood group and city
- donation awareness and eligibility guidance
- campaign and volunteer workflows
- transparent community contribution to a public-interest product

## Current scope

The repository currently contains a lightweight PHP starter that demonstrates:

- a mission-driven landing page
- donor search and request flow placeholders
- a donation guide page
- reusable layout and content helpers
- contributor-facing project standards

This is not the production system. It is the OSS-safe foundation for public collaboration.

## What is intentionally not included

- production databases or exports
- internal admin tools
- live API keys, secrets, or credentials
- deployment-specific server configuration
- third-party billing or messaging credentials
- private analytics or user data

## Project structure

```text
.
├── public/
│   ├── index.php
│   ├── find-donors.php
│   ├── request-blood.php
│   ├── donate-blood.php
│   ├── about.php
│   └── assets/
├── src/
│   ├── bootstrap.php
│   ├── content.php
│   └── view.php
└── .github/
```

## Local development

Requirements:

- PHP 8.1 or newer

Run locally with the built-in PHP server:

```bash
php -S localhost:8080 -t public
```

Then open <http://localhost:8080>.

## Repository hygiene

The repository includes a minimal GitHub Actions workflow that lints all PHP files on pushes and pull requests.

## Design principles

- public-interest software first
- privacy by default
- no hidden runtime dependencies for local setup
- contributor-friendly structure over framework lock-in
- simple starter now, modular architecture as the project grows

## Roadmap

- add a service layer for donor matching rules
- introduce environment-based configuration
- add form handling with validation and test coverage
- document API boundaries for future integrations
- add accessibility review and multilingual content support

## Contributing

Contributions are welcome, especially in:

- accessibility
- frontend UX for urgent workflows
- PHP architecture and testing
- localization for Indian languages
- documentation and onboarding

Start with [CONTRIBUTING.md](CONTRIBUTING.md).

## Maintainer contact

This public repository is currently coordinated by Esthar.

- Maintainer: Esthar
- Contact: info@radiatus.com

## Community standards

- [Code of Conduct](CODE_OF_CONDUCT.md)
- [Security Policy](SECURITY.md)

## License

[MIT](LICENSE)
