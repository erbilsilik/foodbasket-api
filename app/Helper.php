<?php

namespace App;

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
        $request = self::curlGet('api.postcodes.io/postcodes/'.$postcode);

        if ($request->status != 200) {
            return False;
        } else {
            return $request;
        }
    }

    /**
     * @param $url
     * @return bool
     */
    public static function curlGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data);
    }
}