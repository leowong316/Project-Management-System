@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Edit Project')

@section('content')
<div class="container">
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
                <input class="form-control" type="date" name="start-date" id="" value="{{$project->start_date}}">
            </div>
        </div>

        <div class="form-group">
            <label for="end_date" class="control-label col-sm-2">End Date</label>
            <div class="col-sm-8">
                <input class="form-control" type="date" name="end-date" id="" value="{{$project->end_date}}">
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
@endsection