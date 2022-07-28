<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Lexa - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('particials.header')
    <title>@yield('title')</title>
    @yield('css')
</head>
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('particials.topbar')
        @include('particials.sidebar')
        <div class="main-content">
            <div class="page-content">
            @yield('content')
            </div>
        </div>
    </div>

    @include('particials.footer')
    @yield('script')
</body>
</html>