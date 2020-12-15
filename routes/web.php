<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImportCustomerCsvController;
use App\Http\Controllers\StrengthController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/strengths', [StrengthController::class, 'index']);


Route::get('/customers', [CustomerController::class, 'index'])
    ->middleware(['auth']);
Route::get('/customers/{customer}', [CustomerController::class, 'show'])
    ->middleware(['auth']);

Route::get('/import_csv', [ImportCustomerCsvController::class, 'getImport'])
    ->middleware(['auth'])
    ->name('import');
Route::post('/import_parse', [ImportCustomerCsvController::class, 'parseImport'])
    ->middleware(['auth'])
    ->name('import_parse');

require __DIR__ . '/auth.php';
