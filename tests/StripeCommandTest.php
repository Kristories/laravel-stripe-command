<?php

namespace Kristories\StripeCommand\Tests;

use Kristories\StripeCommand\Facades\StripeCommand;
use Kristories\StripeCommand\ServiceProvider;
use Orchestra\Testbench\TestCase;

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
