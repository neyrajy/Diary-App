<?php

namespace Database\Seeders;

use App\Models\Nationality;
use App\Models\Region;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        District::truncate();

        $country = Nationality::create(['name' => 'Tanzania']);

        $regions = [
            ['name' => 'Arusha', 'nationality_id' => $country->id],
            ['name' => 'Dodoma', 'nationality_id' => $country->id],
            ['name' => 'Dar es Salaam', 'nationality_id' => $country->id],
            ['name' => 'Geita', 'nationality_id' => $country->id],
            ['name' => 'Iringa', 'nationality_id' => $country->id],
            ['name' => 'Kagera', 'nationality_id' => $country->id],
            ['name' => 'Katavi', 'nationality_id' => $country->id],
            ['name' => 'Kigoma', 'nationality_id' => $country->id],
            ['name' => 'Kilimanjaro', 'nationality_id' => $country->id],
            ['name' => 'Lindi', 'nationality_id' => $country->id],
            ['name' => 'Manyara', 'nationality_id' => $country->id],
            ['name' => 'Mara', 'nationality_id' => $country->id],
            ['name' => 'Mbeya', 'nationality_id' => $country->id],
            ['name' => 'Morogoro', 'nationality_id' => $country->id],
            ['name' => 'Mwanza', 'nationality_id' => $country->id],
            ['name' => 'Mtwara', 'nationality_id' => $country->id],
            ['name' => 'Njombe', 'nationality_id' => $country->id],
            ['name' => 'Pemba North', 'nationality_id' => $country->id],
            ['name' => 'Pemba South', 'nationality_id' => $country->id],
            ['name' => 'Pwani', 'nationality_id' => $country->id],
            ['name' => 'Rukwa', 'nationality_id' => $country->id],
            ['name' => 'Ruvuma', 'nationality_id' => $country->id],
            ['name' => 'Shinyanga', 'nationality_id' => $country->id],
            ['name' => 'Simiyu', 'nationality_id' => $country->id],
            ['name' => 'Singida', 'nationality_id' => $country->id],
            ['name' => 'Tabora', 'nationality_id' => $country->id],
            ['name' => 'Tanga', 'nationality_id' => $country->id],
            ['name' => 'Zanzibar North', 'nationality_id' => $country->id],
            ['name' => 'Zanzibar South', 'nationality_id' => $country->id],
            ['name' => 'Zanzibar West', 'nationality_id' => $country->id],
        ];

        foreach ($regions as $regionData) {
            $region = Region::create($regionData);

            // Insert districts for the created region
            $districts = $this->getDistrictsForRegion($region->name);
            foreach ($districts as $districtName) {
                District::create(['region_id' => $region->id, 'name' => $districtName]);
            }
        }
    }

    private function getDistrictsForRegion($regionName)
    {
        switch ($regionName) {
            case 'Arusha':
                return ['Arusha City', 'Arusha District', 'Karatu', 'Longido', 'Meru', 'Monduli', 'Ngorongoro'];
            case 'Dare es Salaam':
                return ['Ilala', 'Kinondoni', 'Temeke', 'Kigamboni', 'Ubungo'];
            case 'Dodoma':
                return ['Dodoma Urban', 'Bahi', 'Chamwino', 'Chemba', 'Kondoa', 'Kongwa', 'Mpwapwa'];
            case 'Geita':
                return ['Bukombe', 'Chato', 'Geita Town', 'Mbogwe', "Nyang’hwale"];
            case 'Iringa':
                return ['Iringa Rural', 'Iringa Urban', 'Kilolo', 'Mafinga Town', 'Mufindi'];
            case 'Kagera':
                return ['Biharamulo', 'Bukoba Rural', 'Bukoba Urban', 'Karagwe', 'Kyerwa', 'Muleba', 'Ngara'];
            case 'Katavi':
                return ['Ilala', 'Kinondoni', 'Temeke', 'Kigamboni', 'Ubungo'];
            case 'Kigoma':
                return ['Dodoma Urban', 'Bahi', 'Chamwino', 'Chemba', 'Kondoa', 'Kongwa', 'Mpwapwa'];
            
            case 'Kilimanjaro':
                return ['Hai', 'Moshi Rural', 'Moshi Urban', 'Mwanga', 'Rombo', 'Same', 'Siha'];
            case 'Lindi':
                return ['Lindi Municipal', 'Lindi Rural', 'Kilwa', 'Nachingwea', 'Ruangwa', 'Liwale'];
            case 'Manyara':
                return ['Babati Urban', 'Babati Rural', 'Hanang', 'Mbulu', 'Kiteto','Simanjiro'];
            case 'Mara':
                return ['Musoma Urban',  'Musoma Rural', 'Bunda', 'Butiama', 'Rorya', 'Tarime', 'Serengeti'];
            case 'Mbeya':
                return ['Chunya', 'Kyela', 'Mbalizi', 'Mbeya City', 'Mbeya Rural', 'Rungwe'];
            case 'Morogoro':
                return ['Morogoro Urban', 'Morogoro Rural', 'Kilosa','Kilombero', 'Ulanga', 'Malinyi', 'Gairo'];
            case 'Mwanza':
                return [ 'Nyamagana', 'Ilemela', 'Magu','Kwimba', 'Sengerema', 'Misungwi', 'Ukerewe', 'Buchosa'];
            case 'Mtwara':
                return ['Mtwara Urban', 'Mtwara Rural', 'Masasi', 'Nanyumbu', 'Newala', 'Tandahimba'];
            case 'Njombe':
                return ['Njombe', 'Ludewa', 'Makete', 'Wanging\'ombe', 'Makambako'];
            case 'Pemba North':
                return ['Wete', 'Micheweni'];
            case 'Pemba South':
                return ['Chake Chake', 'Mkoani']; 
                
            case 'Pwani':
                return ['Bagamoyo', 'Kibaha', 'Kisarawe', 'Mafia', 'Mkuranga', 'Rufiji'];
            case 'Rukwa':
                return ['Sumbawanga', 'Nkasi', 'Kalambo'];
            case 'Ruvuma':
                return ['Songea', 'Mbinga', 'Tunduru', 'Namtumbo', 'Nyasa'];
            case 'Shinyanga':
                return ['Shinyanga', 'Kahama', 'Bariadi', 'Bukombe', 'Ushetu', 'Msalala'];
            case 'Simiyu':
                return ['Bariadi', 'Maswa', 'Itilima', 'Meatu', 'Busega'];
            case 'Singida':
                return ['Singida', 'Iramba', 'Ikungi', 'Manyoni', 'Mkalama','Itigi'];
            case 'Tabora':
                return ['Tabora', 'Igunga', 'Kaliua', 'Nzega', 'Sikonge', 'Uyui', 'Urambo'];
            case 'Tanga':
                return ['Tanga', 'Handeni', 'Kilindi', 'Korogwe', 'Lushoto', 'Mkinga', 'Muheza', 'Pangani'];
            case 'Zanzibar North':
                return ['Kaskazini A', 'Kaskazini B'];
            case 'Zanzibar South':
                return ['Kusini',   'Kati'];
            case 'Zanzibar West':
                return ['Magharibi A', 'Magharibi B', 'Mjini'];
                
                default:
                return [];
        }
    }
}
