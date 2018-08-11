<?php

namespace App;


class Helper
{
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