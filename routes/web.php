<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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
    return view('list');
});
Route::get('/tambah-inventory', function () {
    return view('insert');
});

Route::post('/insert_inventory', [InventoryController::class, 'store'])->name('insert_inventory.store');

Route::get('/edit-inventory/{id}', [InventoryController::class, 'edit'])->name('insert_inventory.edit');
Route::post('/update-inventory/{id}', [InventoryController::class, 'update'])->name('insert_inventory.update');