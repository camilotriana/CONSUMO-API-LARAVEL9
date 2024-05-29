<?php

use App\Http\Controllers\InventoryController;
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

Route::get('/', function () {
    return view('welcome');
});

//----------- INVENTARIO ---------------
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

Route::get('/editInventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');

Route::put('/editInventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');

Route::delete('/editInventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

//Route::resource('/inventory', InventoryController::class);






