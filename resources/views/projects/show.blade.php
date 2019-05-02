@extends('admin_template')

@section('pageTitle', 'Title')

@section('title', 'Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$project->name}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover ">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Fee</th>
                    <th>Staff</th>
                </tr>
            </thead>
            <tbody>                          
                <tr class="column">
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->end_date}}</td>
                    <td>RM {{$project->fee}}</td>
                    <td style="" >
                        @foreach($project->project_staff as $key =>$staff)
                        <p>{{$staff->user->name}}</p>
                        @endforeach
                    </td>
                </tr>	
            </tbody>
            <tfoot>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Fee</th>
                    <th>Staff</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Task List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover display">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($project->task as $task)  
                    <tr class="column">
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                    </tr>	

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Work List</h3>
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
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection