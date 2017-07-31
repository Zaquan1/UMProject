@extends('layouts.app')

@section('content-app')
    @if(Auth::user()->role != "student")
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mentee</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="table2">
                            <thead>
                            <tr>
                                <th>Mentee</th>
                                <th>Mentee Email</th>
                                @if(Auth::user()->role == "admin")
                                    <th>Mentor</th>
                                @endif
                                <th>Mentor Status</th>
                                <th>Evaluation</th>
    
                            </tr>
                            </thead>
                            
                            @foreach($data['assignments'] as $assignment)
                                @if(Auth::user()->role == "admin" || $data['user']->id == $assignment->mentor_id)
                                    <tr>
                                        <td>
                                            <a href="{{ route('students.show', $assignment->students->id) }}">
                                                {{ $assignment->students->name }}
                                            </a>
                                        </td>
                                        <td>{{ $assignment->students->email }}</td>
                                        @if(Auth::user()->role == "admin")
                                            <td>
                                                @if(empty($assignment->lecturers))
                                                    None
                                                @else
                                                    <a href="{{ route('lecturers.show', $assignment->lecturers->id) }}">
                                                        {{ $assignment->lecturers->name }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($assignment->lecturers->status))
                                                    <span class="label label-danger">Unknown</span>
                                                @elseif($assignment->lecturers->status == "Active")
                                                    <span class="label label-success">Active</span>
                                                @elseif($assignment->lecturers->status == "On Leave")
                                                    <span class="label label-warning">On Leave</span>
                                                @else
                                                    <span class="label label-primary">{{ $assignment->lecturers->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href = "{{ route('evaluation.index') }}" class = "btn btn-info">
                                                    Total: {{ count($assignment->mm_evals)}}
                                                </a>
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
    @if(Auth::user()->role == "student")
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
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('students.show', $data['user']->mm_assignments->lecturers->id) }}">
                                        {{ $data['user']->mm_assignments->lecturers->name }}
                                    </a>
                                </td>
                                <td>{{ $data['user']->mm_assignments->lecturers->email }}</td>
                                <!-- <td>{{ $data['user']->mm_assignments->lecturers->status }}</td> -->
                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#table2').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('mentor_mentee.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'mentor_id', name: 'mentor_id' },
            { data: 'mentee_id', name: 'mentee_id' }
        ]
    });
});
</script>
@endsection