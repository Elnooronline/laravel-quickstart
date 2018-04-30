<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Admin;

class AdminTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_display_the_list_of_admins()
    {
        $this->be($admin = create(Admin::class));

        $response = $this->get(route('dashboard.admins.index'));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.admins.index');
        $response->assertSee($admin->present()->thumbAvatar);
        $response->assertSee($admin->name);
        $response->assertSee($admin->email);
        $response->assertSee($admin->present()->controlButton);
    }

    /**
     * @test
     */
    public function it_can_display_the_create_form_of_admins()
    {
        $this->be(create(Admin::class));

        $response = $this->get(route('dashboard.admins.create'));

        $response->assertSuccessful();
    }

    /**
     * @test
     */
    public function it_cannot_store_or_update_admin_without_validation()
    {
        $this->be($admin = create(Admin::class));
        $data = [
            'name' => 'Ahmed Fathy',
            'email' => 'test@gmail.com',
            'password' => 'secret',
        ];

        $response = $this->post(route('dashboard.admins.store'));
        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $response->assertStatus(Response::HTTP_FOUND);
        $response = $this->post(route('dashboard.admins.store'), $data);
        $response->assertSessionHasErrors(['password']); // Password not confirmed.
        $response->assertStatus(Response::HTTP_FOUND);
        $data = $data + [
                'password_confirmation' => 'secret',
                'avatar' => 'any string',
            ];
        $response = $this->post(route('dashboard.admins.store'), $data);
        $response->assertSessionHasErrors(['avatar']); // Avatar is not valid image
        $response->assertStatus(Response::HTTP_FOUND);


        $response = $this->put(route('dashboard.admins.update', $admin), ['name' => str_random(256), 'email' => '']);
        $response->assertSessionHasErrors(['name', 'email']);
        $response->assertStatus(Response::HTTP_FOUND);
        $response = $this->put(route('dashboard.admins.update', $admin), ['password' => 'secret']);
        $response->assertSessionHasErrors(['password']); // Password not confirmed.
        $response->assertStatus(Response::HTTP_FOUND);
        $data = $data + [
                'password_confirmation' => 'secret',
                'avatar' => 'any string',
            ];
        $response = $this->put(route('dashboard.admins.update', $admin), $data);
        $response->assertSessionHasErrors(['avatar']); // Avatar is not valid image
        $response->assertStatus(Response::HTTP_FOUND);
    }

    /**
     * @test
     */
    public function it_can_store_newly_created_admin()
    {
        $this->be(create(Admin::class));
        $data = [
            'name' => 'Ahmed Fathy',
            'email' => 'test@gmail.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

        $response = $this->post(route('dashboard.admins.store'), $data);

        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('users', ['type' => Admin::ADMIN_TYPE, 'name' => $data['name']]);
    }
}
