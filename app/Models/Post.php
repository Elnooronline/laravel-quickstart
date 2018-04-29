<?php

namespace App\Models;

use App\Models\Abstracts\MediableModel;

class Post extends MediableModel
{
    protected $fillable = ['name'];
}
