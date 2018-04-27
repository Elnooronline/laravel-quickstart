<?php

namespace App\Models\Concerns;

use Laracasts\Presenter\PresentableTrait;
use App\Models\Presenters\Urls\Presenter as UrlPresenter;

trait Presentable
{
    use PresentableTrait;

    /**
     * The url presenter instance
     *
     * @var mixed
     */
    protected $urlPresenterInstance;

    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     * @throws PresenterException
     */
    public function getUrlAttribute()
    {
        return $this->url();
    }

    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     * @throws PresenterException
     */
    public function url($prefix = null)
    {
        if (! $this->urlPresenter or ! class_exists($this->urlPresenter)) {
            $this->urlPresenterInstance = new UrlPresenter($this, $prefix);
        }

        if (! $this->urlPresenterInstance) {
            $this->urlPresenterInstance = new $this->urlPresenter($this, $prefix);
        }

        return $this->urlPresenterInstance;
    }
}