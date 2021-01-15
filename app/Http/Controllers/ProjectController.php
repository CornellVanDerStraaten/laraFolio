<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Only usable for logged in users
        $this->middleware('auth');


        // Validating entered info
        $projectData = request()->validate([
            'title' => 'required|min:5|max:60',
            'keywords' => 'required',
            'live_link' => 'nullable|url|unique:table,column,except,id',
            'github_link' => 'nullable|url',
            'slug' => 'required|alpha_dash|unique:projects,slug',
            'active' => 'sometimes',
            'content' => 'required',
            'published_date' => 'required',
            'thumbnail_image' => 'image'
        ]);

        // Giving all images, storing one by one, returning array with all new image names
        $this->storeProjectImages($request->project_image);

        // Store thumb image seperately
        $newThumbName = $projectData['thumbnail_image']->store('project_images/thumbnails', 'public');
        $projectData['thumbnail_image'] = $newThumbName;


        Project::create($projectData);
    }


    /**
     * Giving all images, storing one by one, returning array with all new image names
     *
     * Idea for later: Make this function for every image on the site with switch statement?
     */
    public function storeProjectImages($images)
    {
        // Init image name storage array
        $newImageNames = [];

        // Loop through every image, store it, push new image name to array $newImageNames[]
        foreach ($images as $image) {
            // Store image in project_images folder
            $newName = $image->store('project_images', 'public');
            $image = $newName;

            // Send to array
            array_push($newImageNames, $image);
        }

        return $newImageNames;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
