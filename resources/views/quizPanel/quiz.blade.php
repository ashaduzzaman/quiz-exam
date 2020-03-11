@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css"> -->
@endsection
@section('content')

<div class="container">
    <div class="row">
    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $message)
            @if(Session::has('alert-'. $message))
                <p class="alert alert-{{ $message }}">{{ Session::get('alert-'. $message) }} <a href="#" class="close" data-dismiss="alert" arial-lebel="close">&times;</a> </p>
            @endif
        @endforeach
    </div>
        <div class="col-md-10 col-md-offset-1 mb-4">
            <h2 class="text-center">Quiz Exam Settings Panel</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default text-white bg-info mb-3">
                <!-- <div class="panel-heading">
                    <h3>Header</h3>
                </div> -->

                <div class="container">
    <form action="" class="form-horizontal"  role="form">
        <fieldset>
            <legend>Test</legend>
            <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">Date Picking</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<div class="form-group">
                <label for="dtp_input3" class="col-md-2 control-label">Time Picking</label>
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
        </fieldset>
    </form>
</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <form method="post" action="{{url('admin')}}">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Quiz Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Quiz Name" name="quiz_title">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Quiz Date</label> -->
                                    <!-- <div class="form-group">
                                        <input class="date form-control"  type="text" id="start_date" name="date">
                                    </div> -->

                                    <div class="form-group">
                                        <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                                        <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" size="16" type="text" value="" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" /><br/>
                                    </div>
 
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
  
@endsection