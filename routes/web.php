<?php

use App\Http\Controllers\JobcenterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group([
    'prefix'    => 'admin',
    'as'        => 'admin.',
    'middleware' => ['auth'],
], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('jobcenters', JobcenterController::class);
    Route::post('jobcenters', [JobcenterController::class, 'search'])->name('jobcenters.search');
});

require __DIR__.'/auth.php';
