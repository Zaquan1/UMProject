@extends('layouts.basic')

@section('content')
    @parent
    @inject('userRole', 'App\Services\RoleServices')
    <div class="wrapper">
        @include('inc.header_navbar')
        @include('inc.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                {{ $data['title'] }}
                <small>Control panel</small>
            </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content-app')
            </section>
        </div>
    </div>
@endsection