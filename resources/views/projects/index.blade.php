@extends('admin_template')

@section('pageTitle', 'Project')

@section('title','Project List')

@section('content')
<style>
#details-control {
    background: url('https://raw.githubusercontent.com/DataTables/DataTables/master/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('raw.githubusercontent.com/DataTables/DataTables/master/examples/resources/details_close.png') no-repeat center center;
}
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Project List</h3>
        <div class="pull-right">
            <a href="projects\create">
                <input type="button" value="Add New Project" class="btn btn-primary btn-sm">  
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="projectTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($projects as $project)  
                    <tr class="column">
                        <td id="details-control">{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->start_date}}</td>
                        <td>{{$project->end_date}}</td>
                        <td>RM {{$project->fee}}</td>
                        <td style="" >
                            <div class="pull-left">
                                <a href="/{{$project->id}}/tasks">
                                    <button class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="pull-left">
                                <a href="/projects/{{$project->id}}/edit">
                                    <button style="" class="btn btn-primary btn-xs ">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="pull-left">
                                <form method="POST" action="/projects/{{$project->id}}">
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
            <tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project Fee</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<div id="animal-info"></div>
@endsection