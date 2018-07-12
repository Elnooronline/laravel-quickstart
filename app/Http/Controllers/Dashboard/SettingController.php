<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use Elnooronline\LaravelSettings\Facades\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.settings.index');
    }

    /**
     * Update the website global settings.
     *
     * @param \App\Http\Requests\Dashboard\SettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if (! $request->hasFile($key)) {
                Setting::set($key, $value);
            } else {
                Setting::set($key)->addOrUpdateMediaFromRequest($key);
            }
        }

        $this->flash('updated');

        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lang($localeCode)
    {
        session()->put('locale', $localeCode);

        return back();
    }
}
