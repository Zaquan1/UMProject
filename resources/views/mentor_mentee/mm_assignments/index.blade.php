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
                                    <td class="col-sm-5">
                                        @if(empty($assignment->lecturers))
                                            <div class="col-sm-9">
                                                {{ Form::select('mentor', 
                                                    [], 
                                                    'None',  
                                                    [
                                                        'class' => 'form-control select2', 
                                                        'id' => 'mentee' . $assignment->student_id
                                                    ]) 
                                                }}
                                            </div>

                                            {{ Form::hidden('invisibleCohort', $assignment->students->cohort->year, array('id' => 'cohort_mentee' . $assignment->student_id)) }}
                                            {{ Form::hidden('invisibleId', $assignment->id, array('id' => 'id_mentee' . $assignment->student_id)) }}

                                            <div id="btn_mentee{{ $assignment->student_id }}" class="col-sm-1" style="display:none">
                                                <a href = "#" class = "btn btn-primary" name="mentee{{ $assignment->student_id }}">Confirm</a>
                                            </div>
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
    <h1 id="totalTodos">0</h1> 
@endsection
@section('script')
    <script>
        $(function(){
            //init select2 css
            $('select').select2();

            //init select value/data
            var allSelect = document.getElementsByClassName("form-control");
            //var test = ' ';
            for(let index = 0; index < allSelect.length; ++index)
            {
                //test +=$( "#cohort_" + allSelect[index].id).val();
                replaceSelect(allSelect[index].id);
            }
            //$('#totalTodos').text(test);
            
            //when select is changed
            $('.form-control').change(function(){
                var strChosen = $(this).attr('id');
                var select = $( "#" + strChosen + " option:selected" ).val();
                var cohort = $("#cohort_" + strChosen).val();
                $('#btn_'+strChosen).show();
                $('#totalTodos').text(select + ' ' + strChosen+ ' ' + cohort);
            });

            $('.btn-primary').click(function(){
                var button = $(this).attr('name');
                var id = $("#id_" + button).val();
                var lId = $( "#" + button + " option:selected" ).val();
                $('#totalTodos').text("{{ url('dashboard/datatable') }}"+ '/' + id + '/' + lId);
                $.ajax({
                    url: "{{ url('dashboard/datatable') }}"+ '/' + id + '/' + lId,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        console.log(id)
                        $('#totalTodos').text("success");
                    }
                });
            });

            //replace select with new data
            function replaceSelect(selectId)
            {
                $.ajax({
                    url: "{{ route('dataTable.getDataL') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data){

                        $('#'+selectId).empty();
                        $('#'+selectId).append($("<option disabled selected value></option>")
                                .text("None")); 
                        $.each(data, function(key, value){
                            $('#'+selectId).append($("<option></option>")
                                .attr("value",key)
                                .text(value)); 
                        });
                    }
                });
            }
        });
    </script>
@endsection
