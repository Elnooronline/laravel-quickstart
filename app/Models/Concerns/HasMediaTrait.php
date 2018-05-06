<?php

namespace App\Models\Concerns;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait as HasMedia;

trait HasMediaTrait
{
    use HasMedia;

    /**
     * Remove existing media items and add the new base64 fle if preset.
     *
     * @param string $file
     * @param string $collection
     * @return void
     */
    public function addOrUpdateMediaFromBase64($file, $collection = 'default')
    {
        $base64 = request($file);

        // Check if it's base64
        // clear all the media in this collection
        // add the base64 image given
        if ($base64 && base64_decode(base64_encode($base64)) === $base64) {
            $this->clearMediaCollection($collection);
            $this->addMediaFromBase64($base64)->withResponsiveImages()->toMediaCollection($collection);
        }
    }

    /**
     * Remove existing media items and add the new one if preset.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function addOrUpdateMediaFromRequest($name, $collection = 'default')
    {
        $request = request();

        if ($request->hasFile($name)) {
            $this->clearMediaCollection($collection);
            $this->addMediaFromRequest($name)->withResponsiveImages()->toMediaCollection($collection);
        }
    }

    /**
     * Remove existing media items and add the new one if preset.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function addOrUpdateMultipleMediaFromRequest($name, $collection = 'default')
    {
        $request = request();
        if ($request->hasFile($name)) {
            $this->clearMediaCollection();
            $this->addMultipleMediaFromRequest([$name])->each(function ($media) use ($collection) {
                $media->toMediaCollection($collection);
            });
        }
    }

    /**
     * Copy existing media items and add the new one if preset.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function copyMediaFromCollection($name, $collection = 'default')
    {
        $this->getMedia($name)->each(function ($media) use ($collection) {
            $this->addOrUpdateMediaFromUrl($media->getUrl(), $collection);
        });
    }

    /**
     * Remove existing media items and add the new one if preset.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function addOrUpdateMediaFromUrl($url, $collection = 'default')
    {
        $this->clearMediaCollection($collection);
        $this->addMediaFromUrl($url)->withResponsiveImages()->toMediaCollection($collection);
    }

    /**
     * Remove existing media items and add the new one if preset.
     *
     * @param $path
     * @param string $collection
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     * @return void
     */
    public function addOrUpdateMediaFromPath($path, $collection = 'default')
    {
        $this->clearMediaCollection($collection);
        $this->addMedia($path)->withResponsiveImages()->toMediaCollection($collection);
    }

    /**
     * add a new images into the collection.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function addMultibyteOrBase64MediaFromRequest($name, $collection = 'default')
    {
        $request = request();

        // Handle base64 that coming from request,
        // Like 'image_base64', upload and add to $collection.
        foreach (request($name.'_base64', []) as $file) {
            if (base64_decode(base64_encode($file)) === $file) {
                $this->addMediaFromBase64($file)->withResponsiveImages()->toMediaCollection($collection);
            }
        }

        // Handle normal files that coming from request.
        if ($request->hasFile($name)) {
            foreach ($request->$name as $file) {
                $this->addMedia($file)->withResponsiveImages()->toMediaCollection($collection);
            }
        }
    }

    /**
     * add a new images into the collection.
     *
     * @param string $name
     * @param string $collection
     * @return void
     */
    public function addMultibyteMediaFromRequest($name, $collection = 'default')
    {
        $request = request();

        // Handle normal files that coming from request.
        if ($request->hasFile($name)) {
            foreach ($request->$name as $file) {
                $this->addMedia($file)->withResponsiveImages()->toMediaCollection($collection);
            }
        }
    }

    /**
     * Get the url of the image for the given conversionName
     * for first media for the given collectionName.
     * If  cannot find a media return a default placeholder.
     *
     * @param string $collectionName
     * @param string $conversionName
     * @return string
     */
    public function getFirstOrDefaultMediaUrl(string $collectionName = 'default', $conversionName = '')
    {
        $url = $this->getFirstMediaUrl($collectionName, $conversionName) ?: $this->getFirstMediaUrl($collectionName);

        if (empty($url)) {
            if ($this instanceof User) {
                return url('images/user.png');
            }

            return 'http://via.placeholder.com/150x150';
        }

        return $url;
    }
}
