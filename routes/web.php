<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Http\Controllers\GalleryController;
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
    return view('home');
})->name('home');



Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');
Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('published', true)->firstOrFail();
    return view('pages.show', compact('page'));
});

