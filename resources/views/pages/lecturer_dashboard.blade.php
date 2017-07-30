@extends('layouts.app')

@section('content-app')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <a href="/dashboard/mentor_mentee" class="small-box">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ count($data['user']->mm_assignments) }}</h3>

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
@endsection