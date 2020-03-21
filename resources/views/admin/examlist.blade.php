@extends('layouts.app')

@section('styles')



@endsection
@section('content')

<!-- Button trigger modal -->
<div class="container">
    <!-- @if (session('success'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
        </div>
    @endif -->

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }}">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ Session::get('alert-' . $msg) }}
            </div>
            <!-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p> -->
            @endif
        @endforeach
    </div>
    <div class="row">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addExamModal">
        Add Exam
        </button>
    </div>


<!-- Modal -->
    <div class="modal modal-align fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="addExamModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExamModalTitle">Create New Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="examTitle">Exam Title</label>
                            <input type="text" class="form-control" id="examTitle" name="examTitle" aria-describedby="examTitle" placeholder="Enter exam title">
                        </div>
                        <!-- <div class="form-group">
                            <label for="examDate">Exam Date</label>
                            <input type="text" class="form-control" id="examDate" name="examDate" aria-describedby="examDate" placeholder="Enter exam date">
                            <small id="examDate" class="form-text text-muted">Ex: yyyy-mm-dd</small>
                        </div> -->
                        <div class="form-group">
                            {!! Form::label('examDate', 'Exam Date') !!}
                            {!! Form::date('examDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <!-- <label for="examTime">Exam Time</label>
                            <input type="text" class="form-control" id="examTime" name="examTime" aria-describedby="examTime" placeholder="Enter exam time">
                            <small id="examTime" class="form-text text-muted">Ex: HH:mm:ss</small> -->
                            {!! Form::label('examTime', 'Exam Time') !!}
                            {{ Form::time('examTime', Carbon\Carbon::now()->format('H:i:s'),  ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="examDuration">Exam Duration</label>
                            <input type="text" class="form-control" id="examDuration" name="examDuration" aria-describedby="examDuration" placeholder="Enter exam duration">
                            <small id="examDuration" class="form-text text-muted">Duration must be in minute</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
       </div>
    </div>
</div>
<div class="container">
  <h2>Quiz List Table</h2>
  
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Quiz Title</th>
        <th>Quiz Date</th>
        <th>Quiz Time</th>
        <th>Duration</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $counter = 0; ?>
    @foreach($examList as $exam)
        <tr>
            <td>{{ ++$counter }}</td>
            <td>{{ $exam->name }}</td>
            <td>{{ $exam->start_date }}</td>
            <td>{{ $exam->start_time }}</td>
            <td>{{ $exam->duration }}</td>
            <td class="text-center" style="width: 250px;">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-xs-2">
                        <button class="btn btn-raised btn-info btn-sm" data-examid="{{ $exam->id }}" data-examtitle="{{ $exam->name }}" data-examdate="{{ $exam->start_date }}" data-examtime="{{ $exam->start_time }}" data-examduration="{{ $exam->duration }}" data-toggle="modal" data-target="#editExamModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-xs-2">
                        {!! Form::open(['route' => ['admin.destroy', $exam->id], 'method' => 'DELETE', 'style'=>'width:10%; margin:0; padding:0']) !!}
                    <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!} -->
                        <button type="submit" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-xs-2">
                         <a class="btn btn-success" href="">Set Question</a>
                    </div>
                    </div>
                </div>
            <!-- <button class="btn btn-raised btn-danger btn-sm" data-examid="{{ $exam->id }}" data-toggle="modal" data-target="#deleteExamModal"><i class="fa fa-trash-o"></i></button> -->
            
            </td>
        </tr>
    @endforeach  
      
    </tbody>
  </table>

  <div class="modal modal-align fade" id="editExamModal" tabindex="-1" role="dialog" aria-labelledby="editExamModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExamModalTitle">Edit Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.update', 'id')}}">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="examId" id="examId" value="">
                        <div class="form-group">
                            <label for="examTitle">Exam Title</label>
                            <input type="text" class="form-control" id="examTitle" name="examTitle" aria-describedby="examTitle" placeholder="Enter exam title">
                        </div>
                        <!-- <div class="form-group">
                            <label for="examDate">Exam Date</label>
                            <input type="text" class="form-control" id="examDate" name="examDate" aria-describedby="examDate" placeholder="Enter exam date">
                            <small id="examDate" class="form-text text-muted">Ex: yyyy-mm-dd</small>
                        </div> -->
                        
                        <!-- <div class="form-group">
                            <label for="examTime">Exam Time</label>
                            <input type="text" class="form-control" id="examTime" name="examTime" aria-describedby="examTime" placeholder="Enter exam time">
                            <small id="examTime" class="form-text text-muted">Ex: HH:mm:ss</small>
                        </div> -->
                        <div class="form-group">
                            {!! Form::label('examDate', 'Exam Date') !!}
                            {!! Form::date('examDate', \Carbon\Carbon::now(), ['class' => 'form-control', 'id'=> 'examDate']) !!}
                        </div>
                        <div class="form-group">
                            <!-- <label for="examTime">Exam Time</label>
                            <input type="text" class="form-control" id="examTime" name="examTime" aria-describedby="examTime" placeholder="Enter exam time">
                            <small id="examTime" class="form-text text-muted">Ex: HH:mm:ss</small> -->
                            {!! Form::label('examTime', 'Exam Time') !!}
                            {{ Form::time('examTime', Carbon\Carbon::now()->format('H:i:s'),  ['class' => 'form-control', 'id'=> 'examDate']) }}
                        </div>
                        <div class="form-group">
                            <label for="examDuration">Exam Duration</label>
                            <input type="text" class="form-control" id="examDuration" name="examDuration" aria-describedby="examDuration" placeholder="Enter exam duration">
                            <small id="examDuration" class="form-text text-muted">Duration must be in minute</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
       </div>
    </div>
  </div>

  
@endsection