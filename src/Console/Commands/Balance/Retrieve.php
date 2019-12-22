<?php

namespace Kristories\StripeCommand\Console\Commands\Balance;

use Illuminate\Console\Command;
use Kristories\StripeCommand\StripeCommand;
use Stripe\Balance;

class Retrieve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:balance:retrieve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve balance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        StripeCommand::stripe();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $call = Balance::retrieve();
            $available = collect($call->toArray()['available'])
                ->map(function ($item) {
                    $item['status'] = 'available';

                    return collect($item)->only(['amount', 'currency', 'status']);
                })
                ->toArray();
            $pending = collect($call->toArray()['pending'])
                ->map(function ($item) {
                    $item['status'] = 'pending';

                    return collect($item)->only(['amount', 'currency', 'status']);
                })
                ->toArray();
            $headers = ['Amount', 'Currency', 'Status'];
            $data = collect($available)->merge($pending)->toArray();

            $this->table($headers, $data);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
