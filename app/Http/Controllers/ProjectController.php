<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\FotoLocation;
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

        // Store thumb image seperately
        $thumbName = $this->storeImages($projectData['thumbnail_image'], 'project_images/thumbnails');
        // Reassigning thumbnail image
        $projectData['thumbnail_image'] = $thumbName[0];

        /**
         * Insert project before extra images
         * Storage of extra images requires id of new project
         */
        Project::create($projectData);

        // Giving all images, storing one by one, put into foto_project (many to many) table, returning array with all new image names
        $extraImages = $this->storeImages($request->project_image, 'project_images');
        $this->insertImages($extraImages);

        return redirect('/admin/projecten');
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
    public function destroy($slug)
    {
        // Find project attached to slug
        $toDelete = Project::where('slug', $slug)->first();

        // Delete foto_locations where project id is ToDelete
        $toDelete->images()->detach();

        // Delete self
        $toDelete->delete();

        return redirect('admin/projecten');
    }
}
