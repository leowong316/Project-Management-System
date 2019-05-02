<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Task;
use App\Project;

class WorksController extends Controller
{
    public function edit(Work $work){
        $tasks = Task::where('project_id',$work->project_id)->get();
        
        return view('projects.works.edit',compact('work','tasks'));
    }
    
    public function update(Work $work){
        $work->update(request()->except('_token','_method'));
        return redirect('/projects/'.$work->project_id.'/edit');
    }

    public function create(Project $project){
        // return $project->project_staff[0]->user;
        return view('projects.works.create',compact('project'));
    }

    public function store(Project $project){
        $work = new Work(request()->except('_token'));
        $work->project_id = $project->id;
        $work->save();
        return redirect('/projects/'.$project->id.'/edit');
    }
}
