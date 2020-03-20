<?php

namespace LaraDevs\Fcm;

use Illuminate\Support\Facades\Facade;

/**
 * Class FcmFacade
 * @package Laradev\Fcm\Facades
 */
class FcmFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fcm';
    }
}
