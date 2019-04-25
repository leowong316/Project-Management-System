<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_Staff;
use App\Task;
use App\User;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        $users = User::where('type','0')->get();
        return view('projects.create',compact('users'));
    }

    public function store()
    {
        // $attributes = auth()->id();
        // dd($attributes);
        $project = Project::create(request()->except('_token','taskname','taskdescription','staff'));

        Project_Staff::create([
            'project_id' => $project->id,
            'user_id' => auth()->id()
        ]);
        
        if (request('staff') != '' )
        {
            $staff = request('staff');
            for($i = 0;$i<count($staff);$i++)
            {
                Project_Staff::create([
                    'project_id' => $project->id,
                    'user_id' => $staff[$i]
                ]);
            }
        }
        
        if (request('taskname') !=null )
        {
            $attributes = request([
                'taskname',
                'taskdescription'
            ]);
            $a = $attributes['taskname'];
            $b = $attributes['taskdescription'];
            for($i = 0;$i<count($attributes);$i++)
            {
                Task::create([
                    'project_id' => $project->id,
                    'name' => $a[$i],
                    'description' => $b[$i]
                ]);
            }
        }
        
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

    public function getProjectTask($id)
    {
        return Project::where('id', $id)->with('Task')->first()->task; 
    }
}
