@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Task</h3>
    </div>
    <div class="box-body">
        <form method="POST" class="form-horizontal" action="/tasks/{{$task->id}}">
        @method('PATCH')
        @csrf
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Task Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{$task->name}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="desctiption" class="control-label col-sm-2">Description</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$task->description}}</textarea>
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
@endsection