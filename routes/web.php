<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormAboutController;
use App\Http\Controllers\FormProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ImgController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [PublicController::class, 'index'])->name('home');
//store contacto public de home
Route::post('/', [PublicController::class, 'store'])->name('home.store');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/FormAbout', FormAboutController::class);
    Route::resource('/FormProject', FormProjectController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
    Route::post('/contacto', [ContactController::class, 'privatestore'])->name('contacto.privatestore');
    Route::delete('/contacto/{id}', [ContactController::class, 'publicdelete'])->name('contacto.publicdelete');
    Route::get('/landingpage', [HeroController::class, 'index'])->name('landingpage');
    Route::post('/landingpage', [HeroController::class, 'herostore'])->name('landingpage.herostore');
    Route::patch('/landingpage/{id}', [HeroController::class, 'heroupdate'])->name('landingpage.heroupdate');
    Route::delete('/landingpage/{id}', [HeroController::class, 'herodestroy'])->name('landingpage.herodestroy');
    Route::get('/imghero', [ImgController::class, 'index'])->name('imghero');
    Route::post('/imghero', [ImgController::class, 'store'])->name('imghero.store');
    Route::delete('/imghero/{id}', [ImgController::class, 'destroy'])->name('imghero.destroy');

});
require __DIR__.'/auth.php';
