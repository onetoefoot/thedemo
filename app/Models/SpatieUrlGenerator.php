<?php

namespace App\Models;

use DateTimeInterface;
use \Spatie\MediaLibrary\UrlGenerator\BaseUrlGenerator;

class SpatieUrlGenerator extends BaseUrlGenerator
{
    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getUrl() : string
    {
        return config('app.url').'/storage/'.$this->getPathRelativeToRoot();
    }

    /**
     * Get the temporary url for a media item.
     *
     * @param \DateTimeInterface $expiration
     * @param array $options
     *
     * @return string
     */
    
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string
    {
        return $this
            ->filesystemManager
            ->disk($this->media->disk)
            ->temporaryUrl($this->getPath(), $expiration, $options);
    }
    
    /**
     * Get the url to the directory containing responsive images.
     *
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl(): string
    {
        return config('app.url').'/'.$this->pathGenerator->getPathForResponsiveImages($this->media);
    }

    public function getPath()
    {
        return $this->getPathRelativeToRoot();
    }
}
