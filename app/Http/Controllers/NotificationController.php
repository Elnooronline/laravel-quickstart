<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NorificationCollection;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index(Request $request)
    {

        if (request()->wantsJson() || $request->input('type') == 'json') {
            if ($request->input('limit')) {
                $notifications = auth()->user()->notifications()->latest()->limit($request->input('limit'))->get();
            } else {
                $notifications = auth()->user()->notifications()->latest()->simplePaginate()->appends($request->all());
            }

            return new NorificationCollection($notifications);
        }
        abort_if(! auth()->user()->isAdmin(), 404);

        return view('dashboard.notifications.index');
    }
}
