<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => $faker->name(),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 10, 100),
                'quantity' => $faker->randomNumber(2),

            ]);
        }
    }
}
