<?php

namespace Bytes4sale\PhoneNumberInfo\Facades;

use Illuminate\Support\Facades\Facade;

class PhoneNumberInfo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'numberinfo';
    }
}
