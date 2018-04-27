<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->states('admin')->create([
            'name' => 'Ahmed Fathy',
            'email' => 'admin@fathy-dev.com',
        ]);

        factory(\App\Models\User::class, 9)->states('user')->create();
    }
}
