<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Giving all images, storing one by one, returning array with all new image names
     *
     * Idea for later: Make this function for every image on the site with switch statement?
     */
    public function storeImages($images, $location)
    {
        // Init image name storage array
        $newImageNames = [];

        // Loop through every image, store it, push new image name to array $newImageNames[]
        foreach ($images as $image) {
            // Store image in project_images folder
            $newName = $image->store($location, 'public');
            $image = $newName;

            // Send to array
            array_push($newImageNames, $image);
        }

        return $newImageNames;
    }
}
