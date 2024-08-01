<?php

namespace Database\Seeders;
use App\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->truncate(); // Clear existing data

        $districts = [
            ['region_id' => 1, 'name' => 'Arusha City'],
            ['region_id' => 1, 'name' => 'Arusha District'],
            // Add more districts as needed
        ];

        DB::table('districts')->insert($districts);
        // DB::table('districts')->delete();

        // $region_id = [1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 13, 13, 13, 13, 13,13, 13, 
        // ];

        // $districts = ['Arusha City', 'Arusha District', 'Karatu', 'Longido', 'Meru', 'Monduli', 'Ngorongoro', 'Ilala', 'Kinondoni', 'Temeke', 'Kigamboni', 'Ubungo', 'Dodoma Urban', 'Bahi', 'Chamwino', 'Chemba', 'Kondoa', 'Kongwa', 'Mpwapwa', 'Busokelo', 'Chunya', 'Kyela', 'Mbarali', 'Mbeya Rural', 'Mbeya Urban', 'Rungwe',
        // ];


        // for($i=0; $i<count($districts); $i++){
        //     District::create(['region_id' => $region_id[$i], 'name' => $districts[$i]]);
        // }
    }
}
