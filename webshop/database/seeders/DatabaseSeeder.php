<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //This seed action is for generating test data only. 
        $csvFile = fopen(public_path("data/meat.csv"), "r");
        $id = 0;

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Product::create([
                    "id" => $id,
                    "name" => $data[0],
                    "type" => $data[1],
                    "description" => $data[2],
                    "stock" => 0,
                    "picture" => fake()->imageUrl(640, 480, $data[0], true)
                ]);
            }

            $id++;
            $firstline = false;
        }

        fclose($csvFile);
    }
}
