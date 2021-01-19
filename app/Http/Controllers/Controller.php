<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Project;
use App\Models\FotoLocation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $images
     * @param $location
     * @return array
     *
     * Giving all images, storing one by one, returning array with all new image names
     */
    public function storeImages($images, $location)
    {
        // Init image name storage array
        $newImageNames = [];

        // Check if $images is an array
        if (is_array($images)) {

            // Loop through every image, store it, push new image name to array $newImageNames[]
            foreach ($images as $image) {
                // Store image in project_images folder
                $newName = $image->store($location, 'public');

                // Send to array
                array_push($newImageNames, $newName);
            }
        } else {
            // Store image in project_images folder
            $newName = $images->store($location, 'public');

            // Send to array
            array_push($newImageNames, $newName);
        }



        return $newImageNames;
    }

    /**
     * @param $imgArray
     *
     * Loop through all image links, insert into fotos table
     */
    public function insertImages($imgArray)
    {
        // Loop through all new image links
        foreach ($imgArray as $image) {
            // Get foto and fotoLocation class
            $foto = new Foto;

            // Into new foto class insert image link
            $foto->link = $image;

            // Execute insert
            $foto->save();

            // Insert last inserted foto into the foto_project pivot table
            $this->connectFotoProject();
        }
    }

    /**
     * Insert new row into foto_project table
     */
    public function connectFotoProject() {
        // Get new foto_project class
        $foto_project = new FotoLocation;

        // Enter ID's of most recent insert
        $foto_project->image_id     = Foto::orderby('id', 'desc')->first()->id;
        $foto_project->project_id   = Project::orderby('id', 'desc')->first()->id;

        // Insert
        $foto_project->save();
    }
}


