@extends('admin_template')

@section('pageTitle', 'Project')

@section('title','Project List')

@section('content')
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Project Fee</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($projects as $project) 
            <tr class="column">
                <td>{{$project->name}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>
                <td>RM {{$project->fee}}</td>
                <td>
                    <a href="{{$project->id}}/tasks">
                        <input type="button" value="Add Task" class="btn btn-secondary btn-block">
                    </a>
                    <BR>
                    <a href="{{$project->id}}/users">
                        <input type="button" value="Add Staff" class="btn btn-secondary btn-block">
                    </a>
                    <BR>
                    <div class="pull-right">
                        <a href="/projects/{{$project->id}}/edit">
                            <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>
                        </a>
                        <div style="float:right">
                            <form method="POST" action="/projects/{{$project->id}}">
                            @method('DELETE')
                            @csrf
                                <button class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        
    </table>
    <a href="projects\create">
        <input type="button" value="Add New Project" class="btn btn-block btn-primary">  
    </a>
<div>
@endsection