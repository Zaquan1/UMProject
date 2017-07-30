@extends('layouts.app')

@section('content-app')
    @if(Auth::user()->role != "student")
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mentee</h3>
                        <div class="box-tools">
                            <div class="input-group">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Name"/>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Metrix</th>
                                @if(Auth::user()->role == "admin")
                                    <th>Mentor</th>
                                @endif
                                <th>Evaluation</th>
                            </tr>    
                            @foreach($data['assignments'] as $assignment)
                                @if(Auth::user()->role == "admin" || $data['user']->id == $assignment->mentor_id)
                                    <tr>
                                        <td>
                                            <a href="/dashboard/students/{{ $assignment->students->id }}">
                                                {{ $assignment->students->name }}
                                            </a>
                                        </td>
                                        <td>{{ $assignment->students->email }}</td>
                                        <td><span class="label label-success">Approved</span></td>
                                        @if(Auth::user()->role == "admin")
                                            <td>
                                                @if(empty($assignment->lecturers))
                                                    None
                                                @else
                                                    <a href="/dashboard/students/{{ $assignment->lecturers->id }}">
                                                        {{ $assignment->lecturers->name }}
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif
    @if(Auth::user()->role != "lecturer")
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mentor</h3>
                        
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Mentee</th>
                            </tr>
                            @foreach($data['assignments'] as $assignment)
                                @if(Auth::user()->role == "admin" || $data['user']->id == $assignment->mentee_id)
                                    @if(!empty($assignment->lecturers))
                                        <tr>
                                            <td>
                                                <a href="/dashboard/lecturers/{{ $assignment->lecturers->id }}">
                                                    {{ $assignment->lecturers->name }}
                                                </a>
                                            </td>
                                            <td>{{ $assignment->lecturers->email }}</td>
                                            <td><span class="label label-success">Approved</span></td>
                                            @if(Auth::user()->role == "admin")
                                                <td>
                                                    @if(empty($assignment->students))
                                                        None
                                                    @else
                                                        <a href="/dashboard/students/{{ $assignment->lecturers->id }}">
                                                            {{ $assignment->lecturers->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif
@endsection