<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('import_history')->insert([
            ['import_id' => 1],
            ['import_id' => 2],
            ['import_id' => 3],
            ['import_id' => 4],
            ['import_id' => 5],
            ['import_id' => 6],
            ['import_id' => 7],
            ['import_id' => 8],
        ]);
    }
}
