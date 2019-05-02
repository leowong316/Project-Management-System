@extends('admin_template')

@section('pageTitle', 'Edit')

@section('title','Manage Work')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Work</h3>
    </div>
        <div class="box-body">
            <form method="POST" class="form-horizontal" action="/staffworks/{{$works->id}}" name="form">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="project" class="control-label col-sm-2">Task Title</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="" id="">
                            @foreach($works->project->task as $task)
                            <option @if($task->name==$works->task_name) selected @endif value="{{$task->id}}">{{$task->name}}</option>
                            @endforeach
                            <option @if($works->task_name=='other') selected @endif value="other">Other</option>
                        </select>
                    </div>      
                </div>

                <div id="Task"></div>       

                <div class="form-group">
                    <label for="desctiption" class="control-label col-sm-2">Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="task_description" id="" cols="30" rows="5">{{$works->task_description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class="control-label col-sm-2">Date</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" name="date" value="{{$works->date}}" id="">
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
                        <option @if ($works->duration==$i)selected @endif value="<?php echo $i ?>">
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
                            <option value="0" @if(!$works->status) selected @endif >In-progress</option>
                            <option value="1" @if($works->status) selected @endif >Completed</option>
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