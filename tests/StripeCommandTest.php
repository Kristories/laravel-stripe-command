<?php

namespace Kristories\StripeCommand\Tests;

use Orchestra\Testbench\TestCase;
use Kristories\StripeCommand\ServiceProvider;
use Kristories\StripeCommand\Facades\StripeCommand;

class StripeCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'laravel-stripe-command' => StripeCommand::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
