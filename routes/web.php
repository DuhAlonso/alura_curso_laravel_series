<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/series');
});

//Se estiver nos padrões de nome de roata pode simplificar com 1 linha de código
Route::resource('/series', SeriesController::class)->except(['show']);

// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });

// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/criar', [SeriesController::class, 'create']);
// Route::post('/series/salvar', [SeriesController::class, 'store']);

//Route::post('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');