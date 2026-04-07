<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Frontdesk;
use App\Models\Manage_Room;
use App\Models\Reservations;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        
        // get all users and frontdesks
        $users = User::all();
        $frontdesks = Frontdesk::all();
        $rooms = Manage_Room::all();

        // create 50 reservations
        for ($i = 0; $i < 10; $i++) {
            // randomly select a user and frontdesk
            $user = $users->random();
            $frontdesk = $frontdesks->random();
            $room = $rooms->random();
            // create the reservation
            $reservation = new Reservations();
            $reservation->guest_id = $user->id;
            $reservation->frontdesk_id = $frontdesk->id;
            $reservation->room_id = $room->id;
            $reservation->booking_status = $faker->randomElement(['Complete']);
            $reservation->booking_types = $faker->randomElement(['Online', 'Walk-in']);
            $reservation->nights = $faker->numberBetween(1, 14);
            $checkinDate = $faker->dateTimeBetween('now', '+1 month');
            $checkoutDate = $faker->dateTimeBetween($checkinDate->format('Y-m-d').' +1 day', $checkinDate->format('Y-m-d').' +2 weeks');
            $reservation->checkin_date = $checkinDate->format('Y-m-d');
            $reservation->checkout_date = $checkoutDate->format('Y-m-d');
            $reservation->base_price = $faker->randomFloat(3, 50, 500);
            $reservation->total_price = $reservation->base_price * $reservation->nights;
            $reservation->guests_num = $faker->numberBetween(1, 4);
            $reservation->additional_guests = $faker->numberBetween(0, 2);
            $reservation->guests_Fee = $faker->randomFloat(3, 0, 100);
            $reservation->save();
        }
    }
}
