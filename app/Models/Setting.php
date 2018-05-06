<?php

namespace App\Models;

use App\Models\Concerns\Resourcable;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Concerns\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Elnooronline\LaravelSettings\Models\SettingModel;

class Setting extends SettingModel implements HasMedia
{
    use HasMediaTrait, Resourcable;

    /**
     * Register the conversions for the specified model.
     *
     * @param \App\Models\Concerns\Media|null $media
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(70)
            ->height(70)
            ->format('png');

        $this->addMediaConversion('small')
            ->width(120)
            ->height(120)
            ->format('png');

        $this->addMediaConversion('medium')
            ->width(160)
            ->height(160)
            ->format('png');

        $this->addMediaConversion('large')
            ->width(320)
            ->height(320)
            ->format('png');
    }
}
