var elixir = require('laravel-elixir');
require('laravel-elixir-browser-sync-simple');

elixir(function (mix) {
    mix.sass('app.scss')
        .browserSync({
            files: [
                'public/css/*.css',                     // This is the one required to get the CSS to inject
                'resources/views/**/*.blade.php',       // Watch the views for changes & force a reload
                'app/**/*.php'                      // Watch the app files for changes & force a reload
            ],
            proxy: 'localhost',
            logPrefix: "Laravel Eixir BrowserSync",
            logConnections: false,
            reloadOnRestart: false,
            notify: false,
            open: true
        });
});
