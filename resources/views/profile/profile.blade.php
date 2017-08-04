@extends('layouts.app')

@section('content-app')

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<h1 class="text-center">{{ $data['user']->name }}</h1>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Email</b> <p class="pull-right">{{ $data['user']->email }}</p>
					</li>
					<li class="list-group-item">
						<b>Role</b> <p class="pull-right">{{ $data['user']->role }}</p>
					</li>
				</ul>

				<a href="" class="btn btn-primary btn-block">Edit</a>

			</div>
    	</div>
	</div>
</div>

@endsection