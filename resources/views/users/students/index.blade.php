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
                                    <th>Year</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            @foreach($data['students'] as $studentUser)
                                <tr>
                                    <td>{{ $studentUser->student->id }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $studentUser->student->id) }}">
                                            {{ $studentUser->student->name }}
                                        </a>
                                    </td>
                                    <td>{{ $studentUser->student->email }}</td>
                                    <td>{{ $studentUser->student->cohort->year }}</td>
                                    <td>
                                        <a href = "{{ route('students.edit', $studentUser->student->id) }}" class = "btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    @endif
    <h1 id="totalTodos">0</h1>
<button id="updateTodoCount">Update the todo count</button>
@endsection
@section('script')
<script>
$(function(){
    $('#updateTodoCount').click(function(){
        $.ajax({
            url: "{{ route('test') }}",
            success: function( response ) {
                $('#totalTodos').text( response );
            }
        });
    });
});
</script>
@endsection