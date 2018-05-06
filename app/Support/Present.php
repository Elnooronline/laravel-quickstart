<?php

namespace App\Support;

use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Model;

class Present
{
    /**
     * @var string
     */
    private $resource;

    /**
     * Present constructor.
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function __get($name)
    {
        return $this->{$name}();
    }

    /**
     * The presenter for create button.
     *
     * @param \Illuminate\Database\Eloquent\Model|null $parent
     * @throws \Throwable
     * @return \Illuminate\Support\HtmlString
     */
    public function createButton(Model $parent = null, $label = 'create')
    {
        $resource = $this->resource;
        if ($parent) {
            return new HtmlString(view(
                'layouts.dashboard.presenters.nested-list.create',
                compact('resource', 'parent', 'label')
            )->render());
        }

        return new HtmlString(view('layouts.dashboard.presenters.list.create', compact('resource', 'label'))->render());
    }
}
