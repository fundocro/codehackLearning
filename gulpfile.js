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

elixir(function (mix) {
    mix.sass('app.scss')
    //inserting css and js files into gulp 
    .styles([
        'libs/blog-post.css',
        'libs/bootstrap.css',
        'libs/bootstrap.min.css',
        'libs/font-awesome.css',
        'libs/metisMenu.css',
        'libs/sb-admin-2.css',
        'libs/styles.css'
        
    ], './public/css/libs.css')//compile all files to here
    
    .scripts([
        'libs/bootstrap.js',    
        'libs/bootstrap.min.js',
        'libs/jquery.js',
        'libs/metisMenu.js',
        'libs/sb-admin-2.js',
        'libs/scripts.js'
        
    ],'./public/js/libs.js');//compile all files to here
    
    //in bash: gulp 
    //to actualy compile filles 
    //check public folder if new folders are created(css,js) and 
    //if files are in them
});
