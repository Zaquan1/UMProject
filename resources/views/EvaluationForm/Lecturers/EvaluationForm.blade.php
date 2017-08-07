@extends('layouts.app')

@section('content-app')

<div class="box box-primary">
	<div class="box-header with-border">
		<h1>Mentor Report</h1>
	</div>
	{!! Form::open() !!}

	<div class="box-header">
		<h2 class="page-header">MENTOR-MENTEE SESSION</h2>
	</div>

	<div class="form-group">
		{{Form::label('dateOfMeet', 'Date Of Meet', ['class' => 'col-md-2 control-label'])}}
		<div class="col-sm-4">
			{{ Form::date('dateOfMeet', 
			   \Carbon\Carbon::now(),
			   ['class' => 'form-control', 'id' => 'dateOfMeet'])
			}}
        </div>
	</div>
	<br>
    <div class="form-group">
        {{Form::label('location', 'Location', ['class' => 'col-md-2 control-label'])}}

        <div class="col-sm-4">
            {{Form::text('location', 'Catfish Alley', ['class' => 'form-control', 'id' => 'email'])}}
        </div>
    </div>
    <br><br>
</div>

<div class="box-header">
	<h2 class="page-header">FOR LECTURER ONLY</h2>
</div>

<div class="row">

	<div class="col-md-6">
		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('purpose', 'Discussion on Mentor-Mentee Session')}}
				</h4>
				<label>Main Issues</label>
				{{ Form::textarea('MainIssue', null, ['class' => 'form-control']) }} 
				<br>
				<label>Other Issues</label>
				{{ Form::textarea('OtherIssue', null, ['class' => 'form-control']) }} 
				<br>
				<label>Outcome</label>
				{{ Form::textarea('Outcome', null, ['class' => 'form-control']) }} 
				<br>
				<label>Strategies discussed</label>
				{{ Form::textarea('stratergy', null, ['class' => 'form-control']) }} 
				<br>
			</div>
			<br>
		</section>
	</div>

	<div class="col-md-6">
		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('purpose', 'Purpose of Mentor-Mentee Session')}}
				</h4>
				{{ Form::radio('purpose', 'schedule meet', false, ['class' => 'flat-red']) }} 
				Schedule meet
				<br>
				{{ Form::radio('purpose', 'counselling', false, ['class' => 'flat-red']) }} 
				Counselling
				<br>
				{{ Form::radio('purpose', 'academic', false, ['class' => 'flat-red']) }} 
				Academic
				<br>
				{{ Form::radio('purpose', 'discussion', false, ['class' => 'flat-red']) }} 
				Discussion
				<br><br>
				<label>Others</label>
				{{ Form::text('purpose', null, ['class' => 'form-control']) }}
			</div>
		</section>

		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('iFindMyMentee', 'Feedback for this Session')}}
				</h4>
				<strong>1. I find my mentee:</strong><br>
				{{ Form::radio('iFindMyMentee', 'not interested in MBBS', false, ['class' => 'flat-red']) }} 
				Not interested in MBBS
				<br>
				{{ Form::radio('iFindMyMentee', 'Struggling in MBBS', false, ['class' => 'flat-red']) }} 
				Struggling in MBBS
				<br>
				{{ Form::radio('iFindMyMentee', 'need counselling', false, ['class' => 'flat-red']) }} 
				Need counselling
				<br>
				{{ Form::radio('iFindMyMentee', 'doing well', false, ['class' => 'flat-red']) }} 
				Doing well
				<br><br>
				<label>Others</label>
				{{ Form::text('iFindMyMentee', null, ['class' => 'form-control']) }}
				<br><br>


				<strong>2. The time spent with the mentee was:</strong><br>
				{{ Form::radio('timeSpentWithMenteeWas', 'adequate', false, ['class' => 'flat-red']) }} 
				Adequate
				<br>
				{{ Form::radio('timeSpentWithMenteeWas', 'a waste of time', false, ['class' => 'flat-red']) }} 
				A waste of time
				<br>
				{{ Form::radio('timeSpentWithMenteeWas', 'encouraging', false, ['class' => 'flat-red']) }} 
				Encouraging
				<br>
				{{ Form::radio('timeSpentWithMenteeWas', 'beneficial', false, ['class' => 'flat-red']) }} 
				Beneficial
				<br><br>
				<label>Others</label>
				{{ Form::text('timeSpentWithMenteeWas', null, ['class' => 'form-control']) }}
			</div>
		</section>

		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('mentorMenteeProgramme', 'Mentor-Mentee Programme')}}
				</h4>

				<strong>In my opinion the Mentor-Mentee programme is:</strong><br>

				{{ Form::radio('mentorMenteeProgramme', 'schedule meet', false, ['class' => 'flat-red']) }} 
				A waste of time
				<br>
				{{ Form::radio('mentorMenteeProgramme', 'counselling', false, ['class' => 'flat-red']) }} 
				Beneficial to the student
				<br><br>
				<label>Others</label>
				{{ Form::text('mentorMenteeProgramme', null, ['class' => 'form-control']) }}
			</div>
		</section>
	</div>
</div>

<div class="row">
	<section class="invoice">
		<h2 class="page-header">Suggestions/Comments</h2>

		{{ Form::textarea('suggestionsAndComments', null, ['class' => 'form-control']) }}
	</section>
</div>

<div class="row">
	<div class="invoice">
		<a href="#" class="btn btn-primary btn-block"><b>Submit</b></a>
	</div>
</div>

{!! Form::close() !!}

<!-- <h2 class="page-header">A. INFORMATION</h2>

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
</div> -->

@endsection