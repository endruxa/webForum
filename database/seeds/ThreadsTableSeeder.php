<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thread::class, 20)->create()->each(function ($u) {
            $u->thread()->save(factory(App\Thread::class)->make());
        });
    }
}
