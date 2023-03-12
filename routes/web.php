<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\libController;
use App\Models\library;

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
    $libs = library::all();
    return view('welcome', compact('libs'));
});

Route::get('/detail/{id_buku}', function ($id_buku) {
    $lib = library::where('id_buku', $id_buku)->first();

    return view('home', compact('lib'));
});

Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('lib', libController::class);
    Route::get('/export-buku', [libController::class, 'export_excel'])->name('export');
});



