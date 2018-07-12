<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * List the authenticated user notifications.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\NotificationCollection|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function index(Request $request)
    {
        $notifications = auth()->user()->notifications()->latest()->limit($request->input('limit'))->get();

        return new NotificationCollection($notifications);
    }

    /**
     * List the authenticated user notifications.
     *
     * @return \App\Http\Resources\NotificationCollection|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function paginate()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate();

        return new NotificationCollection($notifications);
    }
}
