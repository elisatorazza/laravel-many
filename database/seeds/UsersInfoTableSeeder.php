<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\UserInfo;
use App\User;

class UsersInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach($users as $user) {
            $newUserInfo = new UserInfo;
            $newUserInfo->user_id = $user->id;
            $newUserInfo->nationality = $faker->country();
            $newUserInfo->date_of_birth = $faker->dateTimeBetween('-50 years', '-18 years');
            $newUserInfo->biography = $faker->paragraph(10, true);
            $newUserInfo->image = $faker->imageUrl(200, 300);
            $newUserInfo->save();
        }
    }
}
