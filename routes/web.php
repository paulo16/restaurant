<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PersonneController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.welcome');
})->name('accueil');

Route::get('menu', function () {
    return view('front.menu');
})->name('menu');


Route::get('reservation', [CommandeController::class, 'createCommande'])->name('reservation');

// Route::get('/admin', function () {
//     return view('layouts.admin.default');
// });


Route::get('/admin', [UserController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {

    Route::post('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/data', [UserController::class, 'data'])->name('user.data');
    Route::resource('user', UserController::class);
});

Route::group(['prefix' => 'admin'], function () {

    Route::post('personne/delete/{id}', [PersonneController::class, 'delete'])->name('personne.delete');
    Route::get('personne/data', [PersonneController::class, 'data'])->name('personne.data');
    Route::resource('personne', PersonneController::class);
});


Route::group(['prefix' => 'admin'], function () {
    //Categorie
    Route::post('categorie/delete/{id}', [CategorieController::class, 'delete'])->name('categorie.delete');
    Route::get('categorie/data', [CategorieController::class, 'data'])->name('categorie.data');
    Route::resource('categorie', CategorieController::class);
});


Route::group(['prefix' => 'admin'], function () {
    //Categorie
    Route::post('plat/delete/{id}', [PlatController::class, 'delete'])->name('plat.delete');
    Route::get('plat/data', [PlatController::class, 'data'])->name('plat.data');
    Route::resource('plat', PlatController::class);
});


Route::group(['prefix' => 'admin'], function () {
    //Categorie
    Route::post('commande/delete/{id}', [CommandeController::class, 'delete'])->name('commande.delete');
    Route::get('commande/data', [CommandeController::class, 'data'])->name('commande.data');
    Route::resource('commande', CommandeController::class);
});


Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::get('/admin/register', function () {
    return view('auth.register');
});