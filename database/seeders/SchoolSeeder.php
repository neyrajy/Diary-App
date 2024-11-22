<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2024-2025'],
            ['type' => 'system_title', 'description' => 'KJDA'],
            ['type' => 'system_name', 'description' => 'Kiddie Junction Daycare Academy'],
            ['type' => 'term_ends', 'description' => '12/12/2024'],
            ['type' => 'term_begins', 'description' => '8/07/2024'],
            ['type' => 'phone', 'description' => '0655981822'],
            ['type' => 'address', 'description' => 'Ilomba,Mwambene (Makaburini Road), Mbeya house no 336'],
            ['type' => 'system_email', 'description' => 'info@kiddiejunctiondaycareacademy.com'],
            ['type' => 'alt_email', 'description' => ''],
            // ['type' => 'email_host', 'description' => ''],
            // ['type' => 'email_pass', 'description' => ''],
            // ['type' => 'lock_exam', 'description' => 0],
            // ['type' => 'logo', 'description' => ''],
            ['type' => 'school_fees', 'description' => '1400000'],
            ['type' => 'bus_fees', 'description' => '100000'],
            ['type' => 'food_fees', 'description' => '100000'],
            // ['type' => 'next_term_fees_n', 'description' => '1800000'],
            // ['type' => 'next_term_fees_s', 'description' => '15600'],
            // ['type' => 'next_term_fees_c', 'description' => '1600'],
        ];

        DB::table('schools')->insert($data);

    }
}
