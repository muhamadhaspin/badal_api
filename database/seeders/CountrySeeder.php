<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvData = fopen(base_path("local_db/countries.csv"), 'r');

        $chaptersRow = true;
        while (($data = fgetcsv($csvData, null, ',')) !== false) {
            if (!$chaptersRow) {
                Country::create([
                    'name' => str($data['0'])->title()->squish(),
                    'short_code' => str($data['1'])->upper()->trim(),
                    'long_code' => str($data['2'])->upper()->trim()
                ]);
            }
            $chaptersRow = false;
        }

        fclose($csvData);
    }
}
