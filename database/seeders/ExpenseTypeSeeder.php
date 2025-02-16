<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Groceries',
            'Household',
            'Personal',
            'Loans',
            'Miscellaneous'
        ];

        foreach ($types as $type) {
            ExpenseType::query()->firstOrCreate(compact('type'));
        }
    }
}
