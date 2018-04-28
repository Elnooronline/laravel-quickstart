<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Concerns\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name'];
}
