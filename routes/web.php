<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ DashboardController::class, 'view' ]);

Route::post('/item', [ ItemController::class, 'insert' ]);
Route::delete('/item/{id}', [ ItemController::class, 'delete' ])->name('item.destroy');

use App\Http\Controllers\AngkaController;

Route::get('/cek-angka', [AngkaController::class, 'showForm']);
Route::post('/cek-angka', [AngkaController::class, 'cekAngka']);