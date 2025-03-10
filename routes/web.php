<?php

use App\Http\Controllers\Bitrix\BxTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

