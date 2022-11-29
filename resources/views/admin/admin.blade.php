@extends('template')

@section('content')
    <!--navbar -->
    @include('admin._navbar')

    <div class="container-fluid page-body-wrapper">
        <!-- sidebar -->
        @include('admin._sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
            <!-- Body -->
            @if ($section === 'parques')
                @include('admin._body_parques')
            @endif
            @if ($section === 'dashboard')
                @include('admin._body_dashboard')
            @endif
            @if ($section === 'enterprises')
            @include('admin._body_enterprises')
            @endif
        </div>
        @include('admin._footer')

        </div>
    </div>

@if ($section === 'parques')
@include('admin._modal_parques')
@endif
@if ($section === 'enterprises')
@include('admin._modal_enterprises')
@endif

@endsection




