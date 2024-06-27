<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Ali',
                'email' => 'Ali@enozom.com',
                'phone' => '0122224400',
            ],
            [
                'name' => 'Mohamed',
                'email' => 'mohamed@enozom.com',
                'phone' => '0111155000',
            ],
            [
                'name' => 'Ahmed',
                'email' => 'ahmed@enozom.com',
                'phone' => '0155553311',
            ],

        ]);
    }
}
