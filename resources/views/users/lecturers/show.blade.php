@extends('layouts.app')

@section('content-app')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h1 class="text-center">{{ $data['lecturer']->name }}</h1>

				<p class="text-muted text-center">{{ $data['lecturer']->department->name }}</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Email</b> <p class="pull-right">{{ $data['lecturer']->email }}</p>
					</li>
					<li class="list-group-item">
						<b>Status</b> <p class="pull-right">{{ $data['lecturer']->status }}</p>
					</li>
				</ul>

				<a href="{{ route('lecturers.edit', $data['lecturer']->id) }}" class="btn btn-primary btn-block">Edit</a>

			</div>
    	</div>
	</div>

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h3 class="profile-username text-center">List of Mentees</h3>
			</div>
		</div>
	</div>
</div>

@endsection