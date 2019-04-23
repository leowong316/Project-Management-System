@extends('admin_template')

@section('pageTitle', 'Create')

@section('title','Create Project')

@section('content')

<div class="container">
    <form method="POST" class="form-horizontal" action="/{{$project->id}}/tasks">
    @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Task Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        
        <div class="form-group">
            <label for="desctiption" class="control-label col-sm-2">Description</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
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


@endsection