@extends('layouts.app')

@section('content-app')

<div class="box box-info">
	<div class="box-header with-border">
		<h1>Mentor Report</h1>
	</div>
</div>

<h2 class="page-header">A. INFORMATION</h2>

<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">MENTEE</h3>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">MENTOR</h3>
		</div>
	</div>
</div>

<h2 class="page-header">B. MENTOR-MENTEE SESSION</h2>

<div class="box box-primary">
	<div class="box-header with-border">
		{!! Form::open() !!}

		<div class="row">
			<div class="form-group">
				{{Form::label('dateOfMeet', 'Date Of Meet', ['class' => 'col-md-2 control-label'])}}
				<div class="col-sm-4">
					{{ Form::date('dateOfMeet', 
					   \Carbon\Carbon::now(),
					   ['class' => 'form-control', 'id' => 'dateOfMeet'])
					}}
	            </div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>
</div>

@endsection