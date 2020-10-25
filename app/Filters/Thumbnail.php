<?php

namespace App\Filters;


use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Thumbnail
{

    /**
     * Store the specified resource to a specified disk.
     *
     * @param Request $request
     * @param String $directory
     *
     * @return false|string
     */
    public function storeThumbnail(Request $request, String $directory)
    {
        if (env('APP_ENV') == 'production')
            return $request->file('thumbnail')
                ->store('yesaya-software/img/' . $directory, 'yesayasoftware');
        else
            return $request->file('thumbnail')
                ->store('img/categories', 'public');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $path
     * @return void
     */
    public function deleteThumbnail(String $path)
    {
        if (env('APP_ENV') == 'production')
            !Storage::disk('yesayasoftware')->exists($path) ?:
                Storage::disk('yesayasoftware')->delete($path);
        else
            !Storage::disk('public')->exists($path) ?:
                Storage::disk('public')->delete($path);
    }

}
