<?php

namespace App\Models;

use App\Models\Concerns\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['name'];
}
