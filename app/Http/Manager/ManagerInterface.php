<?php

namespace App\Http\Manager;


interface ManagerInterface
{
    public function map($db);
    public function mapExternal($post);
}