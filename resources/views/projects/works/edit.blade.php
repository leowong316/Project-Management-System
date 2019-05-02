@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Project Management')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Work</h3>
    </div>
        <div class="box-body">
            <form method="POST" class="form-horizontal" action="/works/{{$work->id}}" name="form">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="duration" class="control-label col-sm-2">Task Title</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="task_name" style="width: 100%;">
                            @foreach($tasks as $task)
                            <option value="{{$task->name}}" @if($task->name==$work->task_name) selected @endif>{{$task->name}}</option>
                            @endforeach
                            <option  @if($work->task_name=='other') selected @endif value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desctiption" class="control-label col-sm-2">Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="task_description" id="" cols="30" rows="5">{{$work->task_description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="control-label col-sm-2">Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" name="date" value="{{$work->date}}" id="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="duration" class="control-label col-sm-2">Duration</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="duration" style="width: 100%;">
                        
                        @for($i=0.5;$i<=8;$i=$i+0.5)
                            @php 
                                $hours = floor(($i *60) / 60);
                                $minutes = (($i *60)  % 60);

                                $pattern = $hours > 0 ? sprintf('%2d hours %02d minutes', $hours, $minutes) : sprintf('%02d minutes', $minutes);
                            @endphp
                        <option @if ($work->duration==$i)selected @endif value="<?php echo $i ?>">
                            {{sprintf($pattern)}}                        
                        </option>

                        @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="control-label col-sm-2">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status" style="width: 100%;">
                            <option value="0" @if(!$work->status) selected @endif >In-progress</option>
                            <option value="1" @if($work->status) selected @endif >Completed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_id" class="control-label col-sm-2">Done By</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="user_id" style="width: 100%;">
                            @foreach($work->project->project_staff as $user)
                            <option value="{{$user->user->id}}"  @if($work->id==$user->user->id) selected @endif>
                                {{$user->user->name}}
                            </option>
                            @endforeach
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
    </div> 
</div>
@endsection