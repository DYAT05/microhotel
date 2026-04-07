<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Frontdesk;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class FrontdeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Frontdesk::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make($faker->password),
                'status' => 1,
                'Acc_Stat' =>  $faker->randomElement([ 'Activate', 'Deactivate']),

            ]);
        }
    }
}
