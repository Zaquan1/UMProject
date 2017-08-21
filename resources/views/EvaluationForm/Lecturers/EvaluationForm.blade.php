@extends('layouts.app')

@section('content-app')

<div class="box box-primary">
	<div class="box-header with-border">
		<h1>Mentor Report</h1>
	</div>
	{!! Form::open(['route' => 'mentor_evaluation.store', 'method' => 'POST']) !!}

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
            {{Form::text('location', 'Catfish Alley', ['class' => 'form-control', 'id' => 'location'])}}
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
				{{ Form::textarea('main_issue', null, ['class' => 'form-control', 'id' => 'main_issue']) }} 
				<br>
				<label>Other Issues</label>
				{{ Form::textarea('other_issue', null, ['class' => 'form-control', 'id' => 'other_issue']) }} 
				<br>
				<label>Outcome</label>
				{{ Form::textarea('outcome', null, ['class' => 'form-control', 'id' => 'outcome']) }} 
				<br>
				<label>Strategies discussed</label>
				{{ Form::textarea('discussed_strategy', null, ['class' => 'form-control', 'id' => 'discussed_strategy']) }} 
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
				{{ Form::radio('purpose', 'Schedule meet', false, ['onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
				Schedule meet
				<br>
				{{ Form::radio('purpose', 'Counselling', false, ['onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
				Counselling
				<br>
				{{ Form::radio('purpose', 'Academic', false, ['onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
				Academic
				<br>
				{{ Form::radio('purpose', 'Discussion', false, ['onclick' => 'document.getElementById("purpose_text").disabled = true;']) }} 
				Discussion
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
				{{ Form::text('purpose_text', null, ['class' => 'form-control', 'id' => 'purpose_text', 'onchange' =>'setOtherPurpose();', 'disabled' => 'disabled']) }}
			</div>

				
		</section>

		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('i_find_my_mentee', 'Feedback for this Session')}}
				</h4>
				<strong>1. I find my mentee:</strong><br>
				{{ Form::radio('i_find_my_mentee', 'Not interested in MBBS', false, ['onclick' => 'document.getElementById("i_find_my_mentee_other").disabled = true;']) }} 
				Not interested in MBBS
				<br>
				{{ Form::radio('i_find_my_mentee', 'Struggling in MBBS', false, ['onclick' => 'document.getElementById("i_find_my_mentee_other").disabled = true;']) }} 
				Struggling in MBBS
				<br>
				{{ Form::radio('i_find_my_mentee', 'Need counselling', false, ['onclick' => 'document.getElementById("i_find_my_mentee_other").disabled = true;']) }} 
				Need counselling
				<br>
				{{ Form::radio('i_find_my_mentee', 'Doing well', false, ['onclick' => 'document.getElementById("i_find_my_mentee_other").disabled = true;']) }} 
				Doing well
				<br><br>

				<script type="text/javascript">
					$(document).ready(function(){
						$('#i_find_my_mentee_other').click(function(){
							$('#after3').attr('checked', true);
						});
					});

					function setOtherFeedback(){
						if (document.getElementById("after3").checked == true){
							document.getElementById("after3").value = document.getElementById("i_find_my_mentee_other").value;
						}
					}
					
				</script>

				<input type="radio" id="after3" name="i_find_my_mentee" value="" onclick="document.getElementById('i_find_my_mentee_other').disabled = false;">
				<label>Others</label>
				{{ Form::text('i_find_my_mentee_other', null, ['class' => 'form-control', 'id' => 'i_find_my_mentee_other', 'onchange' =>'setOtherFeedback();', 'disabled' => 'disabled']) }}
				<br><br>


				<strong>2. The time spent with the mentee was:</strong><br>
				{{ Form::radio('time_spent_with_mentee_was', 'Adequate', false, ['class' => 'flat-red']) }} 
				Adequate
				<br>
				{{ Form::radio('time_spent_with_mentee_was', 'A waste of time', false, ['class' => 'flat-red']) }} 
				A waste of time
				<br>
				{{ Form::radio('time_spent_with_mentee_was', 'Encouraging', false, ['class' => 'flat-red']) }} 
				Encouraging
				<br>
				{{ Form::radio('time_spent_with_mentee_was', 'Beneficial', false, ['class' => 'flat-red']) }} 
				Beneficial
				<br><br>

				<script type="text/javascript">
					$(document).ready(function(){
						$('#time_spent_with_mentee_was_other').click(function(){
							$('#after2').attr('checked', true);
						});
					});

					function setOtherTimeSpentSummary(){
						if (document.getElementById("after2").checked == true){
							document.getElementById("after2").value = document.getElementById("time_spent_with_mentee_was_other").value;
						}
					}
					
				</script>

				<input type="radio" id="after2" name="time_spent_with_mentee_was" value="" onclick="document.getElementById('time_spent_with_mentee_was_other').disabled = false;">
				<label>Others</label>
				{{ Form::text('time_spent_with_mentee_was_other', null, ['disabled' => 'disabled','class' => 'form-control', 'id' => 'time_spent_with_mentee_was_other', 'onchange' =>'setOtherTimeSpentSummary();']) }}
			</div>
		</section>

		<section class="invoice">
			<div class="form-group">
				<h4>
					{{Form::label('mentor_mentee_programme_is', 'Mentor-Mentee Programme')}}
				</h4>

				<strong>In my opinion the Mentor-Mentee programme is:</strong><br>

				{{ Form::radio('mentor_mentee_programme_is', 'A waste of time', false, ['class' => 'flat-red']) }} 
				A waste of time
				<br>
				{{ Form::radio('mentor_mentee_programme_is', ' ', false, ['class' => 'flat-red']) }} 
				Beneficial to the student
				<br><br>

				<script type="text/javascript">
					$(document).ready(function(){
						$('#mentor_mentee_programme_is_other').click(function(){
							$('#after4').attr('checked', true);
						});
					});

					function setOtherMentorMenteeFeedback(){
						if (document.getElementById("after4").checked == true){
							document.getElementById("after4").value = document.getElementById("mentor_mentee_programme_is_other").value;
						}
					}
					
				</script>

				<input type="radio" id="after4" name="mentor_mentee_programme_is" value="">
				<label>Others</label>
				{{ Form::text('mentor_mentee_programme_is_other', null, ['class' => 'form-control', 'id' => 'mentor_mentee_programme_is_other', 'onchange' =>'setOtherMentorMenteeFeedback();']) }}
			</div>
		</section>
	</div>
</div>

<div class="row">
	<section class="invoice">
		<h2 class="page-header">Suggestions/Comments</h2>

		{{ Form::textarea('suggestion_and_comment', null, ['class' => 'form-control']) }}
	</section>
</div>

<div class="row">
	<div class="invoice">
		<!-- <a type="submit" href="#" class="btn btn-primary btn-block"><b>Submit</b></a> -->
		{{ Form::submit('Submit', ['class'=>'btn btn-primary btn-block']) }}
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