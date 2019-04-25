@extends('admin_template')

@section('pageTitle', 'Staff Magnagmen')

@section('title','Staff Magnagment')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Staff List</h3>
        <div class="pull-right"> 
            <a href="/users/create">
                <input type="button" value="Add New Staff" class="btn btn-primary btn-sm">  
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Staff Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>User type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($users as $user) 
                    <tr class="column">
                        <td>{{$user->name}}</td>
                        <td>{{$user->position}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->salary}}</td>
                        <td>{{$user->type==false ? 'Staff' : 'Admin'}}</td>
                        <td style="" >
                            <div class="pull-left">
                                <a href="/users/{{$user->id}}/edit">
                                    <button style="" class="btn btn-primary btn-xs ">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="pull-left">
                                <form method="POST" action="/users/{{$user->id}}">
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
                    <th>Staff Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>User type</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection