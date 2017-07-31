@extends('layouts.app')

@section('content-app')
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
@endsection