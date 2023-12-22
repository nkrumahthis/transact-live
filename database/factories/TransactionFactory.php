<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fromAccount = Account::inRandomOrder()->first() ?: Account::factory()->create();
        $toAccount = Account::where('id', '!=', $fromAccount->id)->inRandomOrder()->first() ?: Account::factory()->create();

        return [
            //
            'from_account_id' => $fromAccount->id, // Associate a random account
            'to_account_id' => $toAccount->id, // Associate a random account (can be the same as from_account_id if needed)
            'description' => fake()->sentence(5),
            'amount' => fake()->randomFloat(2, 0, 10_000), // Generate random amounts up to $10_000
        ];
    }
}
