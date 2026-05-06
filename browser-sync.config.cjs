module.exports = {
  proxy: "http://parmezani.sites.wp.gpzn.com",
  host: "localhost",
  port: 3000,
  open: true,
  notify: false,
  reloadDelay: 120,
  files: [
    "wp-content/themes/parmezani/**/*.php",
    "wp-content/themes/parmezani/assets/css/main.css",
    "wp-content/themes/parmezani/assets/js/main.js"
  ],
  watchOptions: {
    ignoreInitial: true
  }
};
