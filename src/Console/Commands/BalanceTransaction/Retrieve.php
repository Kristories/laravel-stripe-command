<?php

namespace Kristories\StripeCommand\Console\Commands\BalanceTransaction;

use Illuminate\Console\Command;
use Kristories\StripeCommand\StripeCommand;
use Stripe\BalanceTransaction;

class Retrieve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:balance-transaction:retrieve {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve a balance transaction';

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
            $call = BalanceTransaction::retrieve($this->argument('id'));
            $headers = ['ID', 'Amount', 'Available on', 'Created', 'Currency', 'Description', 'Exchange rate', 'Fee', 'Net', 'Status', 'Type'];
            $data = [
                collect($call->toArray())
                    ->only(['id', 'amount', 'available_on', 'created', 'currency', 'description', 'exchange_rate', 'fee', 'net', 'status', 'type'])
                    ->toArray(),
            ];

            $this->table($headers, $data);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
