<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NorificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $notification = $this->resource;
        $user = notification_target($notification);

        return [
            'image' => url($user->getFirstOrDefaultMediaUrl()),
            'title' => trans($notification->data['title'], ['user' => $user->name]),
            'body' => trans($notification->data['body'], ['user' => $user->name]),
            'url' => $this->getLink(),
            'date' => $notification->created_at->diffForHumans(),
        ];
    }

    private function getLink()
    {
        $notification = $this->resource;
        $user = notification_target($notification);

        $route = 'route';
        if (request('notification_type') == 'dashboard') {
            $route = 'dashboard_route';
        }

        return route($notification->data[$route], [
            $user,
            'notification_id' => $notification->id,
        ]);
    }
}
