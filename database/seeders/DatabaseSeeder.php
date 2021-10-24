<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\User;
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
         $users = \App\Models\User::factory()->count(10)->create();

         $users->each(function (User $user){
             Ads::factory()->count(10)->create(['user_id' => $user->id]);
         });
    }
}
