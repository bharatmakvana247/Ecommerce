<?php

use Database\Seeders\BrandSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\StatesSeeder;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ProductSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            StatesSeeder::class,
            CountrySeeder::class,

        ]);
        $faker = Faker::create();
    }
}
