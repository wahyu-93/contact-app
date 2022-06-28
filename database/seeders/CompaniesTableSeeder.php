<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();
        $faker = Faker::create();
        $companies = [];

        foreach(range(1,10) as $index){
            $companies[] = [
                'name'       => $faker->name,
                'address'    => $faker->address,
                'website'    => $faker->domainName,
                'email'      => $faker->email,
                'created_at' => now(),
                'updated_at' => now()
            ];
        };

        DB::table('companies')->insert($companies);
    }
}
