<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Frontdesk;
use App\Models\Reservations;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\GuestInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $guest_information = new GuestInformation();

            $guest_information->guest_id = User::inRandomOrder()->first()->id;
            $guest_information->frontdesk_id = Frontdesk::inRandomOrder()->first()->id;
            $guest_information->reservation_id = Reservations::inRandomOrder()->first()->id;
            $guest_information->salutation = $faker->title;
            $guest_information->first_name = $faker->firstName;
            $guest_information->last_name = $faker->lastName;
            $guest_information->company_name = $faker->company;
            $guest_information->address = $faker->address;
            $guest_information->phone_number = $faker->phoneNumber;
            $guest_information->payment_status = $faker->randomElement([ 'Unpaid', 'Paid']);
            $guest_information->payment_method = $faker->randomElement([ 'Cash', 'Deparment Charge']);
            $guest_information->department = $faker->jobTitle;

            $guest_information->save();
        }
    }
}
