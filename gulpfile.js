var elixir = require('laravel-elixir');

var node_path = '../../../node_modules',
	bootstrap_path = node_path + '/bootstrap/dist';

elixir(function(mix) {
    
	mix.styles([
			bootstrap_path + '/css/bootstrap.css',
			node_path + '/font-awesome/css/font-awesome.css',
			'style.css'
		], 'public/css/app.css');

	mix.scripts([
			node_path + '/jquery/dist/jquery.js',
			bootstrap_path + '/js/bootstrap.js',
			'note.js'
		], 'public/js/app.js');

});
