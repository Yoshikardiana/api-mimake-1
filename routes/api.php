<?php

use App\Http\Controllers\AuthC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TransaksiC;
use App\Http\Controllers\BarangC;
use App\Http\Controllers\usersC;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/', function(){
    return 'Hello World API !';
});

Route::apiResource('/barang', BarangC::class) -> middleware(['auth:sanctum']);
Route::apiResource('/transaksi', TransaksiC::class);

route::post('/login',[AuthC::class,'login']);

route::get('/admin',function(){
    return Hash::make('admin');
});

route::get('/users',[usersC::class,'index']);
route::get('/users/{id}',[usersC::class,'detail']);