<?php

namespace Kristories\StripeCommand;

use Stripe\Stripe;

class StripeCommand
{
    /**
     * Version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Get the default Stripe API options.
     *
     * @param  array  $options
     * @return array
     */
    public static function stripe()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }
}
