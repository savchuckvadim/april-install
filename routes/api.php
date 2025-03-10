<?php

use App\Http\Controllers\Bitrix\BxTestController;
use App\Services\BxAuthService;
use Illuminate\Support\Facades\Route;

Route::post('/test', function () {
    return BxTestController::get();
});


// Route::post('/bx/test', function (Request $reuqest) {

//     $B24 = BxAuthService::getBitrix();

//     return  $reuqest;
// });

Route::post('/bx', [BxTestController::class, 'index']);
