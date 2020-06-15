<?php

use Illuminate\Support\Facades\Route;

use App\Temas;
use App\Comentarios;

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

Route::get('/', function () {
    $capitulos=Temas::all();

    return view('welcome',[
        'capitulos' =>$capitulos,
    ]);
})->name('welcome');

Route::get('/foro', function () {
    return view('foro');
});

 Route::get('/foro/{foro}', function (Temas $foro) {

    $comentarios = Comentarios::where('tema_id', '=', $foro->id)->orderBy('like','desc')->get();
    return view('tema', compact('foro','comentarios'));

})->where('foro','[0-9]+')->name('foro.show');

Route::get('/user/{user}','HomeController@show')->where('user','[0-9]+')->name('users.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/foro/crear/{user}','HomeController@create')->where('user','[0-9]+')->name('foro.create');

Route::post('/foros/{user}','HomeController@store')->where('user','[0-9]+');

Route::get('/respuesta/crear/{user}/{foro}','HomeController@create2')->where('user','[0-9]+')->where('foro','[0-9]+')->name('respuesta.create');

Route::post('/respuesta/{user}/{foro}','HomeController@store2')->where('user','[0-9]+')->where('foro','[0-9]+')->name('respuesta.store');



