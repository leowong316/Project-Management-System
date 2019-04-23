<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_Staff;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // $attributes = auth()->id();
        // dd($attributes);
        return request()->except('_token');

        $project = Project::create([
            'name' => request('name'),
            'description' => request('description'),
            'start_date' => request('start-date'),
            'end_date' => request('end-date'),
            'fee' => request('fee')
        ]);

        Project_Staff::create([
            'project_id' => $project->id,
            'user_id' => auth()->id()
        ]);

        return redirect('projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    public function update(Project $project)
    {
        $project->name = request('name');
        $project->description = request('description');
        $project->start_date = request('start-date');
        $project->end_date = request('end-date');
        $project->fee = request('fee');
        $project->save();

        return redirect('projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
