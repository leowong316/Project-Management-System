@extends('admin_template')

@section('pageTitle', 'Title')

@section('title', $project->name)

@section('content')
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Task Name </th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($project->task as $task) 
            <tr class="column">
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td>
                        <div class="pull-right">
                            <a href="/tasks/{{$task->id}}/edit">
                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                            </a>
                            <div class="pull-right">
                                <form method="POST" action="/tasks/{{$task->id}}">
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
    <a href="\tasks\{{$project->id}}\create">
        <input type="button" value="Add New Task" class="btn btn-block btn-primary">  
    </a>
<div>
@endsection