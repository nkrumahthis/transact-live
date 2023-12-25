<?php

namespace App\Console\Commands;

use App\Events\TransactionCreated;
use App\Models\Transaction;
use Illuminate\Console\Command;

class CreateTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a random new transaction';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $transaction = Transaction::factory()->create();
        TransactionCreated::dispatch($transaction);
    }
}
