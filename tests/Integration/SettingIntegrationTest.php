<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use Elnooronline\LaravelSettings\Facades\Setting;

class SettingIntegrationTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_set_and_get_data()
    {
        Setting::set('name', 'Ahmed Fathy');
        Setting::set('phone', '021207687151');

        $this->assertEquals(Setting::get('phone'), '021207687151');
        $this->assertEquals(Setting::get('name'), 'Ahmed Fathy');
    }
}
