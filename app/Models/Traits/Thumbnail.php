<?php


namespace App\Models\Traits;


trait Thumbnail
{
    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getThumbnailUrlAttribute()
    {
        if (env('APP_ENV') == 'production')
            return $this->cloudUrl();
        else
            return $this->defaultLocalUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultLocalUrl()
    {
        return config('app.url') . '/' . $this->thumbnail;
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function cloudUrl()
    {
        return config('filesystems.disks.yesayasoftware.endpoint_url') . $this->thumbnail;
    }
}
