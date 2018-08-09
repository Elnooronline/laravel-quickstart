<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
    /**
     * @return \Illuminate\Support\HtmlString
     */
    public function thumbAvatar()
    {
        $user = $this->entity;

        return new HtmlString(view('layouts.dashboard.presenters.users.thumb_avatar', compact('user'))->render());
    }

    /**
     * {@inheritdoc}
     */
    public function deleteButton()
    {
        if (! $this->entity->is(auth()->user())) {
            return parent::deleteButton();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function controlButton()
    {
        if ($this->entity->is(auth()->user())) {
            $this->displayDeleteButton = false;
        }

        return parent::controlButton();
    }
}
