<?php

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
//         $this->call(UsersTableSeeder::class);
//        $this->call(UserGroupSeeder::class);
//        $this->call(NewsTypeSeeder::class);
//        $this->call(suggestionTypeSeeder::class);
        $this->call(ActivityStatues::class);
//        $this->call(ActivityPeriods::class);
//        $this->call(ActivityType::class);
    }
}
