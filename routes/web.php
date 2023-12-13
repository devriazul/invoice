<?php

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

Route::get('/clear', function() {
// Artisan::call('optimize:clear');
Artisan::call('cache:clear');
Artisan::call('config:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
// echo Artisan::output();
echo "Cleared...";
});

Route::get('/', function () {
    return view('invoice.create');
});


Route::resource('invoices', 'InvoiceController');

Route::get('/invoices/viewInvoice/{id}', 'InvoiceController@viewInvoice')->name('invoices.viewInvoice');
Route::get('/invoices/generateInvoice/{id}', 'InvoiceController@generateInvoice')->name('invoices.generateInvoice');
//Email Route

Route::get('invoices/sendInvoiceEmail/{id}', 'InvoiceController@sendInvoiceEmail')->name('invoices.sendInvoiceEmail');
