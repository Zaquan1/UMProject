@extends('layouts.app')

@section('content-app')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mentor-Mentee Assignment</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="table2">
                            <thead>
                            <tr>
                                @if(Auth::user()->role != "student")
                                    <th>Mentee</th>
                                    <th>Mentee Email</th>
                                @endif
                                @if(Auth::user()->role != "lecturer")
                                    <th>Mentor</th>
                                    <th>Mentor Status</th>
                                @endif
                                <th>Evaluation</th>
                            </tr>
                            </thead>
                            @foreach($data['assignments'] as $assignment)
                                @if(Auth::user()->role == 'lecturer' && Auth::user()->lecturer->id != $assignment->lecturer_id)
                                    @continue
                                @elseif(Auth::user()->role == 'student' && Auth::user()->student->id != $assignment->student_id)
                                    @continue
                                @endif
                                <tr>
                                    @if(Auth::user()->role != "student")
                                        <td>
                                            <a href="{{ route('students.show', $assignment->students->id) }}">
                                                {{ $assignment->students->name }}
                                            </a>
                                        </td>
                                        <td>{{ $assignment->students->email }}</td>
                                    @endif
                                    @if(Auth::user()->role != "lecturer")
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
                                    @endif
                                    <td>
                                        <a href = "{{ route('evaluation.index') }}" class = "btn btn-info">
                                            Total: {{ count($assignment->mm_evals)}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
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