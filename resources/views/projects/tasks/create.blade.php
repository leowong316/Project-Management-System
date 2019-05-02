@extends('admin_template')

@section('pageTitle', 'Create')

@section('title','Project Management')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Create Task</h3>
    </div>
    <div class="box-body">
        <form method="POST" class="form-horizontal" action="/{{$project->id}}/tasks">
        @csrf
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="taskname[]">
                </div>
            </div>
            
            <div class="form-group">
                <label for="desctiption" class="control-label col-sm-2">Description</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="taskdescription[]">
                </div>
            </div>

            
            <div id="task_list"></div>      

            <div class="form-group">
                <div class="col-sm-1">
                    <a href="javascript:void()" class="btn btn-success addTaskBtn" >Add New Task</a>   
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