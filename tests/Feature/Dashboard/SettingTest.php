<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Http\Response;
use Elnooronline\LaravelBootstrapForms\Facades\BsForm;

class SettingTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_display_the_website_settings()
    {
        $this->be(create(Admin::class));

        $response = $this->get(route('dashboard.settings.index'));

        $response->assertSuccessful();

        $response->assertSee(BsForm::text('name')->toHtml());
    }

    /**
     * @test
     */
    public function it_can_update_the_website_settings()
    {
        $this->be(create(Admin::class));

        $response = $this->put(route('dashboard.settings.update', [
            'name' => 'demo',
        ]));

        $response->assertStatus(Response::HTTP_FOUND);

        $this->assertDatabaseHas('settings', [
            'key' => 'name',
            'value' => 'demo',
        ]);
    }
}
