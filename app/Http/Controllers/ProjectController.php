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
         $this->middleware('auth');
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
//        $this->middleware('auth');


        // Validating entered info
        $projectData = request()->validate([
            'title' => 'required|min:5|max:60',
            'keywords' => 'required',
            'live_link' => 'nullable|url',
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
    public function edit(Project $slug)
    {
        return view('editProject', ['project' => $slug]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        // Validating entered info
        $projectData = request()->validate([
            'title' => 'required|min:5|max:60',
            'keywords' => 'required',
            'live_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'slug' => 'required|alpha_dash',
            'active' => 'sometimes',
            'content' => 'required',
            'published_date' => 'required',
        ]);
        // If no new thumb, dont store it
        if( !$request->thumbnail_image == null) {
            // Store thumb image seperately
            $thumbName = $this->storeImages($request['thumbnail_image'], 'project_images/thumbnails');
            // Reassigning thumbnail image
            $projectData['thumbnail_image'] = $thumbName[0];
        }


        $project = Project::where('slug', $slug)->first();

        // There has to be a better way to do this
        $project->update(
            [
                'title'         => $request['title'],
                'keywords'      => $projectData['keywords'],
                'live_link'     => $projectData['live_link'],
                'github_link'   => $projectData['github_link'],
                'active'        => $projectData['active'],
                'content'       => $projectData['content'],
                'published_date'=> $projectData['published_date'],
                'slug'          => $projectData['slug'],
                'developers'    => $request->developers,
                'vormgevers'    => $request->vormgevers,
                'thumbnail_image' => $projectData['thumbnail_image']
            ]);

        return redirect('/admin/projecten');
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
