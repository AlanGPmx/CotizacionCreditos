<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

/* Auth::routes([
	'register' => false,
	'verify' => false,
]); */

Route::get('/', function () {
    return view('welcome');
});

/**
 * Rutas por login
 */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard/{q?}', 'WebController@index')->name('dashboard');
    Route::post('calc-pay', 'WebController@calc')->name('calcItemPay');

    //Para Administrar los Productos
    Route::resource('products', 'ProductsController')->names([
        'index' => 'products',    
        'store' => 'saveProduct',
        'edit' => 'editProduct', 
        'update' => 'updateProduct',          
        'destroy' => 'destroyProduct',        
    ]);
    Route::post('update-status-product', 'ProductsController@changeStatus')->name('updateStatusProduct');

    //Para Administrar las categorias
    Route::resource('categories', 'CategoriesController')->names([
        'index' => 'categories',    
        'store' => 'saveCategory',
        'edit' => 'editCategory', 
        'update' => 'updateCategory',          
        'destroy' => 'destroyCategory',        
    ]);
    Route::post('update-status-category', 'CategoriesController@changeStatus')->name('updateStatusCategory');


    //Para Administrar los plazos de pago
    Route::resource('deadline2pay', 'Deadlines2PayController')->names([
        'index' => 'deadline2pay',    
        'store' => 'saveDeadline2pay',
        'edit' => 'editDeadline2pay', 
        'update' => 'updateDeadline2pay',          
        'destroy' => 'destroyDeadline2pay',        
    ]);
    Route::post('update-status-deadline2pay', 'Deadlines2PayController@changeStatus')->name('updateStatusDeadline2Pay');

});
