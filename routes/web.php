<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index');
Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/forms', [AdminController::class, 'forms'])->name('admin.forms');
Route::get('/buttons', [AdminController::class, 'buttons'])->name('admin.buttons');
Route::get('/cards', [AdminController::class, 'cards'])->name('admin.cards');
Route::get('/charts', [AdminController::class, 'charts'])->name('admin.charts');
Route::get('/modals', [AdminController::class, 'modals'])->name('admin.modals');
Route::get('/tables', [AdminController::class, 'tables'])->name('admin.tables');

Route::get('/errors', [AdminController::class, 'errors'])->name('admin.pages.errors');
Route::get('/blank', [AdminController::class, 'blank'])->name('admin.pages.blank');

Route::get('/createAccount', [AdminController::class, 'createAccount'])->name('admin.pages.createAccount');
Route::get('/forget', [AdminController::class, 'forget'])->name('admin.pages.forget');
Route::get('/auth/login', [AdminController::class, 'login'])->name('admin.pages.login');

/**==============> route auth */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('gallerys', GalleryController::class);
    Route::resource('students', StudentController::class);
//    Route::get('students/{student}/edit', \App\Livewire\Student\Edit::class)->name('students.edit');
});

require __DIR__.'/auth.php';
