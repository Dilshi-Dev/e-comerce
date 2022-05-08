<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliverydetailsController;
use App\Http\Controllers\Admin\OrderController;


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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']],function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register',[DashboardController::class,'registered']);

    Route::get('/role-edit/{id}',[DashboardController::class,'registeredit']);
    Route::put('/role-register-update{id}',[DashboardController::class,'registerupdate']);
    Route::delete('/role-delete/{id}',[DashboardController::class,'registerdelete']);
    Route::get(' usertask',[DashboardController::class,'exportcsv']);

   

    Route::get('deliverymanager',[DeliverydetailsController::class,'details']);
    Route::post('delivery-save',[DeliverydetailsController::class,'store']);
    Route::get('delivery-edit/{id}',[DeliverydetailsController::class,'edit']);
    Route::post('delivery-update',[DeliverydetailsController::class,'update']);
    Route::get('delivery-delete/{id}',[DeliverydetailsController::class,'delete']);
    Route::get('tasks',[DeliverydetailsController::class,'exportcsv']);


    Route::get('ordermanager',[OrderController::class,'orderdetails']);
    Route::post('order-save',[OrderController::class,'ordersave']);
    Route::get('order-edit/{id}',[OrderController::class,'orderedit']);
    Route::post('order-update',[OrderController::class,'orderupdate']);
    Route::get('order-delete/{id}',[OrderController::class,'orderdelete']);
    Route::get('ordertask',[OrderController::class,'exportordercsv']);
    




    

    


    

    





});

 