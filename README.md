# Parmezani Portfolio

WordPress portfolio theme with a light default mode and dark mode, based on the approved code comp.

## Development

```sh
npm install
npm run build
npm run watch-bs
```

BrowserSync proxies:

```txt
http://parmezani.sites.wp.gpzn.com
```

BrowserSync opens on port `3000` by default and will use a nearby available port if needed.

## Theme

The theme lives at:

```txt
wp-content/themes/parmezani
```

The home page layout is available as a selectable WordPress page template:

```txt
Template Home
```

Assign it to the WordPress page named `Home`, then set that page as the static
homepage in Settings > Reading.

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

The original static design comp has been moved to:

```txt
design-comp/
```
