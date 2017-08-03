@extends('layouts.app')

@section('content-app')
    <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit {{ $data['lecturer']->name }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => ['lecturers.update', $data['lecturer']->id], 'method' => 'POST']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-sm-2 control-label'])}}
                            <div class="col-sm-4">
                                {{Form::text('name', $data["lecturer"]->name, ['class' => 'form-control', 'id' => 'name'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            {{Form::label('email', 'Email', ['class' => 'col-md-2 control-label'])}}

                            <div class="col-sm-4">
                                {{Form::text('email', $data["lecturer"]->email, ['class' => 'form-control', 'id' => 'email'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            {{Form::label('status', 'Status', ['class' => 'col-md-2 control-label'])}}

                            <div class="col-sm-4">
                                {{Form::select('status', ['On Leave', 'Available'], $data["lecturer"]->status,  ['class' => 'form-control', 'id' => 'status'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            {{Form::label('department', 'Department', ['class' => 'col-md-2 control-label'])}}

                            <div class="col-sm-4">
                                {{Form::select('department', $data["form"], $data["lecturer"]->department->id,  ['class' => 'form-control m-bot15', 'id' => 'department'])}}
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