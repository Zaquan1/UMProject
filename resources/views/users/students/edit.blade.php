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
                        {{Form::select('cohort', $data["form"]["cohort"], $data["student"]->cohort->id,  ['class' => 'form-control select2', 'id' => 'cohort'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    {{Form::label('mentor', 'Mentor', ['class' => 'col-md-2 control-label'])}}

                    <div class="col-sm-4">
                        {{Form::select(
                            'mentor', 
                            $data["form"]["availLect"], 
                            empty($data['student']->mm_assignments->lecturer_id)? null : $data["student"]->mm_assignments->lecturer_id,  
                            ['class' => 'form-control select2', 'id' => 'mentor']
                        )}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::hidden('_method', 'PUT') }}
            <a href = "{{ URL::previous() }}" class = "btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
    <h1 id="test">0</h1>
@endsection

@section('script')
    <script>
        $(function(){
            $('select').select2();
            
            var currentLect_name = $('#mentor option:selected').text();
            $('#test').text(currentLect_name);

            $('#cohort').change(function(){
                var cohort_id = $('#cohort').val();
                var currentLect_id = "{{ $data['student']->mm_assignments->lecturer_id }}";
                
                $.ajax({
                    url: "{{ route('dataTable.getDataL', '') }}/"+ cohort_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        $('#mentor').empty();
                        $('#mentor').append($("<option selected></option>")
                            .attr("value", '')
                            .text("None")); 
                        if(cohort_id == "{{ $data['student']->cohort_id }}" && currentLect_id != '')
                        {
                            $('#mentor').append($("<option selected></option>")
                                .attr("value",currentLect_id)
                                .text(currentLect_name)); 
                        }
                        $.each(data, function(key, value){
                            if(currentLect_id == key)
                            {
                                $('#mentor').append($("<option selected></option>")
                                .attr("value",key)
                                .text(value));     
                            }
                            else
                            {
                                $('#mentor').append($("<option></option>")
                                    .attr("value",key)
                                    .text(value)); 

                            }
                        
                        });
                    }
                });
            });

            

        });
    </script>
@endsection