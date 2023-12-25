<?php

namespace App\Console\Commands;

use App\Events\TransactionUpdated;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $transaction = Transaction::inRandomOrder()->first();
        TransactionUpdated::dispatch($transaction);
    }
}
