<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SClass;
use Illuminate\Support\Facades\DB;

class SClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('s_classes')->delete();
    
            $data = [
                ['name' => 'Baby'],
                ['name' => 'Middle'],
                ['name' => 'Upper'],
                ['name' => 'Nursery'],
                ];
    
            DB::table('s_classes')->insert($data);
    
        }
    }
}
