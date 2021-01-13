<?php

use App\User;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        $user->restaurants()->create([
            'name' => 'Abc Lunch Home',
            'location' => 'Sai Balaji Tower, Airoli Navi Mumbai',
        ]);

        $user->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'Bhuvandas Road, NH14 Dadar, Mumbai',
        ]);

        $user->restaurants()->create([
            'name' => 'Mainland China',
            'location' => 'Platinum Tech Park Vashi, Navi Mumbai'
        ]);
    }
}
