<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Alarm;
use App\Models\Balance;
use App\Models\Calendar;
use App\Models\Note;
use App\Models\Reminder;
use App\Models\Task;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Note::factory(10)->create();
        Reminder::factory(10)->create();
        Task::factory(10)->create();
        Balance::factory(10)->has(Transaction::factory()->count(10))->create();
        Calendar::factory(10)->create();
        Alarm::factory(10)->create();
    }
}
