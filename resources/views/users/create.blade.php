@extends('admin_template')

@section('pageTitle', 'Create')

@section('title','Add Staff')

@section('content')

<div class="container">
    <form method="POST" class="form-horizontal" action="/users">
    @csrf
        <div class="form-group">
            <label for="name" class="control-label col-sm-2">Staff Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        
        <div class="form-group">
            <label for="position" class="control-label col-sm-2">Position</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="position">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="control-label col-sm-2">Email</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="email" >
            </div>
        </div>
        
        <div class="form-group">
            <label for="password" class="control-label col-sm-2">Password</label>
            <div class="col-sm-8">
                <input class="form-control" type="password" name="password" >
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="control-label col-sm-2">Salary</label>
            <div class="col-sm-8">
                <input class="form-control" type="num" name="salary" id="">
            </div>
        </div>

        <div class="form-group">
            <label for="fee" class="control-label col-sm-2">User Type</label>
            <div class="col-sm-8">
                <select class="form-control" name="type" id="">
                    <option value="0">Staff</option>
                    <option value="1">Admin</option>
                </select>
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