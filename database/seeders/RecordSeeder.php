<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->count(10)
            ->sequence(fn (Sequence $sequence) => ['access' => $sequence->index % 2])
            ->create();
    }
}
