<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Transactions table
        Schema::create('transactions', function (Blueprint $table) {
            $table->ulid('id')->primary(); // Use ULID for primary key
            $table->foreignId('from_account_id')->constrained('accounts');

            // Add an index on 'from_account_id' for faster lookups
            $table->index('from_account_id');

            $table->foreignId('to_account_id')->constrained('accounts');

            // Add an index on 'to_account_id' for faster lookups
            $table->index('to_account_id');

            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });

        // Add an index on 'created_at' for faster sorting and filtering
        Schema::table('transactions', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
