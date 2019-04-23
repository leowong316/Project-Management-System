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
        return redirect('/projects/'.$task->project_id);
    }

    public function create(Project $project)
    {
        return view('projects.tasks.create',compact('project'));
    }

    public function store(Project $project)
    {
        Task::create([
            'project_id' => $project->id,
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/projects/'.$project->id.'/tasks');
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
