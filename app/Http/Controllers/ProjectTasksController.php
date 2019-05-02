<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function edit(Task $task)
    {
        return view('projects.tasks.edit',compact('task'));
    }

    public function update(Task $task)
    {
        $task->name = request('name');
        $task->description = request('description');
        $task->save();
        return redirect('/projects/'.$task->project_id.'/edit');
    }

    public function create(Project $project)
    {
        return view('projects.tasks.create',compact('project'));
    }

    public function store(Project $project)
    {
        if(request('taskname')){
            foreach(request('taskname') as $key => $task){
                $desc = request('taskdescription')[$key];
                Task::create([
                    'project_id' => $project->id,
                    'name' => $task,
                    'description' => $desc
                ]);
            }
        }
        return redirect('/projects/'.$project->id.'/edit');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

    public function show(Project $project)
    {
        return view('projects.tasks.show',compact('project'));
    }
}
