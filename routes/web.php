<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', function ()  {
    return view('vendor/swagger-lume/index.blade.php');
});
Route::get('offer/{id}','OfferController@getOfferByid');
Route::get('offer','OfferController@getAllOffer');
Route::post('offer','OfferController@createOffer');
Route::put('offer','OfferController@updateOffer');
Route::delete('offer','OfferController@deleteOffer');

Route::get('candidate/{id}','CandidateController@getCandidateByid');
Route::get('candidate','CandidateController@getAllCandidate');
Route::post('candidate','CandidateController@createCandidate');
Route::put('candidate','CandidateController@updateCandidate');
Route::delete('candidate','CandidateController@deleteCandidate');

Route::get('favorite/{id}','FavoriteController@getFavoriteByid');
Route::get('favorite','FavoriteController@getAllFavorite');
Route::post('favorite','FavoriteController@createFavorite');
Route::put('favorite','FavoriteController@updateFavorite');
Route::delete('favorite','FavoriteController@deleteFavorite');

Route::get('profile/{id}','ProfileController@getProfileByid');
Route::get('profile','ProfileController@getAllProfile');
Route::post('profile','ProfileController@createProfile');
Route::put('profile','ProfileController@updateProfile');
Route::delete('profile','ProfileController@deleteProfile');


