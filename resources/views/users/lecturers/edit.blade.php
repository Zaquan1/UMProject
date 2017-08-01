@extends('layouts.app')

@section('content-app')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => ['lecturers.update', $data['lecturer']->id], 'method' => 'POST']) !!}
                <div class="row">
                <div class="form-group">
                    {{Form::label('name', 'Name', ['class' => 'col-md-1 control-label'])}}
                    <div class="col-md-4">
                        {{Form::text('name', $data["lecturer"]->name, ['class' => 'form-control', 'id' => 'name'])}}
                    </div>
                </div>
                </div>
                <div class="row">
               <div class="form-group">
                    {{Form::label('email', 'Email', ['class' => 'col-md-1 control-label'])}}
                    <div class="col-md-4">
                        {{Form::text('email', $data["lecturer"]->email, ['class' => 'form-control', 'id' => 'email'])}}
                    </div>
                </div>
                </div>
                <div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection