<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::truncate();
        for ($i = 0; $i < 10; $i++) {
            Ticket::create([
                'authorName' => fake()->name('mixed'), 'author_id' => fake()->unique()->randomNumber(3), 'ticketTitle' => fake()->sentence(4, 8), 'description' => fake()->sentence(50), 'severity' => fake()->randomElement(['Low', 'Medium', 'High']), 'status' => fake()->randomElement(['Open', 'Closed']),
            ]);

            sleep(3);
        }

    }
}
