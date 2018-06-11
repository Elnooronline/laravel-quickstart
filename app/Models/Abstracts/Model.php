<?php

namespace App\Models\Abstracts;

use App\Models\Concerns\Presentable;
use App\Models\Concerns\Resourcable;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    use Resourcable, Presentable;

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = '';
}
