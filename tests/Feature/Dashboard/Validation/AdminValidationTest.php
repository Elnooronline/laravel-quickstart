<?php

namespace Tests\Feature\Dashboard\Validation;

use Tests\TestCase;
use App\Models\Admin;

class AdminValidationTest extends TestCase
{
    public function test_name_validation_in_store_method()
    {
        $this->be(create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['name']); // name field is required

        $cases = [
            123, // name field must be string
            str_random(256), // name field must be less than 255 characters
        ];

        foreach ($cases as $case) {
            $response = $this->post(route('dashboard.admins.store'), ['name' => $case]);
            $response->assertSessionHasErrors(['name']);
        }
    }

    public function test_name_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $cases = [
            '', // name field is required if exists (sometimes)
            123, // name field must be string
            str_random(256), // name field must be less than 255 characters
        ];

        foreach ($cases as $case) {
            $response = $this->put(route('dashboard.admins.update', $admin), ['name' => $case]);
            $response->assertSessionHasErrors(['name']);
        }
    }

    public function test_email_validation_in_store_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['email']); // email field is required

        $cases = [
            $admin->email, // email field is unique
            'invalid email', // email field is invalid
            str_random(256).'@test.com', // email field is too long
        ];

        foreach ($cases as $case) {
            $response = $this->post(route('dashboard.admins.store'), ['email' => $case]);
            $response->assertSessionHasErrors(['email']);
        }
    }

    public function test_email_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $cases = [
            '', // email field is required if exists (sometimes)
            create(Admin::class)->email, // email field is unique
            'invalid email', // email field is invalid
            str_random(256).'@test.com', // email field is too long
        ];

        foreach ($cases as $case) {
            $response = $this->put(route('dashboard.admins.update', $admin), ['email' => $case]);
            $response->assertSessionHasErrors(['email']);
        }
    }

    public function test_password_validation_in_store_method()
    {
        $this->be(create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['password']); // password field is required

        $cases = [
            123456, // password field is not confirmed
            str_random(256), // password field is too long
        ];

        foreach ($cases as $case) {
            $response = $this->post(route('dashboard.admins.store'), ['password' => $case]);
            $response->assertSessionHasErrors(['password']);
        }
    }

    public function test_password_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $cases = [
            'secret', // password field is not confirmed
            str_random(256), // password field is too long
        ];

        foreach ($cases as $case) {
            $response = $this->put(route('dashboard.admins.update', $admin), ['password' => $case]);
            $response->assertSessionHasErrors(['password']);
        }
    }

    public function test_avatar_validation_in_store_method()
    {
        $this->be(create(Admin::class));

        $cases = [
            123, // avatar field is invalid image
        ];

        foreach ($cases as $case) {
            $response = $this->post(route('dashboard.admins.store'), ['avatar' => $case]);
            $response->assertSessionHasErrors(['avatar']);
        }
    }

    public function test_avatar_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $cases = [
            123, // avatar field is invalid image
        ];

        foreach ($cases as $case) {
            $response = $this->put(route('dashboard.admins.update', $admin), ['avatar' => $case]);
            $response->assertSessionHasErrors(['avatar']);
        }
    }
}
