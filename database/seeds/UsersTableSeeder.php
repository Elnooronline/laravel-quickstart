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
        $admin = factory(\App\Models\Admin::class)->create($data = [
            'name' => 'Elnooronline',
            'email' => 'admin@elnooronline.com',
        ]);
        $admin->addOrUpdateMediaFromUrl('https://pbs.twimg.com/profile_images/961740126970839046/QMGUazth_400x400.jpg');

        $this->command->info("Admin information :");
        $this->command->table(['name', 'email', 'password'], [
            $data + [
                'password' => 'secret',
            ],
        ]);

        factory(\App\Models\Admin::class, 2)->create();
        factory(\App\Models\User::class, 3)->create();
    }
}
