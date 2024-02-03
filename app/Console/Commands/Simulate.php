<?php

namespace App\Console\Commands;

use App\Events\TransactionCreated;
use Illuminate\Console\Command;
use App\Events\TransactionUpdated;
use App\Models\Transaction;

class Simulate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:simulate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'simulate live transactions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info("simulating transaction updates");

        while (true) {
            // Update 10 random transactions with intervals
            for ($i = 0; $i < 10; $i++) {
                $transaction = Transaction::factory()->create();
                TransactionCreated::dispatch($transaction);

                // Sleep for 1 second
                sleep(1);

                $transaction = Transaction::all()->random();
                TransactionUpdated::dispatch($transaction);
                // sleep(1); // Sleep for 1 second
            }

        }

    }
}
