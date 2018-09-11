<?php

namespace App\Mongo;

use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Command;
use MongoDB\Driver\Manager;

class Service {
    private $mongo;

    public function __construct($uri = null, $uriOptions = [], $driverOptions = [])
    {
        $this->mongo = new Manager(
            $uri,
            $uriOptions = ['username' => 'foodbasket', 'password' => 'secret'],
            $driverOptions = []
        );
    }

    public function get() {
        return $this->mongo;
    }
}