@extends('layouts.app')

@section('content-app')

<div class="box box-info">
	<div class="box-header with-border">
		<h1>Mentor Report</h1>
	</div>
</div>

{!! Form::open() !!}

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

		<div class="row">
            <div class="form-group">
                {{Form::label('location', 'Location', ['class' => 'col-md-2 control-label'])}}

                <div class="col-sm-4">
                    {{Form::text('location', 'Catfish Alley', ['class' => 'form-control', 'id' => 'email'])}}
                </div>
            </div>
      	</div>
	</div>
</div>


<div class="box box-primary">
	<div class="box-header">
		<h2 class="page-header">C. FOR LECTURER ONLY</h2>
	</div>

	<div class="box-body">
		<div class="form-group">
			{{Form::label('purpose', 'Purpose of Meeting', ['class' => 'col-md-2 control-label'])}}
			{{ Form::radio('purpose', 'Schedule meet', false, ['class' => 'flat-red']) }} Samting
			<label>
				<input type="radio" name="bla" class="flat-red"> blabla bla
			</label>
		</div>
	</div>
</div>

{!! Form::close() !!}

@endsection