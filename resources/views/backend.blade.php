<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.partials._head')
</head>

<style>
    .sidebar-dark-primary{
        background-color: rgb(2, 3, 15) !important;
    }
</style>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('backend.partials._nav')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{route('home')}}" class="" style="display: block; background-color: white; text-align: center;">
                <img src="{{ asset('img/attorney_logo.png') }}"  alt="Bangladesh Telecommunication Regulatory Commission" class="navbar-brand">
            </a>

            <!--Sidebar-->
            @include('backend.partials._sidebar')

        </aside>

        <div class="content-wrapper">

            @include('backend.partials._content_header')

            <!-- Custom Flash Messages For this Projects Start -->
            @include('backend.messages.info')
            @include('backend.messages.warning')
            @include('backend.messages.success')
            @include('backend.messages.failed')

            <!-- Custom Flash Messages For this Projects End -->

            @yield('content')

        </div>

        @include('backend.partials._footer')

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    @include('backend.partials._scripts')
</body>
</html>
