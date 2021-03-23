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
        factory(App\User::class,1)->create();
        factory(App\Model\Company::class,50)->create();
        factory(App\Model\Employee::class,50)->create();
    }
}
