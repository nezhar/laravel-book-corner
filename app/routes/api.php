<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
	return $request->user();
} );

JsonApi::register( 'v1' )->routes( function ( $api ) {
    $api->resource( 'authors' )->relationships( function ( $relations ) {
        $relations->hasMany( 'books' );
    } );
	$api->resource( 'books' )->relationships( function ( $relations ) {
		$relations->hasOne( 'publisher' );
        $relations->hasMany( 'authors' );
        $relations->hasMany( 'categories');
        $relations->hasMany( 'tags' );
        $relations->hasMany( 'users' );
	} )->routes(function ($books) {
	    $books->get('stats', 'StatsController@stats');
    });
	$api->resource( 'bookuser' )->relationships( function ( $relations ) {
		$relations->hasOne( 'book' );
		$relations->hasOne( 'user' );
	} );
	$api->resource( 'categories' )->relationships( function ( $relations ) {
		$relations->hasMany( 'books' );
	} );
	$api->resource( 'publishers' )->relationships( function ( $relations ) {
		$relations->hasMany( 'books' );
	} );
	$api->resource( 'tags' )->relationships( function ( $relations ) {
		$relations->hasMany( 'books' );
	} );
	$api->resource( 'users' )->relationships( function ( $relations ) {
        $relations->hasMany( 'books' );
    } );
} );


