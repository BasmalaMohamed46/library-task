<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = DB::table('statuses')->pluck('id', 'name');

        DB::table('copies')->insert([
            ['book_id' => 1, 'status_id' => $statuses['Good']],
            ['book_id' => 2, 'status_id' => $statuses['Good']],
            ['book_id' => 1, 'status_id' => $statuses['Good']],
        ]);
    }
}
