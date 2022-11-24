@extends('template')

@section('content')
    <!--navbar -->
    @include('admin._navbar')

    <div class="container-fluid page-body-wrapper">
        <!-- sidebar -->
        @include('admin._sidebar')

        <div class="main-panel">
            <!-- Body -->
            @if ($section === 'parques')
                @include('admin._body_parques')
            @endif
            @if ($section === 'dashboard')
                @include('admin._body_dashboard')
            @endif
            <!-- footer -->
            @include('admin._footer')
        </div>
    </div>
@endsection
