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
                                    <td>{{ $studentUser->id }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $studentUser->id) }}">
                                            {{ $studentUser->name }}
                                        </a>
                                    </td>
                                    <td>{{ $studentUser->email }}</td>
                                    <td>{{ $studentUser->cohort->year }}</td>
                                    <td>
                                        <a href = "{{ route('students.edit', $studentUser->id) }}" class = "btn btn-info">Edit</a>
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