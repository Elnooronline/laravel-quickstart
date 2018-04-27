<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait Resourcable
{
    /**
     * The resource name for the specified model.
     * used in route, view paths and lang file name.
     *
     * @var string
     */
    protected $resourceName;

    /**
     * Get The resource name for the specified model.
     *
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * Set The resource name for the specified model.
     *
     * @return void
     */
    public function setResourceName($resourceName = null)
    {
        $this->resourceName = $resourceName;

        if (! $resourceName && ! $this->resourceName) {
            $this->resourceName = Str::plural(Str::lower(class_basename(static::class)));
        }
    }
}