<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The resource name of the controller.
     *
     * @var null
     */
    protected $resourceName = null;

    /**
     * Send a flash message.
     *
     * @param  string $event
     * @param  string $level
     * @param  string $lang
     * @return \App\Http\Controllers\Controller
     */
    public function flash($event = 'created', $level = 'success', $lang = null)
    {
        if (! $lang) {
            $lang = $this->getResourceName();
        }

        flash(trans($lang.'.messages.'.$event), $level);

        return $this;
    }

    /**
     * The resource name of the controller.
     *
     * @return string
     */
    protected function getResourceName()
    {
        if (! $this->resourceName) {
            return Str::plural(Str::snake(Str::replaceLast('Controller', '', class_basename($this))));
        }

        return $this->resourceName;
    }
}
