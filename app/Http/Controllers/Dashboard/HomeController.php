<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the dashboard home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        flash(trans('dashboard.messages.welcome', [
            'user' => $request->user()->name
        ]))->important();

        return view('dashboard.home');
    }
}
