<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div class="container">
    @include('admin.includes.header')
    @yield('content')
    @include('admin.includes.footer')
</div>
@include('admin.includes.foot')
</body>
</html>
