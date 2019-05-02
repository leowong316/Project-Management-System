@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Project</h3>
    </div>
    <div class="box-body">
        <form method="POST" class="form-horizontal" action="/projects/{{$project->id}}">
        @method('PATCH')
        @csrf 
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Project Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{$project->name}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="desctiption" class="control-label col-sm-2">Description</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$project->description}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="start_date" class="control-label col-sm-2">Start Date</label>
                <div class="col-sm-8">
                    <input class="form-control" type="date" name="start_date" id="" value="{{$project->start_date}}">
                </div>
            </div>

            <div class="form-group">
                <label for="end_date" class="control-label col-sm-2">End Date</label>
                <div class="col-sm-8">
                    <input class="form-control" type="date" name="end_date" id="" value="{{$project->end_date}}">
                </div>
            </div>

            <div class="form-group">
                <label for="fee" class="control-label col-sm-2">Project Fees</label>
                <div class="col-sm-8">
                    <input class="form-control" type="number" name="fee" id="" value="{{$project->fee}}">
                </div>
            </div>

            <div class="form-group">
            <label for="" class="control-label col-sm-2"></label>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-block">Submit</button>
                </div>       
            </div>
        </form>
    </div>
</div>
    <hr>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Task List</h3>
        <div class="pull-right">
            <a href="/tasks/{{$project->id}}/create">
                <input type="button" value="Add New Task" class="btn btn-primary btn-sm">  
            </a>
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover display">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>                          
                @foreach($project->task as $task)  
                    <tr class="column">
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                        <td style="" >
                            <div class="pull-left">
                                <a href="/tasks/{{$task->id}}/edit">
                                    <button style="" class="btn btn-primary btn-xs ">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="pull-left">
                                <form method="POST" action="/tasks/{{$task->id}}">
                                @method('DELETE')
                                @csrf
                                    <button class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>	

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Work List</h3>
        <div class="pull-right">
            <a href="/works/{{$project->id}}/create">
                <input type="button" value="Add New Work" class="btn btn-primary btn-sm">  
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover display">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Done By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($project->work as $work)  
                    <tr class="column">
                        <td>{{$work->task_name}}</td>
                        <td>{{$work->task_description}}</td>
                        <td>{{$work->date}}</td>
                        @php 
                        $hours = floor(($work->duration *60) / 60);
                        $minutes = (($work->duration *60)  % 60);
                        $pattern = $hours > 0 ? sprintf('%2d hours %02d minutes', $hours, $minutes) : sprintf('%02d minutes', $minutes);
                        @endphp
                        <td>{{sprintf($pattern)}}</td>
                        <td>{{$work->status?'Completed':'In-progress'}}</td>
                        <td>{{$work->user->name}}</td>
                        <td style="" >
                            <div class="pull-left">
                                <a href="/works/{{$work->id}}/edit">
                                    <button style="" class="btn btn-primary btn-xs ">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="pull-left">
                                <form method="POST" action="/works/{{$work->id}}">
                                @method('DELETE')
                                @csrf
                                    <button class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>	

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Done By</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection