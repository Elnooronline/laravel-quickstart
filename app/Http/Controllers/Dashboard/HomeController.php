<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the dashboard home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.home');
    }
}
