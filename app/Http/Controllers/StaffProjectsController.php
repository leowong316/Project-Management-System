<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Project;
use App\Project_Staff;

class StaffProjectsController extends Controller
{
    public function index(){
        $projects = DB::table('projects')
            ->join('Project_Staff', 'projects.id', '=', 'project_staff.project_id')
            ->select('projects.*')
            ->where('project_staff.user_id',auth()->id())
            ->get();
        return view ('staffprojects.index',compact('projects'));
    }
}
