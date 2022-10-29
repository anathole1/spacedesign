<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectDevResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets= ProjectDevResource::collection(ProjectType::all());
        return Inertia::render('Ptypes/Index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return Inertia::render('Ptypes/Create');
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
            'name'=>['required', 'min:3']
        ]);
        ProjectType::create([
            'name'=>$request->name
        ]);

        return Redirect::route('project_type.index')->with('message', 'Project Type created successfull');
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
    public function edit(ProjectType $projectType)
    {
        // dd($projectype);
        return Inertia::render('Ptypes/Edit', compact('projectType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectType $projectType)
    {
        $request->validate([
            'name'=>['required', 'min:3']
        ]);
        $projectType->update([
            'name'=>$request->name,
            
        ]);
        return Redirect::route('project_type.index')->with('message', 'Type of development Updated successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return Redirect::route('project_type.index')->with('message', 'Type of development Deleted successfull');
    }
}
