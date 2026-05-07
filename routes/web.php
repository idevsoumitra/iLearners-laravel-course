<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [AdminController::class, 'store'])->name('admin.dashboard.store');

    Route::get('/form', [AdminController::class, 'form'])->name('admin.form');
    Route::POST('/form', [AdminController::class, 'form_store'])->name('admin.form.store');

    Route::get('/user-list', [AdminController::class, 'user_list'])->name('users.index');


});

require __DIR__.'/auth.php';