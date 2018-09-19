<?php

namespace App\Mongo;


class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mongo';
    }
}