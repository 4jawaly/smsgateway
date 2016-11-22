<?php

namespace Jawaly\SmsGateway\Facades;

use Illuminate\Support\Facades\Facade;

class Jawaly extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jawaly';
    }

}
