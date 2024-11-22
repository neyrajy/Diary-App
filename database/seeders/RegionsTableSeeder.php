<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionsTableSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            'Arusha',
            'Dar es Salaam',
            'Dodoma',
            'Geita',
            'Iringa',
            'Kagera',
            'Katavi',
            'Kigoma',
            'Kilimanjaro',
            'Lindi',
            'Manyara',
            'Mara',
            'Mbeya',
            'Morogoro',
            'Mtwara',
            'Mwanza',
            'Njombe',
            'Pemba North',
            'Pemba South',
            'Pwani',
            'Rukwa',
            'Ruvuma',
            'Shinyanga',
            'Simiyu',
            'Singida',
            'Tabora',
            'Tanga',
            'Zanzibar North',
            'Zanzibar South',
            'Zanzibar West',
        ];

        foreach ($regions as $region) {
            Region::create([
                'name' => $region,
                'nationality_id' => 176, 
            ]);
        }
    }
}
