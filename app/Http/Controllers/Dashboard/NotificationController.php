<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * List the authenticated user notifications.
     *
     * @return \App\Http\Resources\NotificationCollection|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function index()
    {
        return view('dashboard.notifications.index');
    }
}
