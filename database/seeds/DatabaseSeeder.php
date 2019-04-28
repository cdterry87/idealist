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
        $users = factory(App\User::class, 50)->create();

        $users->each(function ($item, $key) {
            $ideas = factory(App\Idea::class, rand(5, 10))->create(['user_id' => $item->id]);
        });
    }
}
