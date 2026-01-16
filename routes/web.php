<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::post('/inventory/add', [InventoryController::class, 'addItem'])->name('inventory.add');
Route::post('/inventory/deduct', [InventoryController::class, 'deductItem'])->name('inventory.deduct');
Route::get('/inventory/{item}/history', [InventoryController::class, 'history'])->name('inventory.history');
Route::get('/inventory/search', [InventoryController::class, 'search'])->name('inventory.search');

require __DIR__.'/settings.php';
