<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $projects = ProjectResource::collection(Project::with('projectType')->get());
        return Inertia::render('Projects/Index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets= ProjectType::all();
        return Inertia::render('Projects/Create', compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'name' =>['required', 'min:3'],
            'proj_id'=>['required'],
            'location'=>['required'],
            'completion'=>['required']
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('projects');
            Project::create([
                'name'=>$request->name,
                'project_type_id'=>$request->proj_id,
                'image'=>$image,
                'location'=>$request->location,
                'other_detail'=>$request->detail,
                'compl_year'=>$request->completion
            ]);
            return Redirect::route('projects.index');

        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projectType = ProjectType::all();
        return Inertia::render('Projects/Edit',compact('project','projectType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $image = $project->image;

        $request->validate([
            'name' =>['required', 'min:3'],
            'proj_id'=>['required'],
            'location'=>['required'],
            'completion'=>['required']
        ]);
        if($request->hasFile('image')){
            Storage::delete($project->image);
            $image = $request->file('image')->store('projects');
        }
        $project->update([
            'name'=>$request->name,
            'project_type_id'=>$request->proj_id,
            'image'=>$image,
            'location'=>$request->location,
            'other_detail'=>$request->detail,
            'compl_year'=>$request->completion
        ]);
        return Redirect::route('projects.index')->with('message', 'Project updated successfull');

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return Redirect::back()->with('message', 'Project deleted successfull');
    }
}
