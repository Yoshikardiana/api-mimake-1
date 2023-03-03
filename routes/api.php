<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TransaksiC;
use App\Http\Controllers\BarangC;
use Illuminate\Support\Facades\Route;

Route::apiResource('/barang', BarangC::class);
Route::apiResource('/transaksi', TransaksiC::class);