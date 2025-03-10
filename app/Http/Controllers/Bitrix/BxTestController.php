<?php

namespace App\Http\Controllers\Bitrix;

use App\Http\Controllers\Controller;
use App\Services\BxAuthService;
use Illuminate\Http\Request;

class BxTestController extends Controller
{
    public static function get()
    {
        return BxAuthService::getBitrix();
    }

    public function index(Request $request)
    {
        // Получаем токены Bitrix
        $bitrixService = new BxAuthService();
        $bitrixData = $bitrixService->getBitrix();

        // Передаём данные в Blade-шаблон
        return view('bx', [
            'bitrixData' => $bitrixData,
            'requestData' => $request->all(),
        ]);
    }
}
