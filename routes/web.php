<?php

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
// Ho aggiunto il gruppo per  fare la traduzione delle lingue sftuttando una libreria esterna
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', 'HomeController@index')->name('public.home');
    Route::get('/contatti', 'HomeController@contatti')->name('contatti.show');
    Route::get('/grazie', 'HomeController@grazie')->name('contatti.grazie');
    Route::post('/contatti', 'HomeController@contattiStore')->name('contatti.store');
    Route::get('/blog', 'PostController@index')->name('blog');
    Route::get('/blog/{slug}', 'PostController@show')->name('blog.show');
    Route::get('/blog/categorie/{slug}', 'PostController@postCategoria')->name('blog.category');
    Route::get('/blog/tag/{slug}', 'PostController@postTag')->name('blog.tag');
});

// Genera tutte le rotte per la gestione dell'autenticazione (abbiamo disattivato la registrazione che verrà gestita nell' area admin)
Auth::routes(['register' => false]);

// Specifichiamo un gruppo di route che condividono una serie di comandi,  come per esempio il fatto che possono essere visualizzati solo sesi è loggati
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts', 'PostController');
    Route::get('/account', 'HomeController@account')->name('account');
});
