<?php


use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
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
})->middleware(Autenticador::class);

//Se estiver nos padrões de nome de roata pode simplificar com 1 linha de código
Route::resource('/series', SeriesController::class)->except(['show']);

Route::get('series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index')->middleware(Autenticador::class);
Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index')->middleware(Autenticador::class);
Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('sigin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/users/user', [UsersController::class, 'create'])->name('users.create');
Route::post('/users/user', [UsersController::class, 'store'])->name('users.store');

Route::get('/mail', function (){
    return new \App\Mail\SeriesCreated(
        'Serie TEste',
        18,
        7,
        5
    );
});

// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });

// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/criar', [SeriesController::class, 'create']);
// Route::post('/series/salvar', [SeriesController::class, 'store']);

//Route::post('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');
