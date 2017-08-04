@extends('layouts.app')

@section('content-app')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h1 class="text-center">{{ $data['student']->name }}</h1>

				<p class="text-muted text-center">Cohort: {{ $data['student']->cohort->year }}</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Email</b> <p class="pull-right">{{ $data['student']->email }}</p>
					</li>
				</ul>

				<a href="#" class="btn btn-primary btn-block">Edit</a>

			</div>
    	</div>
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h3 class="profile-username text-center">Evaluations</h3>
			</div>
		</div>
	</div>
</div>

@endsection