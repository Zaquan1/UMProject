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
                                <th>Year</th>
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
                                    <td>{{ $assignment->students->cohort->year }}</td>
                                @endif
                                
                                @if(Auth::user()->role != "lecturer")
                                    <td class="col-sm-5" id="tdl_mentee{{ $assignment->student_id }}">
                                        <span id="test"></span>
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

                                            {{ Form::hidden('invisibleCohort', $assignment->students->cohort->id, array('id' => 'cohort_mentee' . $assignment->student_id)) }}
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
                                    <td id="tds_mentee{{ $assignment->student_id }}">
                                        @if(empty($assignment->lecturers->status))
                                            <span class="label label-danger">Unknown</span>
                                        @else
                                            <span>{{ $assignment->lecturers->status }}</span>
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
    <h1 id="totalTodos">{{ url(route('dataTable.getDataL', 2)) }}</h1> 
@endsection
@section('script')
    <script>
        $(function(){
            //init select2 css
            $('select').select2();

            //init select value/data
            findSelect();
            
            //when select is changed
            $('.form-control').change(function(){
                var strChosen = $(this).attr('id');
                var select = $( "#" + strChosen + " option:selected" ).val();
                var cohort = $("#cohort_" + strChosen).val();
                $('#btn_'+strChosen).show();
                $('#totalTodos').text(select + ' ' + strChosen+ ' ' + cohort);
            });

            //when confirm button in click
            $('.btn-primary').click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                var button = $(this).attr('name');
                var id = $("#id_" + button).val();
                var lId = $( "#" + button + " option:selected" ).val();
                var $data = {};
                $data.id = id;
                $data.lId = lId;

                $.ajax({
                    url: "{{ route('dataTable.MmUpdate') }}",
                    type: "POST",
                    data: {'id': id, 'lId': lId },
                    success: function(data){
                        console.log(data);
                        $id = data.id;
                        $('#tdl_' + button).html(
                            "<a href={{ route('lecturers.show', '' ) }}/" + data.id + ">" + data.name + "<\a>"
                            );
                        $('#tds_' + button).text(data.status);
                        $('#totalTodos').text(data.id);
                        findSelect();
                    },
                    error: function(jqXHR, exception)
                    {var msg = '';
                        $('#totalTodos').text("Error");
                    }
                });
            });

            function findSelect()
            {
                var allSelect = document.getElementsByClassName("form-control");
                for(let index = 0; index < allSelect.length; ++index)
                {
                    var cohort = $("#cohort_" + allSelect[index].id).val();
                    replaceSelect(allSelect[index].id, cohort);
                }
            }

            //replace select with new data
            function replaceSelect(selectId, cohort)
            {
                $.ajax({
                    url: "{{ route('dataTable.getDataL', '') }}/"+ cohort,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        console.log(data);
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
