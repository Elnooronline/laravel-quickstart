<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait Resourcable
{
    /**
     * Get The resource name for the specified model.
     *
     * @return string
     */
    public function getResourceName()
    {
        if (property_exists($this, 'resourceName')) {
            return $this->resourceName;
        }

        return Str::plural(Str::lower(class_basename(static::class)));
    }
}
