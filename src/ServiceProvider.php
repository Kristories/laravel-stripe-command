<?php

namespace Kristories\StripeCommand;

use Stripe\Stripe;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        Stripe::setAppInfo(
            'Laravel Stripe Command',
            StripeCommand::VERSION,
            'https://github.com/Kristories/laravel-stripe-command'
        );
    }

    public function register()
    {
        $this->app->bind('stripe-command', function () {
            return new StripeCommand();
        });
    }
}
