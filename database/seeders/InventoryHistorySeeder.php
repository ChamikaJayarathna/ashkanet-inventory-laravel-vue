<?php

namespace Database\Seeders;

use App\Models\InventoryHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventoryHistory::factory()->count(20)->create();
    }
}
