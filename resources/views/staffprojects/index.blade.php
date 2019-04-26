@extends('staff_template')

@section('pageTitle', 'Project')

@section('title','Project List')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Project List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="projectTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($projects as $project)  
                    <tr class="column">
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->start_date}}</td>
                        <td>{{$project->end_date}}</td>
                        <td style="" >
                            <div class="pull-left">
                                <a href="/{{$project->id}}/stafftasks">
                                    <button class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>	

                @endforeach
            <tbody>
            <tfoot>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection