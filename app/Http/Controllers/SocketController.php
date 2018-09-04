<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Mockery\Exception;

class SocketController extends Controller
{

    public function redis()
    {
//        $redis = new Redis();
//
//        try {
//            $redis->connect('127.0.0.1', 6379);
//        } catch (\Exception $e) {
//            var_dump($e->getMessage());
//            die();
//        }
        $redis = app()->make('redis');
        $redis->set("key1", "testval");
        return $redis->get("key1");
    }
}
