<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Project;
use App\Project_Staff;
use App\Task;
use App\User;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        //admin
        //list all projects

        //staff
        //list projects with staff id
        // $projects = DB::table('projects')
        //     ->join('Project_Staff', 'projects.id', '=', 'project_staff.project_id')
        //     ->select('projects.*')
        //     ->where('project_staff.user_id',auth()->id())
        //     ->get();
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        $users = User::where('type','0')->get();
        return view('projects.create',compact('users'));
    }

    public function store()
    {
        $project = Project::create(request()->except('_token','taskname','taskdescription','staff'));

        //if got taskname && teskdescription
        //foreach taskname
        if (request('taskname')) {
            foreach(request('taskname') as $key => $task) {
                $desc = request('taskdescription')[$key];
                
                Task::create([
                    'project_id' => $project->id,
                    'name' => $task,
                    'description' => $desc
                ]);
            }
        }
        if (request('staff')){
            foreach(request('staff') as $key => $staff){
                Project_Staff::create([
                    'project_id' => $project->id,
                    'user_id' => $staff
                ]);
            }
        }
        
        return redirect('projects');
    }

    public function edit(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->get();
        return view('projects.edit',compact('project', 'tasks'));
    }

    public function update(Project $project)
    {
        $project->update(request()->except('_method','_token'));
        return redirect('projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }

    public function show(Project $project)
    {
        return view('projects.show',compact('project'));
    }

    public function getProjectTask($id)
    {
        return Project::where('id', $id)->with('Task')->first()->task; 
        //the other method ('id', $id)->with('Task')->get() console.log(ourData[0].task) 0 meant first .task meant ->task;
    }

    public function getProject($id)
    {
        // $projects = Project::all();
        $projects = DB::table('projects')
            ->join('Project_Staff', 'projects.id', '=', 'project_staff.project_id')
            ->select('projects.*')
            ->where('project_staff.user_id',$id)
            ->get();
        return $projects;
    }
}
