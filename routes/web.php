<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login.html', [
	"as" => "login",
	"uses" => 'LoginController@login'
]);

Route::get('/logout.html', [
	"as" => "logout",
	"uses" => 'LoginController@logout'
]);

Route::post('/connecter.html', [
	"as" => "connecter",
	"uses" => 'LoginController@connecter'
]);

Route::get('/', [
	"as" => "accueil",
	"uses" => 'AccueilController@index'
]);

Route::get('/installation', [
	"as" => "inst_1",
	"uses" => 'InstallController@index'
]);

Route::get('/mask', [
	"as" => "mask",
	"uses" => 'MaskController@mask'
]);

Route::post('/save_donne', [
	"as" => "save_donne",
	"uses" => 'MaskController@save_donne'
]);

Route::post('/recup_donne', [
	"as" => "recup_donne",
	"uses" => 'MaskController@recup_donne'
]);

Route::get('/liste', [
	"as" => "liste",
	"uses" => 'ListeController@liste'
]);

Route::post('liste/searche',[
	"as" => "searche_liste",
	"uses" => 'ListeController@searche'
]);

Route::post('/save', [
	"as" => "savePage",
	"uses" => 'IndexController@savePage'
]);

Route::get('/all.json', 'IndexController@allJson');

Route::get('/detailPg/{slug}', [
	"as" => "detailPg",
	"uses" => 'IndexController@detailPg'
]);

Route::get('/deletePg/{slug}', [
	"as" => "deletePg",
	"uses" => 'IndexController@deletePg'
]);

Route::match(['get','post'],'/editePg/{slug}', [
	"as" => "editePg",
	"uses" => 'IndexController@editePg'
]);