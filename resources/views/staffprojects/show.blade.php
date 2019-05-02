@extends('admin_template')

@section('pageTitle', 'Title')

@section('title', 'Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$projects->name}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover ">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>                          
                <tr class="column">
                    <td>{{$projects->name}}</td>
                    <td>{{$projects->description}}</td>
                    <td>{{$projects->start_date}}</td>
                    <td>{{$projects->end_date}}</td>
                </tr>	
            </tbody>
            <tfoot>
                <tr>
                    <th>Project Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Task List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="" class="table table-bordered table-striped table-hover display">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>                          
                @foreach($projects->task as $task)  
                    <tr class="column">
                        <td>{{$task->name}}</td>
                        <td>{{$task->description}}</td>
                    </tr>	

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Task Title</th>
                    <th>Description</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection