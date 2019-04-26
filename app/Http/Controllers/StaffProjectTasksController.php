<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Work;

class StaffProjectTasksController extends Controller
{
    public function create(Project $project){
        $tasks = Task::where('project_id',$project->id)->get();
        return view('staffProjects.tasks.create', compact('tasks','project'));
    }

    public function store($id){
        // return request()->all();
        Work::create([
            'project_id' => $id,
            'task_name' => request('task'),
            'task_description' => request('description'),
            'date' => request('date'),
            'duration' => request('duration'),
            'status' => request('status')
        ]);

        return redirect('staffprojects');
    }
}
