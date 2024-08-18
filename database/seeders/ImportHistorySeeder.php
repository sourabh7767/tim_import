<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            ['import_id' => 1,'created_at' => Carbon::now(),'record_count' => 158,'status' => 1],
            ['import_id' => 2,'created_at' => Carbon::now(),'record_count' => 958,'status' => 2],
            ['import_id' => 3,'created_at' => Carbon::now(),'record_count' => 332,'status' => 3],
            ['import_id' => 4,'created_at' => Carbon::now(),'record_count' => 874,'status' => 3],
            ['import_id' => 5,'created_at' => Carbon::now(),'record_count' => 111,'status' => 2],
            ['import_id' => 6,'created_at' => Carbon::now(),'record_count' => 154,'status' => 1],
            ['import_id' => 7,'created_at' => Carbon::now(),'record_count' => 953,'status' => 2],
            ['import_id' => 8,'created_at' => Carbon::now(),'record_count' => 154,'status' => 1],
        ]);
    }
}
