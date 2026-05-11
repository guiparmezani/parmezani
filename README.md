# Parmezani Portfolio

Custom WordPress portfolio site for Guilherme Parmezani. The current build is a mobile-first one-page portfolio theme with GSAP motion, ACF-editable content, light/dark themes, SEO/social metadata, and curated website screenshot assets for selected projects.

## Local Development

The local WordPress URL is:

```txt
http://parmezani.sites.wp.gpzn.com
```

BrowserSync proxies that local URL:

```sh
npm install
npm run build
npm run watch-bs
```

`npm run watch-bs` runs Sass, esbuild, and BrowserSync together. BrowserSync is configured for port `3000` and will fall back to the next available port if needed.

## Build Commands

```sh
npm run build      # Build CSS and JS
npm run build:css  # Compile SCSS to assets/css/main.css
npm run build:js   # Bundle JS to assets/js/main.js
npm run watch:css  # Watch SCSS only
npm run watch:js   # Watch JS only
npm run watch-bs   # Watch CSS, JS, and reload through BrowserSync
```

Source files:

```txt
wp-content/themes/parmezani/src/scss/main.scss
wp-content/themes/parmezani/src/js/main.js
```

Compiled files:

```txt
wp-content/themes/parmezani/assets/css/main.css
wp-content/themes/parmezani/assets/js/main.js
```

## Theme Structure

The active theme lives at:

```txt
wp-content/themes/parmezani
```

Important files:

```txt
template-home.php                 Home page template: "Template Home"
inc/acf.php                       ACF JSON integration and theme option helper
inc/content.php                   Homepage defaults and content helpers
inc/project-data.php              Project defaults and layout helpers
inc/seo.php                       Site title, description, OG, and Twitter tags
template-parts/                   Home page section partials
assets/images/brand/              Signature logo and favicon
assets/images/projects/screenshots/ Project screenshot fallback assets
assets/images/social/og-image.png Social share image
```

Assign `Template Home` to the WordPress page named `Home`, then set that page as the static homepage in **Settings > Reading**.

## ACF

ACF Pro is required. Field groups and the options page are stored in:

```txt
wp-content/themes/parmezani/acf-json/
```

Tracked ACF JSON:

```txt
group_parmezani_template_home.json      Home page content fields
group_parmezani_theme_settings.json     Global theme settings fields
ui_options_page_69fb5aed8cc7f.json      Theme Options page
```

Global settings are edited in WordPress at:

```txt
/wp-admin/admin.php?page=theme-options
```

Current global setting:

```txt
Default Theme: system | light | dark
```

The CMS default theme controls first load only. If a visitor uses the theme toggle, their browser `localStorage` preference overrides the CMS default on later visits.

## Content And Media

Most homepage content is editable through ACF on the `Home` page. Defaults remain in PHP so the template has a complete fallback if ACF values are empty.

Project images are website screenshots, not standalone client photography. The tracked fallback assets are in:

```txt
wp-content/themes/parmezani/assets/images/projects/screenshots/
```

The local WordPress Media Library also has imported copies assigned to the Home page ACF image fields. Those media-library assignments live in the local database/uploads and are not fully represented by git.

## Vultr VPS Deployment

Production is served from the Vultr VPS behind the shared Caddy proxy:

```txt
https://parmezani.com
https://www.parmezani.com -> redirects to https://parmezani.com
```

Server access:

```sh
ssh parmavps
```

Current production layout:

```txt
Local source: /Users/gparmezani/Sites/parmezani
VPS app path: /opt/parmezani
VPS Compose file: /opt/parmezani/docker-compose.production.yml
Shared proxy project: /opt/proxy/docker-compose.yml
Shared proxy network: public_proxy
Caddy route: /opt/caddy/sites/parmezani.caddy
```

This repo keeps the production Compose source in:

```txt
docker-compose.production.yml
```

Production secrets are not committed. The real environment file lives only on
the VPS:

```txt
/opt/parmezani/.env.production
```

The WordPress service joins `public_proxy` with this alias:

```txt
parmezani-wordpress
```

Caddy routes `parmezani.com` to `parmezani-wordpress:80`. The MariaDB service
stays on the private Compose network only and should not join `public_proxy` or
publish host ports.

Deploy from the VPS app path:

```sh
ssh parmavps 'cd /opt/parmezani && docker compose -f docker-compose.production.yml up -d'
```

Validate Caddy before reloading routing changes:

```sh
ssh parmavps 'docker exec proxy-caddy-1 caddy validate --config /etc/caddy/Caddyfile'
ssh parmavps 'docker exec proxy-caddy-1 caddy reload --config /etc/caddy/Caddyfile'
```

Smoke-test the origin route through local Caddy:

```sh
ssh parmavps 'curl -skI --resolve parmezani.com:443:127.0.0.1 https://parmezani.com/'
```

## SEO And Sharing

SEO/social metadata is generated in `inc/seo.php`.

Current title:

```txt
Guilherme Parmezani | Front-End & WordPress Developer
```

Current description:

```txt
Senior front-end and WordPress developer building polished, maintainable marketing sites with AI-assisted workflows for faster delivery and sharper execution.
```

Social sharing image:

```txt
wp-content/themes/parmezani/assets/images/social/og-image.png
```

The theme outputs Open Graph, Twitter card, image dimensions, image alt, theme color, canonical support through WordPress, and `max-image-preview:large`.

## Design Comp

The original static design comp is kept in:

```txt
design-comp/
```

The WordPress theme is the implementation source of truth.
