@extends('layouts.app')

@section('content-app')

<div class="box box-primary">
	<div class="box-header with-border">
		<h1>Mentee Report</h1>
	</div>
	{!! Form::open(['route' => 'mentee_evaluation.store', 'method' => 'POST']) !!}

	<div class="box-header">
		<h2 class="page-header">MENTOR-MENTEE SESSION</h2>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label">Date of Meet</label>
		<div class="col-sm-4">
			{{ Form::date('date_of_meet', 
			   \Carbon\Carbon::now(),
			   ['class' => 'form-control', 'id' => 'date_of_meet'])
			}}
        </div>
	</div>
	<br>
    <div class="form-group">
        <label class="col-md-2 control-label">Location</label>
        <div class="col-sm-4">
            {{ Form::text('location', 'The catfish house', ['class' => 'form-control', 'id' => 'location']) }}
        </div>
    </div>
    <br><br>
</div>

<div class="box-header">
	<h2 class="page-header">FOR STUDENT ONLY</h2>
</div>

<div class="row">
	<section class="invoice">
		<div class="form-group">
			<h4>
				{{Form::label('purpose', 'Purpose of Mentor-Mentee Session')}}
			</h4>
			{{ Form::radio('purpose', 'Schedule meet', false, ['class' => 'flat-red', 'onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
			Schedule meet
			<br>
			{{ Form::radio('purpose', 'Counselling', false, ['class' => 'flat-red', 'onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
			Counselling
			<br>
			{{ Form::radio('purpose', 'Academic discussion', false, ['class' => 'flat-red', 'onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
			Academic discussion
			<br>
			{{ Form::radio('purpose', 'Non-academic discussion', false, ['class' => 'flat-red', 'onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
			Non-academic discussion
			<br><br>

			<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js">
			</script>

			<script type="text/javascript">
				$(document).ready(function(){
					$('#purpose_text').click(function(){
						$('#after').attr('checked', true);
					});
				});

				function setOtherPurpose(){
					if (document.getElementById("after").checked == true){
						document.getElementById("after").value = document.getElementById("purpose_text").value;
					}
				}
			</script>

			<input type="radio" id="after" name="purpose" value="" onclick="document.getElementById('purpose_text').disabled = false;">
			<label>
				Others
			</label>
			{{ Form::text('purpose_text', null, ['class' => 'form-control', 'disabled' => 'disabled', 'id' => 'purpose_text', 'onchange' =>'setOtherPurpose();']) }}
		</div>	
	</section>

	<section class="invoice">
		<div class="form-group">
			<h4>
				{{Form::label('this_session_was', 'Feedback for this Session')}}
			</h4>
			<strong>1. This session was:</strong><br>
			{{ Form::radio('this_session_was', 'Very helpful', false, ['class' => 'flat-red']) }} 
			Very helpful
			<br>
			{{ Form::radio('this_session_was', 'Helpful', false, ['class' => 'flat-red']) }} 
			Helpful
			<br>
			{{ Form::radio('this_session_was', 'Somewhat helpful', false, ['class' => 'flat-red']) }} 
			Somewhat helpful
			<br>
			{{ Form::radio('this_session_was', 'Not at all helpful', false, ['class' => 'flat-red']) }} 
			Not at all helpful
			<br>
			{{ Form::radio('this_session_was', 'Unnecessary', false, ['class' => 'flat-red']) }} 
			Unnecessary
			<br><br>

			<strong>2. Comments:</strong>
			<br>

			{{ Form::text('this_session_was_comment', null, ['class' => 'form-control', 'id' => 'this_session_was_comment']) }}
			<br>
		</div>
	</section>

	<section class="invoice">
		<div class="form-group">
			<h4>
				{{Form::label('my_mentor_was', 'My Mentor Was:')}}
			</h4>
			<p>(You can tick more than one)</p>

			{{ Form::checkbox('my_mentor_was[]', 'Approachable', false) }}
			Approachable
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Understanding', false) }}
			Understanding
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Interested to know more', false) }}
			Interested to know more
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Accommodating', false) }}
			Accommodating
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Knowledgeable', false) }}
			Knowledgeable
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Difficult to contact', false) }}
			Difficult to contact
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Uninterested', false) }}
			Uninterested
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Not resourceful', false) }}
			Not resourceful
			<br>
			{{ Form::checkbox('my_mentor_was[]', 'Unpleasant/Unfriendly', false) }}
			Unpleasant/Unfriendly
			<br><br>

			<script type="text/javascript">
				function disableTextInput(checkboxy){
					var var1 = document.getElementById("hiddenInput");

					var1.disabled = checkboxy.checked ? false : true;

					if(!var1.disabled){
						var1.focus();
					}
				}
			</script>

			{{ Form::checkbox('checkboxy', null, false, ['id' => 'checkboxy', 'onclick' => 'disableTextInput(this)']) }}
			<label>Others</label>
			{{ Form::text('my_mentor_was[]', null, array('class' => 'form-control', 'id' => 'hiddenInput', 'disabled' => 'disabled')) }}
			
		</div>
	</section>

	<section class="invoice">
		<div class="form-group">
			<h4>
				{{Form::label('flags', 'Flags')}}
			</h4>

			{{ Form::radio('flags', 'Insufficient/Irregular meetings', false, ['class' => 'flat-red', 'id' => 'custom', 'onclick' => 'document.getElementById("flags_other").disabled = true;']) }} 
			Insufficient/Irregular meetings
			<br>
			{{ Form::radio('flags', 'Difficult mentor', false, ['class' => 'flat-red', 'id' => 'custom', 'onclick' => 'document.getElementById("flags_other").disabled = true;']) }} 
			Difficult mentor
			<br>
			{{ Form::radio('flags', 'Academic', false, ['class' => 'flat-red', 'id' => 'custom', 'onclick' => 'document.getElementById("flags_other").disabled = true;']) }} 
			Academic
			<br>
			{{ Form::radio('flags', 'Non-academic', false, ['class' => 'flat-red', 'id' => 'custom', 'onclick' => 'document.getElementById("flags_other").disabled = true;']) }} 
			Non-academic
			<br>
			{{ Form::radio('flags', 'Nil', false, ['class' => 'flat-red', 'id' => 'custom', 'onclick' => 'document.getElementById("flags_other").disabled = true;']) }} 
			Nil
			<br><br>

			<script type="text/javascript">
				$(document).ready(function(){
					$('#flags_other').click(function(){
						$('#after4').attr('checked', true);
					});
				});

				function setFlagsValue(){
					if (document.getElementById("after4").checked == true){
						document.getElementById("after4").value = document.getElementById("flags_other").value;
					}
				}
			</script>

			<input type="radio" id="after4" name="flags" value="" onclick="document.getElementById('flags_other').disabled = false;">
			<label>Others</label>
			{{ Form::text('flags_other', null, ['class' => 'form-control', 'id' => 'flags_other', 'onchange' =>'setFlagsValue();', 'disabled' => 'disabled']) }}
		</div>
	</section>
</div>

<div class="row">
	<div class="invoice">
		<!-- <a type="submit" href="#" class="btn btn-primary btn-block"><b>Submit</b></a> -->
		{{ Form::submit('Submit', ['class'=>'btn btn-primary btn-block']) }}
	</div>
</div>

{!! Form::close() !!}

@endsection