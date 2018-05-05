<?php

namespace Tests\Feature\Dashboard\Validation;

use Tests\TestCase;
use App\Models\Admin;

class AdminValidationTest extends TestCase
{
    public function test_name_validation_is_store_method()
    {
        $this->be(create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['name']); // name field is required

        $response = $this->post(route('dashboard.admins.store'), ['name' => 123]);
        $response->assertSessionHasErrors(['name']); // name field must be string

        $response = $this->post(route('dashboard.admins.store'), ['name' => str_random(256)]);
        $response->assertSessionHasErrors(['name']); // name field must be less than 255 characters
    }

    public function test_name_validation_is_update_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->put(route('dashboard.admins.update', $admin), ['name' => '']);
        $response->assertSessionHasErrors(['name']); // name field is required if exists (sometimes)

        $response = $this->put(route('dashboard.admins.update', $admin), ['name' => 123]);
        $response->assertSessionHasErrors(['name']); // name field must be string

        $response = $this->put(route('dashboard.admins.update', $admin), ['name' => str_random(256)]);
        $response->assertSessionHasErrors(['name']); // name field must be less than 255 characters
    }

    public function test_email_validation_in_store_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['email']); // email field is required

        $response = $this->post(route('dashboard.admins.store'), ['email' => $admin->email]);
        $response->assertSessionHasErrors(['email']); // email field is unique

        $response = $this->post(route('dashboard.admins.store'), ['email' => 'invalid email']);
        $response->assertSessionHasErrors(['email']); // email field is invalid

        $response = $this->post(route('dashboard.admins.store'), ['email' => str_random(256).'@test.com']);
        $response->assertSessionHasErrors(['email']); // email field is too long
    }

    public function test_email_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->put(route('dashboard.admins.update', $admin), ['email' => '']);
        $response->assertSessionHasErrors(['email']); // email field is required if exists (sometimes)

        $response = $this->put(route('dashboard.admins.update', $admin), ['email' => create(Admin::class)->email]);
        $response->assertSessionHasErrors(['email']); // email field is unique
    }

    public function test_password_validation_in_store_method()
    {
        $this->be(create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['password']); // password field is required

        $response = $this->post(route('dashboard.admins.store'), ['password' => 123456]);
        $response->assertSessionHasErrors(['password']); // password field is not confirmed

        $response = $this->post(route('dashboard.admins.store'), ['password' => str_random(256)]);
        $response->assertSessionHasErrors(['password']); // password field is too long
    }

    public function test_password_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->put(route('dashboard.admins.update', $admin), ['password' => 'secret']);
        $response->assertSessionHasErrors(['password']); // email field is not confirmed
    }

    public function test_avatar_validation_in_store_method()
    {
        $this->be(create(Admin::class));

        $response = $this->post(route('dashboard.admins.store'), ['avatar' => 123]);
        $response->assertSessionHasErrors(['avatar']); // avatar field is invalid image
    }

    public function test_avatar_validation_in_update_method()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->put(route('dashboard.admins.update', $admin), ['avatar' => 123]);
        $response->assertSessionHasErrors(['avatar']); // avatar field is invalid image
    }
}
