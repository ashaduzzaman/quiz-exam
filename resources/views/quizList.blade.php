@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Quiz List</div>
            </div>

        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="list-group">
            @foreach ($quizes as $quiz)
                    <div class="list-group-item list-group-item-action">
                    <div class="row">
                    <div class="col-md-4" style="text-left: center;">
                        {{ $quiz->name }}
                    </div>

                    <div class="col-md-8">

                        <span>
                            Time: {{ $quiz->quiz_time }}
                        </span>
                    <a href="{{ url('/examPaper') }}" class="btn btn-xs btn-info pull-right">Go</a>

                    </div>
                    </div>
                    </div>
                
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
