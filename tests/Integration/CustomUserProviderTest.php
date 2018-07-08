<?php

namespace Tests\Integration;

use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;

class CustomUserProviderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_return_a_proper_model_for_different_type_of_users()
    {
        $user = create(User::class);

        $admin = create(Admin::class);

        auth()->loginUsingId($user->id);

        $this->assertInstanceOf(User::class, auth()->user());

        auth()->loginUsingId($admin->id);

        $this->assertInstanceOf(Admin::class, auth()->user());
    }
}
