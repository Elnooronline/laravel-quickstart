<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;

class AdminPresenter extends Presenter
{
    /**
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function thumbAvatar()
    {
        $admin = $this->entity;

        return new HtmlString(view('dashboard.admins.partials.presenters.thumb-avatar', compact('admin'))->render());
    }

    /**
     * display the entity delete button.
     *
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function deleteButton()
    {
        if ($this->entity->is(auth()->user())) {
            return;
        }

        return parent::deleteButton();
    }

    public function controlButton()
    {
        if ($this->entity->is(auth()->user())) {
            $this->displayDeleteButton = false;
        }

        return parent::controlButton();
    }
}
