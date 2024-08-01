<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SClass;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();
        $c = SClass::pluck('id')->all();

        $data = [
            ['name' => 'Gold', 's_class_id' => $c[0]],
            ['name' => 'Diamond', 's_class_id' => $c[0]],
            ['name' => 'Blue', 's_class_id' => $c[1]],
            ['name' => 'A', 's_class_id' => $c[2]],
            ['name' => 'A', 's_class_id' => $c[3]],
        ];

        DB::table('sections')->insert($data);
    }
}
