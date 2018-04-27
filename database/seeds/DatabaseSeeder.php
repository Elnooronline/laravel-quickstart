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
         $this->call(UsersTableSeeder::class);

        $this->command->warn("Admin Informations :");
        $this->command->table(['email', 'password'], [
            [
                'email' => 'admin@fathy-dev.com',
                'password' => 'secret',
            ],
        ]);
    }
}
