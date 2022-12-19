<?php

use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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

Route::get('/cosmed-contact.html',[ContactController::class,"index"])->name('contacts.show');
Route::post('/cosmed-contact.html',[ContactController::class,"store"])->name('contacts.store');


// Rediriger vers cosmed-contact.html
Route::get('/', function () {
    return redirect()->route('contacts.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/configuration',[ConfigurationController::class,"index"])->name('configuration.index');
    Route::Put('/dashboard/configuration',[ConfigurationController::class,"update"])->name('configuration.update');

    Route::get('/dashboard/contacts',[ContactController::class,"show"])->middleware(['auth', 'verified'])->name('contact.show');
    Route::get('/dashboard/contacts/export',[ContactController::class,"export"])->middleware(['auth', 'verified'])->name('contact.export');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
