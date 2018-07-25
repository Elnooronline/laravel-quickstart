<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display list of all admins.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admins = Admin::paginate();

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show specific admin.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Admin $admin)
    {
        return view('dashboard.admins.show', compact('admin'));
    }

    /**
     * Display creation form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\AdminRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->data());

        $admin->addOrUpdateMediaFromRequest('avatar');

        $this->flash('created');

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Display editing form.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update admin.
     *
     * @param \App\Http\Requests\Dashboard\AdminRequest $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update($request->data());

        $admin->addOrUpdateMediaFromRequest('avatar');

        $this->flash('updated');

        return redirect()->route('dashboard.admins.show', $admin);
    }

    /**
     * Delete admin.
     *
     * @param \App\Models\Admin $admin
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        $this->flash('deleted');

        return redirect()->route('dashboard.admins.index');
    }
}
