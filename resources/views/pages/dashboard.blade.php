@extends('layouts.app')

@section('content-app')
    @if(Auth::user()->role == 'admin')
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <a href="{{ route('lecturers.index') }}" class="small-box">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($data['lecturers']) }}</h3>

                            <p>Lecturers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <a href="{{ route('students.index') }}" class="small-box">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($data['students']) }}</h3>

                            <p>Students</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-mortar-board"></i>
                        </div>
                        <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                    </div>
                </a>
            </div>
        </div>
    @elseif(Auth::user()->role == 'lecturer')
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <a href="/dashboard/mentor_mentee" class="small-box">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ count(Auth::user()->lecturer->mm_assignments) }}</h3>

                        <p>Mentee</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                </div>
            </a>
        </div>
    </div>  
    @elseif(Auth::user()->role == 'student')
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <a href="/dashboard/mentor_mentee" class="small-box">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count(Auth::user()->student->mm_assignments->lecturers) }}</h3>

                            <p>Mentor</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                    </div>
                </a>
            </div>
        </div>
    @endif
@endsection