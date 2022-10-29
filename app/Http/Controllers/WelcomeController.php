<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutResource;
use App\Http\Resources\ProjectDevResource;
use App\Http\Resources\ProjectResource;
use App\Models\About;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome(){
        $abouts = AboutResource::collection(About::all());
        $projs = ProjectDevResource::collection(ProjectType::all());
        $projects = ProjectResource::collection(Project::with('projectType')->get());
        return Inertia::render('Welcome',compact('abouts','projects','projs'));
    }
}
