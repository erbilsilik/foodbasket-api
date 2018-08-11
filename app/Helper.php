<?php

namespace App;
use Ixudra\Curl\Facades\Curl;


class Helper
{
    /**
     * @param int $len
     * @return string
     */
    public static function generateId($len = 32)
    {
        return bin2hex(openssl_random_pseudo_bytes($len / 2));
    }

    /**
     * @param $postcode
     * @return bool
     */
    public static function getLocationInfo($postcode)
    {
        $request = Curl::to('api.postcodes.io/postcodes/'.$postcode)
            ->asJson()
            ->get();

        if ($request->status != 200) {
            return False;
        } else {
            return $request;
        }
    }
}