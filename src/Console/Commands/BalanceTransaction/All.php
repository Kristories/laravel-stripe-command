<?php

namespace Kristories\StripeCommand\Console\Commands\BalanceTransaction;

use Illuminate\Console\Command;
use Kristories\StripeCommand\StripeCommand;
use Stripe\BalanceTransaction;

class All extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:balance-transaction:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all balance transactions';

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
            $call = BalanceTransaction::all();

            if ($call) {
                $headers = ['ID', 'Amount', 'Available on', 'Created', 'Currency', 'Description', 'Exchange rate', 'Fee', 'Net', 'Status', 'Type'];
                $data = collect($call->toArray()['data'])
                    ->map(function ($item, $key) {
                        return collect($item)
                            ->only(['id', 'amount', 'available_on', 'created', 'currency', 'description', 'exchange_rate', 'fee', 'net', 'status', 'type']);
                    })
                    ->toArray();

                $this->table($headers, $data);
            } else {
                $this->info('Not Available');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
