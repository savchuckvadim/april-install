<?php

namespace App\Services;

use Bitrix24\SDK\Core\Credentials\ApplicationProfile;
use Bitrix24\SDK\Services\ServiceBuilderFactory;
use Illuminate\Http\Request;

class BxAuthService
{

    public static function getBitrix()
    {
        // $bx24 = ServiceBuilderFactory::createServiceBuilderFromPlacementRequest();
        $scope = 'crm,user_basic,tasks';
        $appProfile = ApplicationProfile::initFromArray([
            'BITRIX24_PHP_SDK_APPLICATION_CLIENT_ID' => 'local.679bb9448c2300.80332134',
            'BITRIX24_PHP_SDK_APPLICATION_CLIENT_SECRET' => '5t2JcnTeqq8ar12JKUvfql6b8pYDzBTYt6L7rQKeI4MPz7g4MS',
            'BITRIX24_PHP_SDK_APPLICATION_SCOPE' => 'crm,user_basic'
        ]);

        $B24 = ServiceBuilderFactory::createServiceBuilderFromPlacementRequest(
            Request::createFromGlobals(),
            $appProfile
        );

          $result = $B24->getCRMScope()->deal()->list(
            ['ID' => 'ASC'],
            [],
            ['ID', 'TITLE', 'OPPORTUNITY']
        )->getDeals();

        return $result;
    }
}
