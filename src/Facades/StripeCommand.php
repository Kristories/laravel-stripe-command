<?php

namespace Kristories\StripeCommand\Facades;

use Illuminate\Support\Facades\Facade;

class StripeCommand extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stripe-command';
    }
}
