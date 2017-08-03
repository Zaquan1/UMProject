@extends('layouts.app')

@section('content-app')
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ $data['student']->name }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['route' => ['students.update', $data['student']->id], 'method' => 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    {{Form::label('name', 'Name', ['class' => 'col-sm-2 control-label'])}}
                    <div class="col-sm-4">
                        {{Form::text('name', $data["student"]->name, ['class' => 'form-control', 'id' => 'name'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {{Form::label('email', 'Email', ['class' => 'col-md-2 control-label'])}}

                    <div class="col-sm-4">
                        {{Form::text('email', $data["student"]->email, ['class' => 'form-control', 'id' => 'email'])}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    {{Form::label('cohort', 'Cohort', ['class' => 'col-md-2 control-label'])}}

                    <div class="col-sm-4">
                        {{Form::select('cohort', $data["form"], $data["student"]->cohort->id,  ['class' => 'form-control m-bot15', 'id' => 'cohort'])}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection