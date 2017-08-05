@extends('layouts.app')

@section('content-app')
    @if(Auth::user()->role != "student")
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Students</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="table2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Department</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            @foreach($data['lecturers'] as $lecturerUser)
                                <tr>
                                    <td>{{ $lecturerUser->id }}</td>
                                    <td>
                                        <a href="{{ route('lecturers.show', $lecturerUser->id) }}">
                                            {{ $lecturerUser->name }}
                                        </a>
                                    </td>
                                    <td>{{ $lecturerUser->email }}</td>
                                    <td>{{ $lecturerUser->status }}</td>
                                    <td>{{ $lecturerUser->department->name }}</td>
                                    <td>
                                        <a href = "{{ route('lecturers.edit', $lecturerUser->id) }}" class = "btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif
@endsection