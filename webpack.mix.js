const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

//pre-site resources
mix.combine([
    'resources/site/css/style.css',
    'resources/site/lib/animate/animate.css',
    'resources/site/lib/animate/animate.min.css',
    'resources/site/lib/owlcarousel/assets/owl.carousel.min.css',
    'resources/site/lib/ionicons/css/ionicons.min.css',
    'resources/site/lib/lightbox/css/lightbox.min.css',
    ], 'public/css/site.css');

    mix.combine([
    // 'resources/site/lib/jquery/jquery.min.js',
    // 'resources/site/lib/jquery/jquery-migrate.min.js',
    // 'resources/site/lib/popper/popper.min.js',
    // 'resources/site/contactform/contactform.js',
    'resources/site/lib/easing/easing.min.js',
    'resources/site/lib/mobile-nav/mobile-nav.js',
    'resources/site/lib/wow/wow.min.js',
    'resources/site/lib/waypoints/waypoints.min.js',
    'resources/site/lib/counterup/counterup.min.js',
    'resources/site/lib/owlcarousel/owl.carousel.min.js',
    'resources/site/lib/isotope/isotope.pkgd.min.js',
    'resources/site/lib/lightbox/js/lightbox.min.js',
    'resources/site/js/main.js'
    ], 'public/js/site.js');