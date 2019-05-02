@extends('admin_template')

@section('pageTitle', 'Create')

@section('title','Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add Work</h3>
    </div>
        <div class="box-body">
            <form method="POST" class="form-horizontal" action="/works/{{$project->id}}" name="form">
                @csrf
                <div class="form-group">
                    <label for="project" class="control-label col-sm-2">Task Title</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="task_name" style="width: 100%;">
                        @foreach ($project->task as  $task)
                            <option value="{{$task->name}}">{{$task->name}}</option>
                        @endforeach
                            <option value="other">Other</option>
                        </select>
                    </div>      
                </div>
                <div class="form-group">
                    <label for="desctiption" class="control-label col-sm-2">Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="task_description" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="control-label col-sm-2">Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" name="date" value="{{date('Y-m-d')}}" id="">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="duration" class="control-label col-sm-2">Duration</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="duration" style="width: 100%;">
                            <option value="0.5">30 minutes</option>
                            <option value="1">1 Hour</option>
                            <option value="1.5">1 Hour 30 minutes</option>
                            <option value="2">2 Hours</option>
                            <option value="2.5">2 Hours 30 minutes</option>   
                            <option value="3">3 Hours</option>
                            <option value="3.5">3 Hours 30 minutes</option>   
                            <option value="4">4 Hours</option>   
                            <option value="4.5">4 Hours 30 minutes</option>
                            <option value="5">5 Hours</option>
                            <option value="5.5">5 Hours 30 minutes</option>
                            <option value="6">6 Hours</option>   
                            <option value="6.5">6 Hours 30 minutes</option>
                            <option value="7">7 Hours</option>
                            <option value="7.5">7 Hours 30 minutes</option>
                            <option value="8">8 Hours</option>     
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="control-label col-sm-2">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status" style="width: 100%;">
                            <option value="0">In-progress</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="control-label col-sm-2">Staff</label>
                    <div class="col-sm-8">
                        <select class="form-control " name="user_id" style="width: 100%;">
                            @foreach ($project->project_staff as $staff)
                            <option value="{{$staff->user->id}}">{{$staff->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                <label for="fee" class="control-label col-sm-2"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-block">Submit</button> 
                    </div>       
                </div>
            </form>
        </div>
    </div> 
</div>
@endsection