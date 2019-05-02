@extends('admin_template')

@section('pageTitle', 'Project')

@section('title','View Project')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Project List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover display">
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
                        <td>
                            <div class="pull-left">
                                <a href="/staffprojects/{{$project->id}}">
                                    <button class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-eye-open" alt="view" aria-hidden="true"></span>
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