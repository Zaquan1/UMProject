@extends('layouts.basic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add User</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class ="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>       
                            <div class="col-md-3">
                                <select id="role" class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="lecturer">Lecturer</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                        </div>

                        <div id="lecturerForm" class="form-duration-div" style="display:none">
                            <div class="form-group">
                                {{Form::label('department', 'Department', ['class' => 'col-md-4 control-label'])}}

                                <div class="col-sm-3">
                                    {{Form::select('department', $data["lInfo"], null,  ['class' => 'form-control col-md-3', 'id' => 'department'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-md-4 control-label'])}}

                                <div class="col-md-3">
                                    {{ Form::select('status', [
                                        'On Leave' => 'On Leave',
                                        'Active' => 'Active',
                                        'Unknown' => 'Unknown',
                                        'Dead' => 'Dead',
                                        ], 
                                        null,  
                                        ['class' => 'form-control', 'id' => 'status']
                                        ) 
                                    }}
                                </div>
                            </div>
                        </div>

                        <div id="studentForm" class="form-duration-div" style="display:none">
                        
                            <div class="form-group">
                                {{Form::label('cohort', 'Cohort', ['class' => 'col-md-4 control-label'])}}

                                <div class="col-sm-3">
                                    {{Form::select('cohort', $data["sInfo"], null,  ['class' => 'form-control col-sm-3', 'id' => 'cohort'])}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                <div class="col-md-6">
                                    <a href = "/" class = "btn btn-danger">Cancel</a>
                                </div>
                                <h1 id="totalTodos">0</h1>
                                <button id="updateTodoCount">Update the todo count</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function(){
            $('#role').change(function(){
                var role = $( "#role option:selected" ).val();//document.getElementById("role").value;
                $('.form-duration-div').hide();
                 $('#'+role+'Form').show();
                $('#totalTodos').text(role);
                //$('#divFrm'+divKey).show();
                /*  
                $.ajax({
                    url: "{{ route('test') }}",
                    success: function( response ) {
                        $('#totalTodos').text( response );
                    }
                });
                */
            });
        });
    </script>
@endsection
