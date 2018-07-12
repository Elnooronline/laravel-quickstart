<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => trans($this->data['message'], $this->data['localed_data']),
            'dashboard_url' => route(
                $this->data['dashboard_route'],
                $this->data['dashboard_route_data'] + ['notification_id' => $this->id]
            ),
            'url' => route(
                $this->data['route'],
                $this->data['route_data'] + ['notification_id' => $this->id]
            ),
            'date' => $this->created_at,
            'formated_date' => $this->created_at->diffForHumans(),
        ];
    }
}
