<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;

class AdminPresenter extends Presenter
{
    /**
     * @return \Illuminate\Support\HtmlString
     * @throws \Throwable
     */
    public function thumbAvatar()
    {
        $admin = $this->entity;

        return new HtmlString(view('dashboard.admins.partials.presenters.thumb-avatar', compact('admin'))->render());
    }
}