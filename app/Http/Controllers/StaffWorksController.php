<?php

namespace App\Http\Controllers;
use App\Project_Staff;
use App\Work;

use Illuminate\Http\Request;

class StaffWorksController extends Controller
{
    public function index(){
        $works = Work::where('user_id',auth()->id())->get();
        return view('staffworks.index',compact('works'));
    }
    public function create(){
        $projects = Project_staff::where('user_id',auth()->id())->get();
        // return $projects[0]->project;
        return view('staffWorks.create',compact('projects'));
    }
    public function store(){
        $work = new Work (request()->except('_token'));
        $work->user_id = auth()->id();
        $work->save();
        return redirect ('/staffworks');
    }
    public function edit($id){
        $works = Work::find($id);
        // return $works->project->task;
        return view('staffworks.edit',compact('works'));
    }
    public function update($id){
        
        $work = Work::find($id);
        $work->update(request()->except('_token','_method'));
        $work->save();

        return redirect('/staffworks');
    }
}
