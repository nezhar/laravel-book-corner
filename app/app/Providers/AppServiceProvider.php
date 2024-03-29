<?php

namespace App\Providers;

use CloudCreativity\LaravelJsonApi\LaravelJsonApi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		LaravelJsonApi::defaultApi( 'v1' );
	}
}
