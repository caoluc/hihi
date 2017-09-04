var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    var assetPath = 'public/assets';
    var assetsCopy = [
        ['resources/assets/javascripts/', '/js'],
        ['node_modules/jquery/dist', '/js'],
        ['node_modules/bootstrap-sass/assets/fonts', '/fonts'],
        ['node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', '/js'],
        ['node_modules/font-awesome/fonts', '/font-awesome/fonts'],
        ['resources/assets/sass/admin', '/css'],
        ['node_modules/font-awesome/css', '/font-awesome/css'],
        ['node_modules/ionicons/fonts', '/ionicons/fonts'],
        ['node_modules/ionicons/css', '/ionicons/css'],
        ['vendor/almasaeed2010/adminlte/dist', '/adminlte'],
        ['vendor/almasaeed2010/adminlte/plugins', '/adminlte/plugins'],
    ];

    for (var i = 0; i < assetsCopy.length; i++) {
        mix.copy(assetsCopy[i][0], assetPath + assetsCopy[i][1]);
    }

    mix.sass('app.scss',  assetPath + '/css')
        .sass('admin.scss',  assetPath + '/css')
        .sass('bootstrap.scss',  assetPath + '/css')
});
