@servers(['localhost' => '127.0.0.1'])

@task('test', ['on' => 'localhost'])
	php artisan optimize:clear
@endtask