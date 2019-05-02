@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Staff Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Staff</h3>
    </div>
    <div class="box-body">
        <form method="POST" class="form-horizontal" action="/users/{{$user->id}}">
        @method('PATCH')
        @csrf
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">User Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="position" class="control-label col-sm-2">Position</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="position" value="{{$user->position}}">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="control-label col-sm-2">Email</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="email" id="" value="{{$user->email}}">
                </div>
            </div>

            <div class="form-group">
                <label for="salary" class="control-label col-sm-2">Salary</label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="salary" id="" value="{{$user->salary}}">
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="control-label col-sm-2">User Type</label>
                <div class="col-sm-8">
                    <select class="form-control" name="type" id="">
                        <option value="{{$user->type}}">{{$user->type ? 'Admin' : 'Staff'}}</option>
                        <option value="{{!$user->type ? 1 : 0}}">{{!$user->type ? 'Admin' : 'Staff'}}</option>
                    </select>
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