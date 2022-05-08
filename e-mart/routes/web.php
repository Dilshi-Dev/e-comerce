<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCtrl;
use App\Http\Controllers\SupplierCtrl;

Route::get('/', function () {
    return redirect('/posts');
});
Route::resource('posts', PostCtrl::class);

Route::get('/', function () {
    return redirect('/suppliers');
});
Route::resource('suppliers', SupplierCtrl::class);
