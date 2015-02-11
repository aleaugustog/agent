<?php

namespace Thytanium\Agent\Facades;

use Illuminate\Support\Facades\Facade;

class Agent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'agent';
    }
}