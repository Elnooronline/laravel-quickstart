<?php

namespace App\Models\Concerns;


use Spatie\MediaLibrary\Models\Media;

trait HasMediaConversions
{
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