@extends('admin_template')

@section('pageTitle', 'Project')

@section('title','Manage Work')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Work List</h3>
        <div class="pull-right">
            <a href="/staffworks/create">
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
                    <th>Duration </th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $work)          
                <tr>
                    <td>{{$work->task_name}}</td>
                    <td>{{$work->task_description}}</td>
                    @php 
                    $hours = floor(($work->duration *60) / 60);
                    $minutes = (($work->duration *60)  % 60);

                    $pattern = $hours > 0 ? sprintf('%2d hours %02d minutes', $hours, $minutes) : sprintf('%02d minutes', $minutes);
                    @endphp
                    <td>{{sprintf($pattern, $hours, $minutes)}}</td>
                    <td>{{$work->date}}</td>
                    <td>{{($work->status)?'Completed' : 'In-progress'}}</td>
                    <td>
                        <div class="pull-left">
                            <a href="/staffworks/{{$work->id}}/edit">
                                <button style="" class="btn btn-primary btn-xs ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                            </a>
                        </div>
                    </td>      
                </tr>
                @endforeach
            <tbody>
            <tfoot>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection