

const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');


mix.styles([

'resources/assets/css/libs/bootstrap.css',
'resources/assets/css/libs/bootstrap.min.css',
'resources/assets/css/libs/font-awesome.css',
'resources/assets/css/libs/font-awesome.min.css',
'resources/assets/css/libs/style.css'

],'public/css/libs.css');

mix.scripts([

	'resources/assets/js/libs/jquery-3.2.1.min.js',
	'resources/assets/js/libs/bootstrap.js',
	'resources/assets/js/libs/bootstrap.min.js',
	'resources/assets/js/libs/jquery.validate.js',
	'resources/assets/js/libs/custom.js',

],'public/js/libs.js');