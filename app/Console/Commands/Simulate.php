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
                $transaction = Transaction::inRandomOrder()->first();
                TransactionUpdated::dispatch($transaction);
                // usleep(200000); // Sleep for 100 milliseconds
                sleep(2);

                // $transaction = Transaction::inRandomOrder()->first();
                // TransactionCreated::dispatch($transaction);
                // usleep(100000); // Sleep for 100 milliseconds
            }

        }

    }
}
