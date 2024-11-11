<?php

use App\Actions\OrderProcess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pagar', function(OrderProcess $orderProcess) {
    echo $orderProcess->execute();
});