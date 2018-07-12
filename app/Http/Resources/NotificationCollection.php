<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $notifications = $this->resource;

        return [
            'count' => auth()->user()->notifications->count(),
            //'have_message' => trans_choice('notifications.have', auth()->user()->notifications->count()),
            'link' => route('dashboard.notifications'),
            //'all_message' =>trans('notifications.all'),
            'data' => NotificationResource::collection($notifications),
            //'previous_message' => trans('pagination.previous'),
            //'next_message' => trans('pagination.next'),
        ];
    }
}
