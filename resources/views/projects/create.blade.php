@extends('admin_template')

@section('pageTitle', 'Create')

@section('title','Create Project')

@section('content')
<style>
.select2-selection__choice {
    color:black!important;
    background-color:#52525D!important;
    border-color: #367fa9!important;
    padding: 1px 10px!important;
    color: white!important;
}
</style>
<div class="container">
    <div class="box">
        <div class="box-body">
            <form method="POST" class="form-horizontal" action="/projects">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Project Name</label>
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
                    <label for="start_date" class="control-label col-sm-2">Start Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" name="start_date" id="" value="{{date('Y-m-d')}}" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_date" class="control-label col-sm-2">End Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" name="end_date" id="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fee" class="control-label col-sm-2">Project Fees</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="number" name="fee" id="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="user" class="control-label col-sm-2">Staff</label>
                    <div class="col-sm-8">
                        <select name="staff[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Staff" style="width: 100%;">
                            @foreach ($users as $user) 
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-sm-1">
                        <a href="javascript:void()" class="btn btn-success addTaskBtn" >Add New Task</a>   
                    </div>
                </div>
                
                <div id="task_list"></div>
                
                <div class="form-group">
                <label for="fee" class="control-label col-sm-2"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-block">Submit</button> 
                    </div>       
                </div>
            </form>
        </div>
        
    </div>
    
</div>

@endsection