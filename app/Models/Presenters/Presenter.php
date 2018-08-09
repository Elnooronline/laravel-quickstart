<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;
use Laracasts\Presenter\Presenter as LaracastsPresenter;

class Presenter extends LaracastsPresenter
{
    /**
     * @var bool
     */
    protected $displayShowButton = true;

    /**
     * @var bool
     */
    protected $displayEditButton = true;

    /**
     * @var bool
     */
    protected $displayDeleteButton = true;

    /**
     * display the entity edit button.
     *
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function editButton()
    {
        $entity = $this->entity;
        $resource = $this->entity->getResourceName();

        return new HtmlString(
            view(
                'layouts.dashboard.presenters.resource.edit',
                compact('entity', 'resource')
            )->render()
        );
    }

    /**
     * display the entity delete button.
     *
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function deleteButton()
    {
        $entity = $this->entity;
        $resource = $this->entity->getResourceName();

        return new HtmlString(
            view('layouts.dashboard.presenters.resource.delete', compact('entity', 'resource'))->render()
        );
    }

    /**
     * Display show, edit and delete buttons.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function controlButton()
    {
        $entity = $this->entity;
        $resource = $this->entity->getResourceName();

        $present = [
            'show' => $this->displayShowButton,
            'edit' => $this->displayEditButton,
            'delete' => $this->displayDeleteButton,
        ];

        return new HtmlString(view(
            'layouts.dashboard.presenters.resource.control',
            compact('entity', 'resource', 'present')
        )->render());
    }
}
