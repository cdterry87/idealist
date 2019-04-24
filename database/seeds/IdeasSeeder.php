<?php

use Illuminate\Database\Seeder;

class IdeasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Idea::class, 5)->create();
    }
}
